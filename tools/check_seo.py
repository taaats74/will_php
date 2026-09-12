#!/usr/bin/env python3
"""
サイト全体の SEO / AEO 出力を検証する（inc/seo/ の出力確認用）。

  python3 tools/check_seo.py                               # 本番
  python3 tools/check_seo.py http://localhost:8888/will    # ローカル

サイトマップに載っている全URLについて、次を確認する。
  - <title> / canonical / og:image が1つずつ出ている（description 未入力は警告）
  - noindex になっていない（サイトマップに載せたページが noindex なら矛盾）
  - 構造化データが1ブロックの @graph で、@id の重複・参照切れが無い
  - FAQ の質問文がページ本文に実在する
  - 料金ページとサービスページで、同じプランの料金が食い違っていない
  - 本文・説明文に、そのサービスの料金表と異なる月額・初期費用の表記が無い
  - GTM・HubSpot が1回ずつ読み込まれている
あわせて /sitemap.xml・/llms.txt・robots.txt を確認する。

異常があれば終了コード 1 を返す。
"""
import html
import json
import os
import re
import sys
import urllib.error
import urllib.request

BASE = (sys.argv[1] if len(sys.argv) > 1 else "https://will-corp.co.jp").rstrip("/")
UA = "will-seo-check/1.0"


def to_yen(number, man):
    value = int(number.replace(",", ""))
    return value * 10000 if man else value


def norm_plan(name):
    """プラン名の表記ゆれを揃える（「シンプルプラン」と「シンプル」を同じとみなす）"""
    return re.sub(r"(プラン|\s)", "", name)


def offer_facts(offer):
    spec = offer.get("priceSpecification", {})
    amount = spec.get("price", spec.get("minPrice", offer.get("price")))
    setup = offer.get("addOn", {}).get("priceSpecification", {}).get("price")
    return {
        "name": offer.get("name", ""),
        "amount": int(float(amount)) if amount is not None else None,
        "monthly": spec.get("unitText") == "月額",
        "min": "minPrice" in spec,
        "setup": int(setup) if setup else 0,
    }


def collect_price_sources(url, graph):
    """ページの構造化データから、サービスごとの料金を集める"""
    for node in graph:
        if node.get("@type") == "Service" and node.get("offers"):
            PRICE_SOURCES.append({"url": url, "service": node["name"], "kind": "service",
                                  "offers": [offer_facts(o) for o in node["offers"] if o.get("priceSpecification") or "price" in o]})
        if node.get("@type") == "OfferCatalog":
            for group in node.get("itemListElement", []):
                PRICE_SOURCES.append({"url": url, "service": re.sub(r"\s", "", group.get("name", "")), "kind": "catalog",
                                      "offers": [offer_facts(o) for o in group.get("itemListElement", [])]})


def fmt(o):
    if o["amount"] is None:
        return "金額なし"
    unit = "月額" if o["monthly"] else ""
    return f"{unit}{o['amount']:,}円{'〜' if o['min'] else ''}" + (f"・初期費用{o['setup']:,}円" if o["setup"] else "")


