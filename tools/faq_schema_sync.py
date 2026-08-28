#!/usr/bin/env python3
"""
LPテンプレートの FAQ 本文(<details>)を正として、同ファイル内の
FAQPage JSON-LD を検証／再生成する。

  python3 tools/faq_schema_sync.py --check   … 差分を報告するだけ
  python3 tools/faq_schema_sync.py --fix     … JSON-LD を本文に合わせて書き換え

Google は「回答文がページ上に存在すること」を要件にしているため、
本文を改稿したらこのスクリプトを流して JSON-LD を追従させる。
"""
import argparse, html, json, os, re, sys
from html.parser import HTMLParser

TEMPLATES = [
    "page-willsupport-v2.php",
    "page-willgrow-v2.php",
    "page-will-support-ec.php",
    "page-btob-consultation-lp.php",
]

# summary 内の装飾用マーク（Qバッジ・開閉アイコン）は質問文に含めない
DECOR_CLASS = re.compile(r"faq-(q|mark)\b")

# 「Q1.」のような連番プレフィックスは質問文に含めない（ページ上には残る）
QNUM_RE = re.compile(r"^Q\d+[.．、:：]?\s*")


class DetailsParser(HTMLParser):
    """<details> を拾い、summary=質問 / それ以降=回答 として本文を抽出する"""

    def __init__(self):
        super().__init__(convert_charrefs=True)
        self.items = []
        self.depth = 0          # details のネスト深さ
        self.cur = None
        self.in_summary = False
        self.skip_depth = 0     # 装飾spanを読み飛ばす
        self.block_depth = 0    # table/ul など段落以外を読み飛ばす
        self.in_p = False

    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        cls = a.get("class", "")
        if tag == "details":
            self.depth += 1
            if self.depth == 1:
                self.cur = {"q": [], "a": [], "has_block": False}
            return
        if self.cur is None:
            return
        if tag == "summary":
            self.in_summary = True
            return
        if self.in_summary and self.skip_depth == 0 and DECOR_CLASS.search(cls):
            self.skip_depth = 1
            return
        if self.skip_depth:
            self.skip_depth += 1
            return
        # 回答側: table / ul / ol は本文が表形式のため自動生成の対象外とする
        if not self.in_summary and tag in ("table", "ul", "ol"):
            self.cur["has_block"] = True
            self.block_depth = 1
            return
        if self.block_depth:
            self.block_depth += 1
            return
        if not self.in_summary and tag == "p":
            self.in_p = True

    def handle_endtag(self, tag):
        if tag == "details":
            if self.depth == 1 and self.cur is not None:
                q = QNUM_RE.sub("", "".join(self.cur["q"]).strip())
                a = "".join(self.cur["a"]).strip()
                if q:
                    self.items.append({"q": q, "a": a, "has_block": self.cur["has_block"]})
                self.cur = None
            self.depth = max(0, self.depth - 1)
            return
        if self.cur is None:
            return
        if tag == "summary":
            self.in_summary = False
            return
        if self.skip_depth:
            self.skip_depth -= 1
            return
        if self.block_depth:
            self.block_depth -= 1
            return
        if tag == "p":
            self.in_p = False

    def handle_data(self, data):
        if self.cur is None or self.skip_depth or self.block_depth:
            return
        text = re.sub(r"\s+", "", data)
        if not text:
            return
        if self.in_summary:
            self.cur["q"].append(text)
        elif self.in_p:
            self.cur["a"].append(text)


def page_text(source: str) -> str:
    """テンプレートの表示テキスト（タグ・PHP・script を除去して連結）"""
    t = re.sub(r"<\?php.*?\?>", "", source, flags=re.S)
    t = re.sub(r"<script.*?</script>", "", t, flags=re.S)
    t = re.sub(r"<[^>]+>", "", t)
    return re.sub(r"\s+", "", html.unescape(t))


def extract_faq(source: str):
    # PHP を落としてから解析（FAQ 本文は静的HTML前提）
    stripped = re.sub(r"<\?php.*?\?>", "", source, flags=re.S)
    p = DetailsParser()
    p.feed(stripped)
    return p.items


SCRIPT_RE = re.compile(
    r'<script type="application/ld\+json">(\s*)(.*?)(\s*)</script>', re.S
)


