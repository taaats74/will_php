<?php
/*
Template Name: 制作実績(works)
Template Post Type: page
*/

$works_items = [
  [
    'name' => 'ジャパンマーベラス様',
    'url'  => 'https://japanmarvelous.com/',
    'img'  => 'marvelous.png',
    'tag'  => 'BtoB',
  ],
  [
    'name' => '株式会社システムライン様',
    'url'  => 'https://systemline.jp/',
    'img'  => 'systemline.png',
    'tag'  => 'BtoB',
  ],
  [
    'name' => '株式会社OTG講習センター様',
    'url'  => 'https://otg-koushu.com/',
    'img'  => 'otg.png',
    'tag'  => 'BtoB講習',
  ],
  [
    'name' => '株式会社Mr財務屋様',
    'url'  => 'https://mrzaimuya.com/',
    'img'  => 'mrzaimuya.png',
    'tag'  => '税務・財務',
  ],
  [
    'name' => '株式会社みつや様',
    'url'  => 'https://mitsuyaweb.jp/',
    'img'  => 'mitsuya.png',
    'tag'  => 'BtoB',
  ],
  [
    'name' => '株式会社フラッグス様',
    'url'  => 'https://flags-guide.com/',
    'img'  => 'flags.png',
    'tag'  => 'BtoB',
  ],
  [
    'name' => '村岡測量登記事務所様',
    'url'  => 'https://muraoka-touki.com/',
    'img'  => 'muraoka.png',
    'tag'  => '士業',
  ],
  [
    'name' => '株式会社maru-suru様',
    'url'  => 'https://maru-suru.com/',
    'img'  => 'maru-suru.png',
    'tag'  => 'BtoB',
  ],
  [
    'name' => '株式会社GRIT様',
    'url'  => 'https://gritcoco-realestate.com/',
    'img'  => 'grit.png',
    'tag'  => '不動産',
  ],
  [
    'name' => '株式会社Lily様',
    'url'  => 'https://lilyproductionjp.com/',
    'img'  => 'lily.png',
    'tag'  => 'BtoB',
  ],
];

$service_cards = [
  [
    // TODO: URL要確認(/willsupport/v2/ は暫定値)
    'url'   => home_url('/willsupport/v2/'),
    'label' => 'WILLSUPPORT',
    'title' => 'ウィルサポ',
    'lead'  => 'BtoB中小企業向けのサブスク型ホームページサービス。月額制でサイト改善まで伴走します。',
  ],
  [
    'url'   => home_url('/will-support-ec/'),
    'label' => 'WILLSUPPORT EC',
    'title' => 'ウィルサポEC',
    'lead'  => 'EC事業者向けのShopifyベースサブスクサービス。商品登録から運用改善まで伴走します。',
  ],
  [
    // TODO: URL要確認(/service/web/ は暫定値)
    'url'   => home_url('/service/web/'),
    'label' => 'WEB CREATIVE',
    'title' => 'Webサイト制作',
    'lead'  => '事業の構造から逆算した、単発のWebサイト制作。比較検討で選ばれる構造を設計します。',
  ],
];
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'WORKS',
  'title' => '制作実績',
  'lead'  => '中小企業の事業成長に伴走したWebサイト・ECサイトの制作実績をご紹介します。',
] );
?>

<!-- ===================================================== -->
<!-- Section 2: 制作実績一覧                                  -->
<!-- ===================================================== -->
<section class="page-works__works" id="works">
  <div class="container">
    <div class="wrapper">

      <div class="page-works__works-head">
        <p class="page-works__eyebrow">CASE STUDIES</p>
        <h2 class="page-works__works-title">「比較検討で選ばれる」を、<br>業種ごとに設計してきました</h2>
        <p class="page-works__works-lead">
          BtoB中小企業に特化し、製造・IT・士業・不動産など幅広い業種のホームページ制作を伴走支援してきました。<br>
          業種は異なっても、「比較検討で選ばれる構造」という設計思想は共通しています。業種ごとの設計意図とあわせて実績をご覧ください。
        </p>
      </div>

      <ul class="page-works__list">
        <?php foreach ( $works_items as $item ) : ?>
          <li class="page-works__card">
            <a href="<?php echo esc_url( $item['url'] ); ?>"
               class="page-works__card-link"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="<?php echo esc_attr( $item['name'] ); ?>のWebサイトを新しいタブで開く">
              <div class="page-works__card-thumb">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/will-support-v2-assets/img/' . $item['img'] ); ?>"
                     alt="<?php echo esc_attr( $item['name'] ); ?> Webサイト制作実績"
                     width="800" height="450" loading="lazy" decoding="async">
              </div>
              <div class="page-works__card-body">
                <p class="page-works__card-name"><?php echo esc_html( $item['name'] ); ?></p>
                <span class="page-works__card-tag"><?php echo esc_html( $item['tag'] ); ?></span>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 3: サービス紹介(3カード)                         -->
