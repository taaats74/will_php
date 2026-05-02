<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script>
    (function (d) {
      var config = {
        kitId: 'ivl3pwh',
        scriptTimeout: 3000,
        async: true
      },
        h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "合同会社ウィル",
      "url": "https://will-corp.co.jp/",
      "foundingDate": "2023-11",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "JP",
        "addressRegion": "福岡県",
        "addressLocality": "福岡市博多区",
        "streetAddress": "博多駅前1丁目23番2号 ParkFront博多駅前1丁目5F-B",
        "postalCode": "812-0011"
      },
      "contactPoint": {
        "@type": "ContactPoint",
        "url": "https://will-corp.co.jp/contact/",
        "contactType": "customer service",
        "availableLanguage": "Japanese"
      },
      "description": "BtoB中小企業の営業基盤をWebから設計する、福岡発のBtoBマーケティング支援会社",
      "hasPart": [
        { "@type": "WebPage", "name": "アバウト",       "url": "https://will-corp.co.jp/about/" },
        { "@type": "WebPage", "name": "サービス",       "url": "https://will-corp.co.jp/service/" },
        { "@type": "WebPage", "name": "制作実績",       "url": "https://will-corp.co.jp/works/" },
        { "@type": "WebPage", "name": "ブログ",         "url": "https://will-corp.co.jp/blog/" },
        { "@type": "WebPage", "name": "ダウンロード資料", "url": "https://will-corp.co.jp/ebooks/" }
      ]
    }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class('has-header has-loading-v2'); ?>>