def cross_check_prices(pages):
    """ページ間の料金の食い違いを検出する"""
    services = [src for src in PRICE_SOURCES if src["kind"] == "service"]
    # 1. 料金ページ（OfferCatalog）の各表と、サービスページの料金表の突き合わせ
    generic = {"シンプル", "スタンダード", "プレミアム", "ライト", "ベーシック", "エントリー"}
    for cat in [src for src in PRICE_SOURCES if src["kind"] == "catalog"]:
        cat_plans = {norm_plan(o["name"]): o for o in cat["offers"]}

        def score(svc):
            # サービス名が一致するものを優先。名前が違う場合は、汎用でないプラン名が2つ以上一致するものだけ
            if svc["service"] in cat["service"] or cat["service"] in svc["service"]:
                return 1000 + len(svc["service"])
            common = set(cat_plans) & {norm_plan(o["name"]) for o in svc["offers"]}
            return len(common - generic) if len(common - generic) >= 2 else 0

        candidates = sorted([svc for svc in services if score(svc)], key=score, reverse=True)
        for svc in candidates[:1]:
            svc_plans = {norm_plan(o["name"]): o for o in svc["offers"]}
            same_name = score(svc) >= 1000
            for plan in sorted(set(cat_plans) & set(svc_plans)):
                c, v = cat_plans[plan], svc_plans[plan]
                if (c["amount"], c["monthly"], c["setup"]) != (v["amount"], v["monthly"], v["setup"]):
                    ng(cat["url"], f"料金の食い違い［{svc['service']}・{plan}］このページ {fmt(c)} ／ {svc['url']} {fmt(v)}")
            only_cat = sorted(set(cat_plans) - set(svc_plans))
            if same_name and only_cat and svc_plans:
                ng(cat["url"], f"料金の食い違い［{svc['service']}］このページにだけあるプラン {only_cat} ／ {svc['url']} のプラン {sorted(svc_plans)}")
    # 2. 本文中の料金表記（サービス名と同じ文、またはタイトルが1サービスのページ）
    for url, page in pages.items():
        for conflict in text_price_conflicts(page, services):
            ng(url, f"設定と異なる料金表記 {conflict}")


def text_price_conflicts(page, services):
    by_name = sorted(services, key=lambda x: -len(x["service"]))

    def services_in(text):
        hits = []
        for svc in by_name:
            if svc["service"] in text and svc["service"] not in [h["service"] for h in hits]:
                hits.append(svc)
                text = text.replace(svc["service"], "")
        return hits

    title = re.search(r"<title>(.*?)</title>", page, re.S)
    page_services = services_in(html.unescape(title.group(1))) if title else []
    page_service = page_services[0] if len(page_services) == 1 else None

    body = page.split("<body", 1)[-1]
    body = re.sub(r"<(script|style)\b.*?</\1>", "", body, flags=re.S | re.I)
    body = re.sub(r"<!--.*?-->", "", body, flags=re.S)
    body = re.sub(r"</?(p|li|h[1-6]|div|dt|dd|td|th|br|section|summary)\b[^>]*>", "\n", body, flags=re.I)
    text = html.unescape(re.sub(r"<[^>]+>", "", body))
    for content in re.findall(r'<meta (?:name="description"|property="og:description") content="([^"]*)"', page):
        text += "\n" + html.unescape(content)
    found = []
    for sentence in re.split(r"[\n。]", text):
        sentence = re.sub(r"\s+", "", sentence)
        targets = services_in(sentence) or ([page_service] if page_service else [])
        if len(targets) != 1:
            continue
        svc = targets[0]
        monthly = {o["amount"] for o in svc["offers"] if o["monthly"]}
        setups = {o["setup"] for o in svc["offers"]}
        if not monthly:
            continue
        amounts = re.findall(r"月額([\d,]+)(万)?円", sentence)
        amounts += [(n, "") for n in re.findall(r"¥([\d,]+)/月", sentence)]
        amounts += [(n, m) for n, m in re.findall(r"([\d,]+)(万)?円/月", sentence)]
        for number, man in amounts:
            if to_yen(number, man) not in monthly:
                found.append(f"{svc['service']}：月額{number}{man}円（{svc['url']} では {sorted(monthly)}）→ {sentence[:50]}")
        if max(setups) > 0 and re.search(r"初期費用(は|：|:)?(0円|０円|無料|なし|かかりません)", sentence):
            found.append(f"{svc['service']}：初期費用が無料の表記 → {sentence[:50]}")
    return found


PRICE_SOURCES = []
PAGES = {}

errors = []
warnings = []


def fetch(url):
    req = urllib.request.Request(url, headers={"User-Agent": UA})
    try:
        with urllib.request.urlopen(req, timeout=40) as r:
            return r.status, r.read().decode("utf-8", "replace")
    except urllib.error.HTTPError as e:
        return e.code, ""


def ng(url, message):
    errors.append(f"{url}: {message}")


def norm(s):
    return re.sub(r"\s+", "", html.unescape(s))


