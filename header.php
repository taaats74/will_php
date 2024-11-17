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
      "description": "WEBサイト制作、WEBマーケティング支援、SNS運用サポート、広告運用代行を提供する企業",
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

  <div id="splash-child">
    <!-- <div id="splash-logo">
      <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="">
      </div>
      <p class="loading-message">ともに、未来を創る。</p>
    </div> -->
  </div>


  <div class="loading-container">
    <header class="header-child-page">
      <div class="container pc">
        <div class="wrapper">
          <h1 class="logo">
            <div class="img-wrapper">
              <a href="<?php echo home_url('/'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="合同会社ウィル|福岡のホームページ制作会社|ウェブ制作会社">
              </a>
            </div>
          </h1>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'header-menu-child',
              'container' => 'nav',
            ));
          ?>
        </div>
        <div class="cover-white"></div>
      </div>
      <div class="sp-menu-icon sp">
        <ul>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </div>
      <div class="sp-menu sp">
        <div class="container">
          <div class="wrapper">
            <div class="img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="">
            </div>
            <?php
              wp_nav_menu(array(
                'theme_location' => 'sp-menu',
                'container' => 'nav',
                'link_before' => '<span></span>',
                'link_after' => '<i class="fas fa-chevron-right"></i>'
              ));
            ?>
            <!-- <ul class="menu">
              <li>
                <a href=""><span></span>home<i class="fa-solid fa-chevron-right"></i></a>
              </li>
              <li>
                <a href=""><span></span> about<i class="fa-solid fa-chevron-right"></i></a>
              </li>
              <li>
                <a href=""><span></span>service<i class="fa-solid fa-chevron-right"></i></a>
              </li>
              <li>
                <a href=""><span></span>works<i class="fa-solid fa-chevron-right"></i></a>
              </li>
              <li>
                <a href=""><span></span>blog<i class="fa-solid fa-chevron-right"></i></a>
              </li>
              <li>
                <a href=""><span></span>partner<i class="fa-solid fa-chevron-right"></i></a>
              </li>
              <li>
                <a href=""><span></span>contact<i class="fa-solid fa-chevron-right"></i></a>
              </li>
            </ul> -->
          </div>
        </div>
      </div>
    </header>
    <!-- 下層ページのheaderには「header-child-page」のclassを入れてるので、WP化する時はかheaderテンプレートを2つ作る -->
    <!-- header-child-pageのstyleはheader.scssで制御している -->

    <div class="sp sp-logo">
      <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="">
      </div>
    </div>
