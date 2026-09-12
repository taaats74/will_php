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
  - 料金を定義したLPで Offer が出ている（表示と不一致だと出力が止まる）
  - どのページにも、設定（inc/seo/config.php）と異なる料金表記が無い
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

# 料金（Offer）を出すページ。inc/seo/config.php の plans を持つサービス
OFFER_PATHS = ["/willsupport/", "/willgrow/", "/will-support-ec/", "/btob-marketing-consultation/"]

CONFIG = os.path.join(os.path.dirname(os.path.dirname(os.path.abspath(__file__))), "inc", "seo", "config.php")


def load_prices():
    """config.php の will_seo_services() から、料金のあるサービスを読む（料金の正は config.php のみ）"""
    source = open(CONFIG, encoding="utf-8").read()
    services = []
    for body in re.findall(r"'page-[\w-]+\.php'\s*=>\s*\[(.*?)\n\t\t\],", source, re.S):
        name = re.search(r"'name'\s*=>\s*'([^']+)'", body)
        monthly = [int(m) for m in re.findall(r"'monthly'\s*=>\s*(\d+)", body)]
        setup = [int(m) for m in re.findall(r"'setup'\s*=>\s*(\d+)", body)]
        if name and any(monthly):
            services.append({"name": name.group(1), "monthly": set(monthly), "setup": set(setup)})
    # 「ウィルサポ」が「ウィルサポEC」の一部に一致しないよう、長い名前から判定する
    return sorted(services, key=lambda s: -len(s["name"]))


def services_in(text):
    """文に含まれるサービス（長い名前を優先して重複一致を除く）"""
    hits = []
    for service in PRICES:
        if service["name"] in text:
            hits.append(service)
            text = text.replace(service["name"], "")
    return hits


PRICES = load_prices()


def to_yen(number, man):
    value = int(number.replace(",", ""))
    return value * 10000 if man else value


def price_conflicts(page):
    """設定と異なる金額・初期費用の表記を返す。
    文にサービス名があればそのサービス、無ければページの <title> に1つだけ含まれるサービスで判定する。
    """
    title = re.search(r"<title>(.*?)</title>", page, re.S)
    page_services = services_in(html.unescape(title.group(1))) if title else []
    page_service = page_services[0] if len(page_services) == 1 else None

    body = page.split("<body", 1)[-1]
    body = re.sub(r"<(script|style)\b.*?</\1>", "", body, flags=re.S | re.I)
    body = re.sub(r"</?(p|li|h[1-6]|div|dt|dd|td|th|br|section|summary)\b[^>]*>", "\n", body, flags=re.I)
    text = html.unescape(re.sub(r"<[^>]+>", "", body))
    # 検索結果・SNSに出る説明文も対象にする
    for content in re.findall(r'<meta (?:name="description"|property="og:description") content="([^"]*)"', page):
        text += "\n" + html.unescape(content)
    found = []
    for sentence in re.split(r"[\n。]", text):
        sentence = re.sub(r"\s+", "", sentence)
        targets = services_in(sentence) or ([page_service] if page_service else [])
        if len(targets) != 1:
            continue  # 複数サービスが並ぶ文は、どの金額がどのサービスか判別できないため対象外
        service = targets[0]
        amounts = re.findall(r"月額([\d,]+)(万)?円", sentence)
        amounts += [(n, "") for n in re.findall(r"(?:¥([\d,]+)/月)", sentence)]
        amounts += [(n, m) for n, m in re.findall(r"([\d,]+)(万)?円/月", sentence)]
        for number, man in amounts:
            if to_yen(number, man) not in service["monthly"]:
                found.append(f"{service['name']}：月額{number}{man}円 → {sentence[:60]}")
        if max(service["setup"]) > 0 and re.search(r"初期費用(は|：|:)?(0円|０円|無料|なし|かかりません)", sentence):
            found.append(f"{service['name']}：初期費用が無料の表記 → {sentence[:60]}")
    return found


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

    for conflict in price_conflicts(page):
        ng(url, f"設定と異なる料金表記 {conflict}")

    path = url[len(BASE):]
    if path in OFFER_PATHS:
        services = [n for n in graph if n.get("@type") == "Service"]
        if not services or not services[0].get("offers"):
            ng(url, "Offer が出ていない（料金設定と表示の不一致を確認）")


def main():
    urls = sitemap_urls()
    print(f"sitemap: {len(urls)} URL")
    for url in urls:
        before = len(errors)
        check_page(url)
        print(("NG " if len(errors) > before else "ok ") + url)

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