def sitemap_urls():
    status, index = fetch(BASE + "/sitemap.xml")
    if status != 200:
        ng("/sitemap.xml", f"HTTP {status}")
        return []
    urls = []
    for sub in re.findall(r"<loc>([^<]+)</loc>", index):
        _, body = fetch(sub)
        urls += re.findall(r"<loc>([^<]+)</loc>", body)
    return urls


def check_page(url):
    status, page = fetch(url)
    if status != 200:
        ng(url, f"HTTP {status}")
        return
    head = page.split("</head>")[0]
    body_text = norm(re.sub(r"<[^>]+>", "", re.sub(r"<(script|style)\b.*?</\1>", "", page.split("<body", 1)[-1], flags=re.S | re.I)))

    if not re.search(r'<meta name="description"', head):
        warnings.append(f"{url}: description が未入力（編集画面「SEO設定」で入力）")
    for label, pattern in [
        ("title", r"<title>"),
        ("canonical", r'<link rel="canonical"'),
        ("og:image", r'<meta property="og:image"'),
    ]:
        n = len(re.findall(pattern, head))
        if n != 1:
            ng(url, f"{label} が {n} 個")
    m = re.search(r'<link rel="canonical" href="([^"]+)"', head)
    if m and m.group(1) != url:
        ng(url, f"canonical が別URL: {m.group(1)}")
    if re.search(r"<meta name=['\"]robots['\"][^>]*noindex", head):
        ng(url, "サイトマップに載っているのに noindex")

    if page.count("gtm.js?id=") != 1 or "ns.html?id=GTM" not in page:
        ng(url, "GTM の読み込みが不正")
    if page.count("hs-scripts.com/") != 1:
        ng(url, "HubSpot の読み込みが不正")

    blocks = re.findall(r'<script type="application/ld\+json"[^>]*>(.*?)</script>', page, re.S)
    if len(blocks) != 1:
        ng(url, f"構造化データが {len(blocks)} ブロック")
        return
    try:
        graph = json.loads(blocks[0])["@graph"]
    except (ValueError, KeyError):
        ng(url, "構造化データが不正なJSON")
        return

    defined = []

    def walk(node):
        if isinstance(node, dict):
            if "@id" in node and len(node) > 1:
                defined.append(node["@id"])
            for v in node.values():
                walk(v)
        elif isinstance(node, list):
            for v in node:
                walk(v)

    walk(graph)
    dup = sorted({i for i in defined if defined.count(i) > 1})
    if dup:
        ng(url, f"@id が重複: {dup}")
    refs = set(re.findall(r'\{"@id":"([^"]+)"\}', json.dumps(graph, ensure_ascii=False, separators=(",", ":"))))
    missing = sorted(r for r in refs if r not in defined)
    if missing:
        ng(url, f"@id の参照切れ: {missing}")

    pages = [n for n in graph if str(n.get("@id", "")).endswith("#webpage")]
    if len(pages) != 1:
        ng(url, "WebPage ノードが1つではない")
        return
    for q in pages[0].get("mainEntity", []) if isinstance(pages[0].get("mainEntity"), list) else []:
        if norm(q["name"]) not in body_text:
            ng(url, f"FAQ の質問がページに無い: {q['name']}")

    PAGES[url] = page
    collect_price_sources(url, graph)

def main():
    urls = sitemap_urls()
    print(f"sitemap: {len(urls)} URL")
    for url in urls:
        before = len(errors)
        check_page(url)
        print(("NG " if len(errors) > before else "ok ") + url)

    cross_check_prices(PAGES)

    status, llms = fetch(BASE + "/llms.txt")
    if status != 200 or not llms.startswith("# "):
        ng("/llms.txt", f"HTTP {status}")
    if BASE.count("/") == 2:  # robots.txt はドメイン直下の設置時のみ
        _, robots = fetch(BASE + "/robots.txt")
        if f"Sitemap: {BASE}/sitemap.xml" not in robots:
            ng("/robots.txt", "Sitemap の記載が無い")

    print()
    if warnings:
        print("\n".join("警告 " + w for w in warnings))
    if errors:
        print("\n".join("NG " + e for e in errors))
        sys.exit(1)
    print("すべて問題ありません")


if __name__ == "__main__":
    main()