<!-- ===================================================== -->
<section class="page-works__services" id="services">
  <div class="container">
    <div class="wrapper">

      <div class="page-works__services-head">
        <p class="page-works__eyebrow">SERVICES</p>
        <h2 class="page-works__services-title">提供サービス</h2>
        <p class="page-works__services-lead">
          事業フェーズや課題に合わせて、最適なサービスをご提案します。
        </p>
      </div>

      <ul class="page-works__services-list">
        <?php foreach ( $service_cards as $card ) : ?>
          <li class="page-works__service-card">
            <a href="<?php echo esc_url( $card['url'] ); ?>" class="page-works__service-link">
              <p class="page-works__service-label"><?php echo esc_html( $card['label'] ); ?></p>
              <h3 class="page-works__service-title"><?php echo esc_html( $card['title'] ); ?></h3>
              <p class="page-works__service-lead"><?php echo esc_html( $card['lead'] ); ?></p>
              <span class="page-works__service-cta">
                <span class="page-works__service-cta-text">詳しく見る</span>
                <span class="page-works__service-cta-arrow">→</span>
              </span>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 4: 無料診断 CTA(page-topv3-diagnosis 構造踏襲)  -->
<!-- ===================================================== -->
<section class="page-topv3-diagnosis" id="diagnosis-banner">
  <div class="container">

    <div class="diagnosis-section-head">
      <span class="diagnosis-eyebrow">DIAGNOSIS</span>
      <h2 class="diagnosis-title">
        1分の入力で、<br class="pc">
        貴社のBtoBマーケで<span class="diagnosis-keyword">「最優先すべき一手」</span>が見えます。
      </h2>
      <p class="diagnosis-lead">
        運用体制・現在の施策・抱えている課題。<br class="pc">
        10問の質問からウィルが構造的に分析し、改善すべき優先順位をまとめたレポートをお送りします。
      </p>
    </div>

    <div class="diagnosis-panel">
      <h3 class="diagnosis-panel-title">無料診断レポートをお送りします</h3>
      <p class="diagnosis-panel-text">所要時間は1分。面談は不要です。<br>回答内容に基づき、貴社の優先課題と取り組むべき一手をまとめた個別レポートを送付します。</p>
      <ul class="diagnosis-features">
        <li>所要1分</li>
        <li>面談不要</li>
        <li>個別レポート送付</li>
      </ul>
      <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>" class="diagnosis-btn">1分でできる無料診断を受ける</a>
    </div>

  </div>
</section>