class LdSpan:
    """FAQPage を含む JSON-LD ブロックの位置と中身"""

    def __init__(self, start, end, data):
        self.start, self.end, self.data = start, end, data


def current_ld(source: str):
    """全 ld+json ブロックを走査し、FAQPage のものを返す"""
    err = None
    for m in SCRIPT_RE.finditer(source):
        raw = m.group(2)
        if '"FAQPage"' not in raw:
            continue
        try:
            data = json.loads(raw)
        except json.JSONDecodeError as e:
            err = str(e)
            continue
        if data.get("@type") == "FAQPage":
            return data, LdSpan(m.start(2), m.end(2), data)
    if err:
        return {"__error__": err}, None
    return None, None


def norm(s: str) -> str:
    return re.sub(r"\s+", "", html.unescape(s))


def sentences(text: str):
    """句点で分割。表が段落間に挟まる回答でも文ごとに照合できるようにする"""
    return [t for t in (x.strip() for x in re.split(r"(?<=。)", text)) if t]


def answer_on_page(answer: str, body_norm: str):
    """回答を構成する各文がページ本文に存在するか"""
    return [s for s in sentences(answer) if norm(s) not in body_norm]


def build_ld(items):
    return {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": it["q"],
                "acceptedAnswer": {"@type": "Answer", "text": it["a"]},
            }
            for it in items
            if it["a"]
        ],
    }


def render(ld):
    """テンプレートに埋め込む形に整形する。
    置換対象は <script> 直後の空白を除いた JSON 本体なので、
    先頭行だけ字下げを付けない。"""
    lines = [
        "{",
        '    "@context": "https://schema.org",',
        '    "@type": "FAQPage",',
        '    "mainEntity": [',
    ]
    qs = [
        "      " + json.dumps(q, ensure_ascii=False, separators=(", ", ": "))
        for q in ld["mainEntity"]
    ]
    lines.append(",\n".join(qs))
    lines += ["    ]", "  }"]
    return "\n".join(lines)


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--fix", action="store_true", help="JSON-LD を本文に合わせて書き換える")
    ap.add_argument("--check", action="store_true", help="差分の報告のみ（既定）")
    args = ap.parse_args()
    root = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))

    ng = 0
    for name in TEMPLATES:
        path = os.path.join(root, name)
        if not os.path.exists(path):
            print(f"— {name}: 見つかりません")
            continue
        src = open(path, encoding="utf-8").read()
        items = [i for i in extract_faq(src) if i["a"]]
        ld, m = current_ld(src)
        print(f"===== {name} =====")
        if m is None:
            print("  FAQPage JSON-LD なし")
            continue
        if "__error__" in (ld or {}):
            print(f"  JSON構文エラー: {ld['__error__']}")
            ng += 1
            continue

        cur = {norm(q["name"]): norm(q["acceptedAnswer"]["text"]) for q in ld["mainEntity"]}
        raw_answer = {norm(q["name"]): q["acceptedAnswer"]["text"] for q in ld["mainEntity"]}
        print(f"  本文 {len(items)}問 / JSON-LD {len(ld['mainEntity'])}問")
        body_norm = page_text(src)
        for it in items:
            k = norm(it["q"])
            if k not in cur:
                print(f"  [欠落] JSON-LDに無い質問: {it['q'][:44]}")
                ng += 1
                continue
            missing = answer_on_page(raw_answer[k], body_norm)
            if missing:
                print(f"  [不一致] {it['q'][:44]}")
                for mm in missing[:2]:
                    print(f"           本文に無い文: {mm[:60]}")
                ng += 1
            elif it["has_block"]:
                print(f"  [情報] 表・箇条書きは JSON-LD に含めていません: {it['q'][:40]}")

        if args.fix:
            new_src = src[: m.start] + render(build_ld(items)) + src[m.end :]
            if new_src != src:
                open(path, "w", encoding="utf-8").write(new_src)
                print("  → JSON-LD を更新しました")
            else:
                print("  → 変更なし")
    if not args.fix:
        print(f"\n不一致・欠落: {ng}件")
    return 1 if (ng and not args.fix) else 0


if __name__ == "__main__":
    sys.exit(main())
