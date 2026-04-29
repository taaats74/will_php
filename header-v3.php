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
  <title>
    <?php
      if(is_single()):
        wp_title('|', true, 'right');
      elseif(is_page()):
        wp_title('|', true, 'right');
      elseif(is_archive()):
        wp_title('|', true, 'right');
      endif;
        bloginfo('name');
    ?>
  </title>
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
        {
          "@type": "WebPage",
          "name": "アバウト",
          "url": "https://will-corp.co.jp/about/"
        },
        {
          "@type": "WebPage",
          "name": "料金",
          "url": "https://will-corp.co.jp/price/"
        },
        {
          "@type": "WebPage",
          "name": "サービス",
          "url": "https://will-corp.co.jp/service/"
        },
        {
          "@type": "WebPage",
          "name": "ウィルサポ",
          "url": "https://will-corp.co.jp/willsupport/"
        },
        {
          "@type": "WebPage",
          "name": "メディア",
          "url": "https://will-corp.co.jp/blog/"
        }
      ]
    }
  </script>

  <?php wp_head(); ?>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-S1MX9T90DT"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-S1MX9T90DT');
	</script>
</head>
<body>
  <div id="splash">
    <div id="splash-logo">
      <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="">
      </div>
      <p class="loading-message">ともに、未来を創る。</p>
    </div>
  </div>

  <div class="sp-header-v5 sp">
    <a href="<?php echo home_url('/'); ?>" class="sp-header-v5__logo" aria-label="トップページへ">
      <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="合同会社ウィル">
    </a>
    <a href="/ebook/" class="sp-header-v5__cta">資料DL</a>
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
          <li><a href="/ebook/">ダウンロード資料</a></li>
          <li><a href="<?php echo get_page_link(43); ?>">制作実績</a></li>
          <li><a href="/blog/">ブログ</a></li>
          <!-- TODO: YouTubeチャンネルURL確定後に差替 -->
          <li><a href="#" target="_blank" rel="noopener">YouTube</a></li>
        </ul>
      </details>

      <details class="sp-menu-v5__group">
        <summary>COMPANY</summary>
        <ul>
          <li><a href="<?php echo get_page_link(11); ?>">私たちについて</a></li>
          <li><a href="<?php echo get_page_link(15); ?>">お問い合わせ</a></li>
        </ul>
      </details>

      <div class="sp-menu-v5__cta">
        <a href="/diagnosis/" class="sp-menu-v5__cta-secondary">1分でできる無料診断</a>
        <a href="<?php echo get_page_link(15); ?>" class="sp-menu-v5__cta-primary">お問い合わせはこちら</a>
      </div>

      <div class="sp-menu-v5__legal">
        <ul>
          <li><a href="/privacy-policy/">プライバシーポリシー</a></li>
          <li><a href="/tradelaw/">特定商取引法に基づく表記</a></li>
        </ul>
      </div>

    </div>
  </nav>
