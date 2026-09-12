#!/usr/bin/env python3
"""
各ページの構造化データ（JSON-LD）をJSONファイルに書き出し、概要を表示する。
ページのソースを開かなくても、エディタで構造化データの中身を確認できる。

  python3 tools/dump_schema.py                                   # ローカル・サイトマップの全ページ
  python3 tools/dump_schema.py https://will-corp.co.jp           # 本番
  python3 tools/dump_schema.py http://localhost:8888/will /willsupport/ /service/seo/   # ページを指定

書き出し先：テーマの外（../../../_seo-migration/schema/<ホスト名>/）
  ページごとに 1ファイル（例：willsupport.json）と、全ページの概要 _summary.txt
"""
import json
import os
import re
import sys
import urllib.error
import urllib.request

BASE = (sys.argv[1] if len(sys.argv) > 1 else "http://localhost:8888/will").rstrip("/")
PATHS = sys.argv[2:]
ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))  # テーマ
HOST = re.sub(r"[^\w.-]", "_", BASE.split("://", 1)[-1])
OUT = os.path.normpath(os.path.join(ROOT, "..", "..", "..", "_seo-migration", "schema", HOST))


def fetch(url):
    req = urllib.request.Request(url, headers={"User-Agent": "will-schema-dump/1.0"})
    try:
        with urllib.request.urlopen(req, timeout=40) as r:
            return r.read().decode("utf-8", "replace")
    except urllib.error.HTTPError:
        return ""


def sitemap_urls():
    urls = []
    for sub in re.findall(r"<loc>([^<]+)</loc>", fetch(BASE + "/sitemap.xml")):
        urls += re.findall(r"<loc>([^<]+)</loc>", fetch(sub))
    return urls


def price(offer):
    spec = offer.get("priceSpecification", {})
    amount = spec.get("price", spec.get("minPrice", offer.get("price")))
    text = f"{int(float(amount)):,}円" if amount is not None else "?"
    if "minPrice" in spec:
        text += "〜"
    if spec.get("unitText"):
        text = f"{spec['unitText']} {text}"
    setup = offer.get("addOn", {}).get("priceSpecification", {}).get("price")
    if setup:
        text += f"（初期費用 {int(setup):,}円）"
    return f"{offer.get('name')}：{text}"


def summarize(graph):
    """ノードごとに1〜数行の概要"""
    lines = []
    page = next((n for n in graph if str(n.get("@id", "")).endswith("#webpage")), {})
    t = page.get("@type", "")
    lines.append(f"ページの種類：{t if isinstance(t, str) else ' + '.join(t)}")
    for n in graph:
        typ = n.get("@type")
        if n is page or typ in ("WebSite", "BreadcrumbList", "ImageObject"):
            continue
        if typ == "Organization":
            lines.append(f"会社情報：{'詳細あり' if 'address' in n else '参照のみ'}")
        elif typ == "Person":
            lines.append(f"人物：{n['name']}（{n.get('jobTitle', '肩書きなし')}）")
        elif typ == "Service":
            lines.append(f"サービス：{n['name']}" + (f"／{n['serviceType']}" if n.get("serviceType") else ""))
            lines += [f"    料金 {price(o)}" for o in n.get("offers", [])]
        elif typ == "OfferCatalog":
            for group in n.get("itemListElement", []):
                lines.append(f"料金表：{group.get('name')}")
                lines += [f"    料金 {price(o)}" for o in group.get("itemListElement", [])]
        elif typ == "HowTo":
            lines.append(f"流れ：{n['name']}（{len(n['step'])}ステップ）")
        elif typ == "ItemList":
            lines.append(f"一覧：{n.get('name', '子ページ・投稿')}（{len(n['itemListElement'])}件）")
        elif typ == "DigitalDocument":
            lines.append(f"資料：{n['name']}（{n.get('numberOfPages', '?')}ページ・目次{len(n.get('hasPart', []))}章）")
        elif typ == "VideoObject":
            lines.append(f"動画：{n['name']}")
        elif typ in ("BlogPosting", "Blog"):
            lines.append(f"{typ}：{n.get('headline') or n.get('name', '')}" + (f"（記事{len(n['blogPost'])}件）" if n.get("blogPost") else ""))
        else:
            lines.append(f"{typ}：{n.get('name', '')}")
    if isinstance(page.get("mainEntity"), list):
        lines.append(f"FAQ：{len(page['mainEntity'])}問")
    return lines


def main():
    urls = [BASE + p if p.startswith("/") else p for p in PATHS] or sitemap_urls()
    os.makedirs(OUT, exist_ok=True)
    report = []
    for url in urls:
        html = fetch(url)
        blocks = re.findall(r'<script type="application/ld\+json"[^>]*>(.*?)</script>', html, re.S)
        path = url[len(BASE):] or "/"
        name = path.strip("/").replace("/", "__") or "home"
        report.append(f"===== {path}")
        if not blocks:
            report.append("構造化データなし（noindex のページ、または取得失敗）")
            continue
        data = json.loads(blocks[0])
        with open(os.path.join(OUT, name + ".json"), "w", encoding="utf-8") as f:
            json.dump(data, f, ensure_ascii=False, indent=2)
        report.append(f"ファイル：{name}.json")
        report += summarize(data.get("@graph", []))
    with open(os.path.join(OUT, "_summary.txt"), "w", encoding="utf-8") as f:
        f.write("\n".join(report) + "\n")
    print("\n".join(report))
    print(f"\n書き出し先：{OUT}")


if __name__ == "__main__":
    main()