<?php /* Phase 7 で削除予定:旧 inline JS(splash-v2 採用前の body.appear 即時付与)
<script>
  // 下層ページではスプラッシュを使わないため、body.appear を即座に付与し
  // .loading-container のフェードインと .sp-header-v5 の表示条件を満たす
  document.body.classList.add('appear');
</script>
*/ ?>

  <!-- ===================================================== -->
  <!-- ローディング v2(下層ページ用:線のみバリアント) ここから -->
  <!-- ===================================================== -->
  <div id="splash-v2" class="loading-v2 loading-v2--line">
    <span class="loading-v2__line" aria-hidden="true"></span>
  </div>
  <!-- ローディング v2 ここまで -->


  <!-- ===================================================== -->
  <!-- PC ヘッダー(下層ページ用 v4) ここから                  -->
  <!-- ===================================================== -->
  <header class="header-child-v2 pc" role="banner">
    <div class="header-child-v2__inner">

      <div class="header-child-v2__brand">
        <a href="<?php echo home_url('/'); ?>" class="header-child-v2__logo" aria-label="合同会社ウィル トップへ">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="合同会社ウィル">
        </a>
      </div>

      <nav class="header-child-v2__nav" aria-label="メインメニュー">
        <ul class="header-child-v2__nav-list">

          <li class="header-child-v2__nav-item">
            <a href="<?php echo esc_url( get_page_link( 11 ) ); ?>" class="header-child-v2__nav-link">私たちについて</a>
          </li>

          <li class="header-child-v2__nav-item header-child-v2__nav-item--has-mega">
            <a href="/service/" class="header-child-v2__nav-link" aria-haspopup="true">サービス</a>

            <div class="header-child-v2__megamenu" role="menu">

              <div class="header-child-v2__megamenu__group">
                <p class="header-child-v2__megamenu__group-label">主力サービス</p>
                <div class="header-child-v2__megamenu__featured">
                  <a href="/willsupport/" class="header-child-v2__megamenu__featured-card" role="menuitem">
                    <span class="header-child-v2__megamenu__featured-card-title">ウィルサポ</span>
                    <span class="header-child-v2__megamenu__featured-card-sub">BtoB中小企業向け</span>
                  </a>
                  <a href="/will-support-ec/" class="header-child-v2__megamenu__featured-card" role="menuitem">
                    <span class="header-child-v2__megamenu__featured-card-title">ウィルサポEC</span>
                    <span class="header-child-v2__megamenu__featured-card-sub">EC事業者向け</span>
                  </a>
                </div>
              </div>

              <div class="header-child-v2__megamenu__group">
                <p class="header-child-v2__megamenu__group-label">支援領域</p>
                <ul class="header-child-v2__megamenu__list">
                  <li><a href="/service/web-creative/" role="menuitem">Webサイト制作</a></li>
                  <li><a href="/service/web-marketing/" role="menuitem">MA構築・運用支援</a></li>
                  <!-- TODO: 専用LP新設後にURL差替 -->
                  <li><a href="/service/" role="menuitem">コンテンツSEO構築・運用支援</a></li>
                  <li><a href="/service/sns-support/" role="menuitem">Instagram構築・運用支援</a></li>
                  <li><a href="/service/graphic/" role="menuitem">グラフィック制作</a></li>
                </ul>
              </div>

            </div>
          </li>

          <li class="header-child-v2__nav-item">
            <a href="<?php echo esc_url( get_page_link( 43 ) ); ?>" class="header-child-v2__nav-link">制作実績</a>
          </li>

          <li class="header-child-v2__nav-item">
            <a href="/blog/" class="header-child-v2__nav-link">ブログ</a>
          </li>

        </ul>
      </nav>

      <div class="header-child-v2__cta">
        <a href="/diagnosis/" class="header-child-v2__btn header-child-v2__btn--outline">無料診断</a>
        <a href="/ebooks/" class="header-child-v2__btn header-child-v2__btn--outline">資料DL</a>
        <a href="<?php echo esc_url( get_page_link( 15 ) ); ?>" class="header-child-v2__btn header-child-v2__btn--solid">お問い合わせ</a>
      </div>

    </div>
  </header>
  <!-- PC ヘッダー ここまで -->


  <!-- ===================================================== -->
  <!-- SP フローティングヘッダー(page-topv3 と共通) ここから  -->
  <!-- ===================================================== -->
  <div class="sp-header-v5 sp">
    <a href="<?php echo home_url('/'); ?>" class="sp-header-v5__logo" aria-label="トップページへ">
      <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="合同会社ウィル">
    </a>
    <a href="/ebooks/" class="sp-header-v5__cta">資料DL</a>
    <button type="button" class="sp-header-v5__hamburger" aria-label="メニューを開く" aria-controls="sp-menu-v5" aria-expanded="false">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <nav id="sp-menu-v5" class="sp-menu-v5 sp" aria-hidden="true">
    <div class="sp-menu-v5__inner">

      <div class="sp-menu-v5__featured">
        <p class="sp-menu-v5__group-label">BtoB向けサブスクホームページ</p>
        <ul>
          <li><a href="/willsupport/">ウィルサポ<span>BtoB中小企業向け</span></a></li>
          <li><a href="/will-support-ec/">ウィルサポEC<span>EC事業者向け</span></a></li>
        </ul>
      </div>

      <details class="sp-menu-v5__group" open>
        <summary>SERVICES</summary>
        <ul>
          <li><a href="/service/web-creative/">Webサイト制作</a></li>
          <li><a href="/service/web-marketing/">MA構築・運用支援</a></li>
          <!-- TODO: 専用LP新設後にURL差替 -->
          <li><a href="/service/">コンテンツSEO構築・運用支援</a></li>
          <li><a href="/service/sns-support/">Instagram構築・運用支援</a></li>
          <li><a href="/service/graphic/">グラフィック制作</a></li>
        </ul>
      </details>

      <details class="sp-menu-v5__group">
        <summary>CONTENTS</summary>
        <ul>
          <li><a href="/diagnosis/">無料診断</a></li>
          <li><a href="/ebooks/">ダウンロード資料</a></li>
          <li><a href="<?php echo esc_url( get_page_link( 43 ) ); ?>">制作実績</a></li>
          <li><a href="/blog/">ブログ</a></li>
          <!-- TODO: YouTubeチャンネルURL確定後に差替 -->
          <li><a href="#" target="_blank" rel="noopener">YouTube</a></li>
        </ul>
      </details>

      <details class="sp-menu-v5__group">
        <summary>COMPANY</summary>
        <ul>
          <li><a href="<?php echo esc_url( get_page_link( 11 ) ); ?>">私たちについて</a></li>
          <li><a href="<?php echo esc_url( get_page_link( 15 ) ); ?>">お問い合わせ</a></li>
        </ul>
      </details>

      <div class="sp-menu-v5__cta">
        <a href="/diagnosis/" class="sp-menu-v5__cta-secondary">1分でできる無料診断</a>
        <a href="<?php echo esc_url( get_page_link( 15 ) ); ?>" class="sp-menu-v5__cta-primary">お問い合わせはこちら</a>
      </div>

      <div class="sp-menu-v5__legal">
        <ul>
          <li><a href="/privacy-policy/">プライバシーポリシー</a></li>
          <li><a href="/tradelaw/">特定商取引法に基づく表記</a></li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- SP フローティングヘッダー ここまで -->


  <div class="loading-container">
