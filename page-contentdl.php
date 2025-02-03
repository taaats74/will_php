<?php
  /*
  Template Name: Content DL
  Template Post Type: page
  */
?>

<?php get_header(); ?>

  <section class="hero-section single-service ebook">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/ebook-hero.png" alt="e-Book">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">e</span>-Book</h2>
          <p class="sub-title">無料eBookダウンロード</p>
        </div>
      </div>
    </div>
  </section>

  <section class="page-contentdl-content">
    <div class="container">
      <div class="wrapper">
        <h2>お役立ち資料</h2>
        <div class="contents">
          <div class="content">
            <a href="https://site.will-corp.co.jp/content-3f4he6joo8r" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-contentdl-03.png" alt="中小企業のためのWebマーケティング入門ガイド">
              <h3>基礎からわかる<br>Webマーケティング入門ガイド</h3>
              <p>無料でダウンロード</p>
            </a>
          </div>
          <div class="content">
            <a href="https://site.will-corp.co.jp/content-3f3ev8t4" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-contentdl-02.png" alt="中小企業のためのWebマーケティング入門ガイド">
              <h3>今さら聞けない！<br>ホームページに必要な5つの基本要素</h3>
              <p>無料でダウンロード</p>
            </a>
          </div>
          <div class="content">
            <a href="https://site.will-corp.co.jp/content-efq34fae" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-contentdl-01.png" alt="中小企業のためのWebマーケティング入門ガイド">
              <h3>ホームページは本当に必要？<br>中小企業が得られるメリットとは？</h3>
              <p>無料でダウンロード</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-contentdl-content">
    <div class="container">
      <div class="wrapper">
        <h2>サービス資料</h2>
        <div class="contents">
          <div class="content">
            <a href="https://site.will-corp.co.jp/content-fq349tq4jio" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-contentdl-willsup.png" alt="サブスクホームページサービス「ウィルサポ」">
              <h3>サブスクホームページサービス<br>「ウィルサポ」</h3>
              <p>無料でダウンロード</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="archive-works-btns">
    <div class="container">
      <div class="wrapper">
        <div class="btns-wrapper">
          <div class="works-btn">
            <a href="<?php echo get_page_link(21); ?>">
              <div class="btn-header">
                <h2 class="section-header"><span class="green">p</span>rice</h2>
                <p class="sub-title">料金はこちら</p>
              </div>
              <p class="btns-text">弊社では、お客様の予算やニーズに合わせて柔軟に対応いたします。初回のヒアリングで具体的な要望をお伺いし、ニーズに合わせて最適なプランで提案いたします。</p>
            </a>
          </div>
          <div class="works-btn">
            <a href="<?php echo get_page_link(39); ?>">
              <div class="btn-header">
                <h2 class="section-header"><span class="green">s</span>ervice</h2>
                <p class="sub-title">サービス内容はこちら</p>
              </div>
              <p class="btns-text">サイト制作からウェブマーケティング、SNSなど、ご要望に柔軟に対応させていただきます。お客様に寄り添い、戦略的なアプローチでビジネスの目標達成をサポートいたします。</p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="single-service-contact bg-none">
    <div class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">c</span>ontact</h2>
        <p class="sub-title">お問い合わせ</p>
        <div class="border"></div>
        <p class="content">当社はウェブサイト制作に関するご質問やお見積もりのご依頼、ウェブ戦略に関する相談など、お客様のさまざまなニーズに対応いたします。専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションを提案いたします。お気軽にお問い合わせください。</p>
        <div class="btn">
          <a href="<?php echo get_page_link(15); ?>">お問い合わせはこちら</a>
        </div>
      </div>
    </div>
  </section>

<?php get_footer("v2"); ?>
