#!/usr/bin/env python3
"""
LP の構造化データが本番で正しく出ているかを検証する。

  python3 tools/check_lp_schema.py

テンプレートの表示マークアップ(<details>)を正として、本番ページが出力している
FAQPage と突き合わせる。あわせて Service / Offer の妥当性も見る。

構造化データは inc/structured-data.php が実行時に生成するため、
LP の文言を直せば自動で追従する。このスクリプトはその結果の確認用。
価格だけは設定値（will_sd_lp_map）を正としているため、
表示と食い違うと Offer の出力が止まる。その検知もここで行う。

異常があれば終了コード 1 を返す。
"""
import html
import json
import os
import re
import sys
import urllib.request
from html.parser import HTMLParser

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
UA = "will-schema-check/1.0"

# テンプレート → 公開URL
TARGETS = {
    "page-willsupport-v2.php": "https://will-corp.co.jp/willsupport/",
    "page-willgrow-v2.php": "https://will-corp.co.jp/willgrow/",
    "page-will-support-ec.php": "https://will-corp.co.jp/will-support-ec/",
    "page-btob-consultation-lp.php": "https://will-corp.co.jp/btob-marketing-consultation/",
}

DECOR_CLASS = re.compile(r"faq-(q|mark)\b")
QNUM_RE = re.compile(r"^Q\d+[.．、:：]?\s*")


class DetailsParser(HTMLParser):
    """inc/structured-data.php の will_sd_extract_details_faq と同じ規則で抽出する"""

    def __init__(self):
        super().__init__(convert_charrefs=True)
        self.items, self.depth, self.cur = [], 0, None
        self.in_summary, self.skip_depth, self.block_depth, self.in_p = False, 0, 0, False

    def handle_starttag(self, tag, attrs):
        cls = dict(attrs).get("class", "")
        if tag == "details":
            self.depth += 1
            if self.depth == 1:
                self.cur = {"q": [], "a": []}
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
        if not self.in_summary and tag in ("table", "ul", "ol"):
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
                if q and a:
                    self.items.append((q, a))
                self.cur = None
            self.depth = max(0, self.depth - 1)
            return
        if self.cur is None:
            return
        if tag == "summary":
            self.in_summary = False
        elif self.skip_depth:
            self.skip_depth -= 1
        elif self.block_depth:
            self.block_depth -= 1
        elif tag == "p":
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


def template_faq(path):
    source = open(path, encoding="utf-8").read()
    source = re.sub(r"<\?php.*?\?>", "", source, flags=re.S)
    source = re.sub(r"<(script|style)\b[^>]*>.*?</\1>", "", source, flags=re.S | re.I)
    p = DetailsParser()
    p.feed(source)
    return p.items


def fetch(url):
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    with urllib.request.urlopen(req, timeout=40) as r:
        return r.read().decode("utf-8", "replace")


def norm(s):
    return re.sub(r"\s+", "", html.unescape(s))


def main():
    ng = 0
    for template, url in TARGETS.items():
        path = os.path.join(ROOT, template)
        print(f"===== {template}")
        if not os.path.exists(path):
            print("  テンプレートが見つかりません")
            ng += 1
            continue

        expected = template_faq(path)
        try:
            page = fetch(url)
        except Exception as e:
            print(f"  取得失敗: {e}")
            ng += 1
            continue

        if re.search(r"Fatal error|Parse error", page):
            print("  PHPエラーがページに出力されている")
            ng += 1

        body = re.sub(r"<script.*?</script>", "", page, flags=re.S)
        body = norm(re.sub(r"<[^>]+>", "", body))

        service = faq = None
        for raw in re.findall(r'<script type="application/ld\+json"[^>]*>(.*?)</script>', page, re.S):
            try:
                d = json.loads(raw)
            except json.JSONDecodeError as e:
                print(f"  JSON-LDが不正: {e}")
                ng += 1
                continue
            for node in d.get("@graph") or [d]:
                if not isinstance(node, dict):
                    continue
                if node.get("@type") == "Service":
                    service = node
                elif node.get("@type") == "FAQPage":
                    faq = node

        # Service
        if service is None:
            print("  Service が出力されていない")
            ng += 1
        else:
            offers = service.get("offers") or []
            if not offers:
                print("  Offer が出力されていない（価格設定がページ表示と一致していない可能性）")
                ng += 1
            for offer in offers:
                spec = offer.get("priceSpecification")
                if isinstance(spec, dict) and spec.get("@type") == "UnitPriceSpecification":
                    unit = (spec.get("referenceQuantity") or {}).get("unitCode")
                    if unit != "MON":
                        print(f"  月額の単位が不正: {offer.get('name')} unitCode={unit}")
                        ng += 1
                elif "price" not in offer:
                    print(f"  価格情報のない Offer: {offer.get('name')}")
                    ng += 1
            print(f"  Service OK  offers={len(offers)}")

        # FAQPage
        if not expected:
            print("  テンプレートにFAQがありません")
            continue
        if faq is None:
            print(f"  FAQPage が出力されていない（テンプレートには {len(expected)}問ある）")
            ng += 1
            continue

        live = {norm(q["name"]): norm(q["acceptedAnswer"]["text"]) for q in faq.get("mainEntity", [])}
        missing = 0
        for q, a in expected:
            if norm(q) not in live:
                print(f"  [欠落] {q[:44]}")
                missing += 1
            elif live[norm(q)] != norm(a):
                print(f"  [不一致] {q[:44]}")
                missing += 1
            elif norm(a) not in body:
                print(f"  [本文に無い回答] {q[:44]}")
                missing += 1
        ng += missing
        print(f"  FAQPage {len(live)}問 / テンプレート {len(expected)}問 / 問題 {missing}件")

    print(f"\n問題の合計: {ng}件")
    return 1 if ng else 0


if __name__ == "__main__":
    sys.exit(main())