<!-- ===================================================== -->
<!-- Section 5: 資料DL(page-topv3-ebook 構造踏襲)             -->
<!-- ===================================================== -->
<section class="page-topv3-ebook" id="ebook">
  <div class="container">
    <div class="wrapper">

      <div class="ebook-header">
        <p class="en">DOWNLOAD</p>
        <h2>
          BtoBマーケの実務ナレッジを、<br>
          資料にまとめて公開しています。
        </h2>
        <p class="lead">
          戦略全体の見取り図から、サイト改善・MA連携・コンテンツSEOまで。<br class="pc">
          BtoBマーケの実務で活用できる4つの資料を、無料でダウンロードいただけます。
        </p>
      </div>

      <div class="ebook-cards">

        <a href="#" class="ebook-card ebook-card--01">
          <div class="ebook-card-thumb">
            <div class="ebook-card-thumb-placeholder">
              <span class="ebook-card-no">EBOOK 01</span>
            </div>
          </div>
          <div class="ebook-card-body">
            <h3 class="ebook-card-title">BtoB Webマーケティング<br>戦略ロードマップ</h3>
            <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">BtoBマーケの全体像を、1冊で。</span></p>
            <p class="ebook-card-desc">
              Webサイト・SEO・MA・コンテンツまで、BtoBマーケに必要な打ち手の全体像と進め方を体系的に整理した総合ガイドです。
            </p>
            <span class="ebook-card-cta">
              <span class="ebook-card-cta-text">資料をダウンロード</span>
              <span class="ebook-card-cta-arrow">→</span>
            </span>
          </div>
        </a>

        <a href="#" class="ebook-card ebook-card--02">
          <div class="ebook-card-thumb">
            <div class="ebook-card-thumb-placeholder">
              <span class="ebook-card-no">EBOOK 02</span>
            </div>
          </div>
          <div class="ebook-card-body">
            <h3 class="ebook-card-title">商談化率を上げる<br>BtoBサイトの設計原則</h3>
            <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">サイトを、商談につながる構造に。</span></p>
            <p class="ebook-card-desc">
              「制作したのに問い合わせが来ない」をなくす、BtoBサイトの設計原則を解説。営業構造から逆算したサイト設計の考え方をまとめました。
            </p>
            <span class="ebook-card-cta">
              <span class="ebook-card-cta-text">資料をダウンロード</span>
              <span class="ebook-card-cta-arrow">→</span>
            </span>
          </div>
        </a>

        <a href="#" class="ebook-card ebook-card--03">
          <div class="ebook-card-thumb">
            <div class="ebook-card-thumb-placeholder">
              <span class="ebook-card-no">EBOOK 03</span>
            </div>
          </div>
          <div class="ebook-card-body">
            <h3 class="ebook-card-title">Web×MA連携設計図</h3>
            <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">WebとMAを<br>営業の仕組みに変える。</span></p>
            <p class="ebook-card-desc">
              Webサイトで獲得したリードを、MAで育成し、商談につなげるまでの設計図。ツール導入だけで止まらないMA活用の本質を解説します。
            </p>
            <span class="ebook-card-cta">
              <span class="ebook-card-cta-text">資料をダウンロード</span>
              <span class="ebook-card-cta-arrow">→</span>
            </span>
          </div>
        </a>

        <a href="#" class="ebook-card ebook-card--04">
          <div class="ebook-card-thumb">
            <div class="ebook-card-thumb-placeholder">
              <span class="ebook-card-no">EBOOK 04</span>
            </div>
          </div>
          <div class="ebook-card-body">
            <h3 class="ebook-card-title">BtoBコンテンツ<br>SEO実践ガイド</h3>
            <p class="ebook-card-catch-wrap"><span class="ebook-card-catch">検索流入を、商談につなげる。</span></p>
            <p class="ebook-card-desc">
              検索順位ではなく商談化率で見るBtoBコンテンツSEOの考え方と、キーワード戦略・記事構造・運用設計を実装手順としてまとめた実践ガイドです。
            </p>
            <span class="ebook-card-cta">
              <span class="ebook-card-cta-text">資料をダウンロード</span>
              <span class="ebook-card-cta-arrow">→</span>
            </span>
          </div>
        </a>

      </div>

      <div class="ebook-bottom-cta">
        <a href="<?php echo esc_url( home_url('/ebooks/') ); ?>" class="ebook-bottom-cta-link">
          <span class="ebook-bottom-cta-text">ダウンロード資料一覧はこちら</span>
          <span class="ebook-bottom-cta-arrow">→</span>
        </a>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 6: 問い合わせ(page-topv3-contact-v5 構造踏襲)    -->
<!-- ===================================================== -->
<section class="page-topv3-contact-v5" id="contact">
  <div class="container">
    <div class="wrapper">

      <div class="contact-v5-header">
        <p class="contact-v5-en">CONTACT</p>
        <h2 class="contact-v5-section-title">お問い合わせ</h2>
      </div>

      <h3 class="contact-v5-headline">
        <span class="contact-v5-headline-keyword">「次の一手」</span>を、<br>
        一緒に考えましょう。
      </h3>

      <p class="contact-v5-lead">
        BtoBマーケの戦略整理、Webサイト制作、MA・SEO・コンテンツ運用支援。<br class="pc">
        貴社の状況に合わせて、最適な一手を一緒に考えます。まずはお気軽にご相談ください。
      </p>

      <div class="contact-v5-cta-group">

        <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>" class="contact-v5-cta contact-v5-cta--outline">
          <span class="contact-v5-cta-label">DIAGNOSIS</span>
          <span class="contact-v5-cta-text">1分でできる無料診断</span>
          <span class="contact-v5-cta-arrow">→</span>
        </a>

        <a href="<?php echo esc_url( get_page_link(15) ); ?>" class="contact-v5-cta contact-v5-cta--solid">
          <span class="contact-v5-cta-label">CONTACT</span>
          <span class="contact-v5-cta-text">お問い合わせはこちら</span>
          <span class="contact-v5-cta-arrow">→</span>
        </a>

      </div>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
