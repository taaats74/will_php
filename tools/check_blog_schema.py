#!/usr/bin/env python3
"""
ブログ(/blog/)の構造化データが期待どおり出ているかを本番に対して検証する。

  python3 tools/check_blog_schema.py                 … 全記事を検証
  python3 tools/check_blog_schema.py --limit 15      … 先頭15記事だけ手早く
  python3 tools/check_blog_schema.py --update-baseline … 現状を正として記録し直す

mu-plugin(blog-mu-plugin/will-blog-structured-data.php)は WordPress 本体・
テーマ・プラグインの更新で消えないが、Slim SEO のフィルタ仕様が変わると
エンティティ統合と wordCount 除去が「エラーを出さずに効かなくなる」。
ブログの slim-seo は自動更新が有効なので、更新後にこれを流して確認する。

異常があれば終了コード 1 を返す。
"""
import argparse, json, os, re, sys, urllib.request
from concurrent.futures import ThreadPoolExecutor

SITEMAP = "https://will-corp.co.jp/blog/sitemap-post-type-post.xml"
ORG_ID = "https://will-corp.co.jp/#organization"
PERSON_ID = "https://will-corp.co.jp/#person-takahashi"
BASELINE = os.path.join(os.path.dirname(os.path.abspath(__file__)), "blog_schema_baseline.json")
UA = "will-schema-check/1.0"


def fetch(url, timeout=40):
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    with urllib.request.urlopen(req, timeout=timeout) as r:
        return r.read().decode("utf-8", "replace")


def article_urls():
    xml = fetch(SITEMAP)
    return re.findall(r"<loc>([^<]+)</loc>", xml)


def inspect(url):
    """1記事を検証し、(slug, 問題リスト, FAQ問数) を返す"""
    slug = url.rstrip("/").split("/")[-1]
    problems = []
    try:
        html = fetch(url)
    except Exception as e:
        return slug, [f"取得失敗: {e}"], 0

    if re.search(r"Fatal error|Parse error", html):
        problems.append("PHPエラーがページに出力されている")

    faq_blocks = 0
    faq_questions = 0
    org_ok = person_ok = False
    wordcount_left = False

    for raw in re.findall(r'<script type="application/ld\+json"[^>]*>(.*?)</script>', html, re.S):
        try:
            data = json.loads(raw)
        except json.JSONDecodeError as e:
            problems.append(f"JSON-LDが不正: {e}")
            continue
        for node in data.get("@graph") or [data]:
            if not isinstance(node, dict):
                continue
            t = node.get("@type")
            types = t if isinstance(t, list) else [t]
            if "FAQPage" in types:
                faq_blocks += 1
                faq_questions = max(faq_questions, len(node.get("mainEntity", [])))
            if "Organization" in types and node.get("@id") == ORG_ID:
                org_ok = True
            if "Person" in types and node.get("@id") == PERSON_ID:
                person_ok = True
            if "Article" in types and "wordCount" in node:
                wordcount_left = True

    if faq_blocks > 1:
        problems.append(f"FAQPageが{faq_blocks}件重複している")
    if not org_ok:
        problems.append("Organization がコーポレートの @id に統合されていない")
    if not person_ok:
        problems.append("著者が高橋竜也の Person になっていない")
    if wordcount_left:
        problems.append("Article に wordCount が残っている")

    return slug, problems, faq_questions


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("--limit", type=int, help="検証する記事数の上限")
    ap.add_argument("--update-baseline", action="store_true", help="現状を正としてベースラインを更新")
    args = ap.parse_args()

    urls = article_urls()
    if args.limit:
        urls = urls[: args.limit]
    print(f"検証対象: {len(urls)}記事\n")

    with ThreadPoolExecutor(max_workers=6) as ex:
        results = list(ex.map(inspect, urls))

    baseline = {}
    if os.path.exists(BASELINE) and not args.update_baseline:
        baseline = json.load(open(BASELINE, encoding="utf-8"))

    ng = 0
    faq_total = faq_articles = 0
    for slug, problems, q in results:
        if q:
            faq_articles += 1
            faq_total += q
        # ベースラインと比較し、FAQ が減っていないか見る
        expected = baseline.get(slug)
        if expected is not None and q < expected:
            problems.append(f"FAQの問数が減っている（{expected}→{q}）")
        if problems:
            ng += 1
            print(f"[NG] {slug}")
            for p in problems:
                print(f"       {p}")

    print(f"\nFAQPage: {faq_articles}記事 / {faq_total}問")
    print(f"問題のある記事: {ng} / {len(results)}")

    if args.update_baseline:
        data = {slug: q for slug, _, q in results}
        json.dump(data, open(BASELINE, "w", encoding="utf-8"), ensure_ascii=False, indent=1, sort_keys=True)
        print(f"ベースラインを更新: {BASELINE}")
        return 0

    return 1 if ng else 0


if __name__ == "__main__":
    sys.exit(main())
