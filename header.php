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
            <a href="<?php echo esc_url( home_url('/') ); ?>" class="header-child-v2__nav-link">ホーム</a>
          </li>

          <li class="header-child-v2__nav-item">
            <a href="<?php echo esc_url( home_url('/about/') ); ?>" class="header-child-v2__nav-link">私たちについて</a>
          </li>

          <li class="header-child-v2__nav-item header-child-v2__nav-item--has-mega">
            <a href="<?php echo esc_url( home_url('/service/') ); ?>" class="header-child-v2__nav-link" aria-haspopup="true">サービス</a>

            <div class="header-child-v2__megamenu" role="menu">

              <div class="header-child-v2__megamenu__group">
                <p class="header-child-v2__megamenu__group-label">主力サービス</p>
                <div class="header-child-v2__megamenu__featured">
                  <a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" class="header-child-v2__megamenu__featured-card" role="menuitem" target="_blank" rel="noopener noreferrer">
                    <span class="header-child-v2__megamenu__featured-card-title">ウィルサポ</span>
                    <span class="header-child-v2__megamenu__featured-card-sub">BtoB中小企業向け</span>
                  </a>
                  <a href="<?php echo esc_url( home_url('/will-support-ec/') ); ?>" class="header-child-v2__megamenu__featured-card" role="menuitem" target="_blank" rel="noopener noreferrer">
                    <span class="header-child-v2__megamenu__featured-card-title">ウィルサポEC</span>
                    <span class="header-child-v2__megamenu__featured-card-sub">EC事業者向け</span>
                  </a>
                </div>
              </div>

              <div class="header-child-v2__megamenu__group">
                <p class="header-child-v2__megamenu__group-label">支援領域</p>
                <ul class="header-child-v2__megamenu__list">
                  <li><a href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>" role="menuitem">Webサイト制作</a></li>
                  <li><a href="<?php echo esc_url( home_url('/service/marketing-automation/') ); ?>" role="menuitem">MA構築・運用支援</a></li>
                  <!-- TODO: 専用LP新設後にURL差替 -->
                  <li><a href="<?php echo esc_url( home_url('/service/seo/') ); ?>" role="menuitem">コンテンツSEO構築・運用支援</a></li>
                  <li><a href="<?php echo esc_url( home_url('/service/instagram-support/') ); ?>" role="menuitem">Instagram構築・運用支援</a></li>
                  <li><a href="<?php echo esc_url( home_url('/service/creative/') ); ?>" role="menuitem">グラフィック制作</a></li>
                </ul>
              </div>

            </div>
          </li>

          <li class="header-child-v2__nav-item">
            <a href="<?php echo esc_url( home_url('/works/') ); ?>" class="header-child-v2__nav-link">制作実績</a>
          </li>

          <li class="header-child-v2__nav-item">
            <a href="https://will-corp.co.jp/blog/" class="header-child-v2__nav-link" target="_blank" rel="noopener noreferrer">ブログ</a>
          </li>

        </ul>
      </nav>

      <div class="header-child-v2__cta">
        <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>" class="header-child-v2__btn header-child-v2__btn--outline">無料診断</a>
        <a href="<?php echo esc_url( home_url('/ebooks/') ); ?>" class="header-child-v2__btn header-child-v2__btn--outline">資料DL</a>
        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="header-child-v2__btn header-child-v2__btn--solid">お問い合わせ</a>
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
    <a href="<?php echo esc_url( home_url('/ebooks/') ); ?>" class="sp-header-v5__cta">資料DL</a>
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
          <li><a href="<?php echo esc_url( home_url('/willsupport/') ); ?>" target="_blank" rel="noopener noreferrer">ウィルサポ<span>BtoB中小企業向け</span></a></li>
          <li><a href="<?php echo esc_url( home_url('/will-support-ec/') ); ?>" target="_blank" rel="noopener noreferrer">ウィルサポEC<span>EC事業者向け</span></a></li>
        </ul>
      </div>

      <details class="sp-menu-v5__group" open>
        <summary>SERVICES</summary>
        <ul>
          <li><a href="<?php echo esc_url( home_url('/service/web-creative/') ); ?>">Webサイト制作</a></li>
          <li><a href="<?php echo esc_url( home_url('/service/marketing-automation/') ); ?>">MA構築・運用支援</a></li>
          <!-- TODO: 専用LP新設後にURL差替 -->
          <li><a href="<?php echo esc_url( home_url('/service/seo/') ); ?>">コンテンツSEO構築・運用支援</a></li>
          <li><a href="<?php echo esc_url( home_url('/service/instagram-support/') ); ?>">Instagram構築・運用支援</a></li>
          <li><a href="<?php echo esc_url( home_url('/service/creative/') ); ?>">グラフィック制作</a></li>
        </ul>
      </details>

      <details class="sp-menu-v5__group">
        <summary>CONTENTS</summary>
        <ul>
          <li><a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>">無料診断</a></li>
          <li><a href="<?php echo esc_url( home_url('/ebooks/') ); ?>">ダウンロード資料</a></li>
          <li><a href="<?php echo esc_url( home_url('/works/') ); ?>">制作実績</a></li>
          <li><a href="https://will-corp.co.jp/blog/" target="_blank" rel="noopener noreferrer">ブログ</a></li>
          <li><a href="https://www.youtube.com/@will-btob-marketing" target="_blank" rel="noopener noreferrer">YouTube</a></li>
        </ul>
      </details>

      <details class="sp-menu-v5__group">
        <summary>COMPANY</summary>
        <ul>
          <li><a href="<?php echo esc_url( home_url('/') ); ?>">ホーム</a></li>
          <li><a href="<?php echo esc_url( home_url('/about/') ); ?>">私たちについて</a></li>
          <li><a href="<?php echo esc_url( home_url('/contact/') ); ?>">お問い合わせ</a></li>
        </ul>
      </details>

      <div class="sp-menu-v5__cta">
        <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>" class="sp-menu-v5__cta-secondary">1分でできる無料診断</a>
        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="sp-menu-v5__cta-primary">お問い合わせはこちら</a>
      </div>

      <div class="sp-menu-v5__legal">
        <ul>
          <li><a href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>">プライバシーポリシー</a></li>
          <li><a href="<?php echo esc_url( home_url('/tradelaw/') ); ?>">特定商取引法に基づく表記</a></li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- SP フローティングヘッダー ここまで -->


  <div class="loading-container">
