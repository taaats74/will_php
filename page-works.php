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
    'url'   => home_url('/willsupport/'),
    'label' => 'WILLSUPPORT',
    'title' => 'ウィルサポ',
    'lead'  => 'BtoB中小企業向けのサブスク型ホームページサービス。月額制でサイト改善まで伴走します。',
  ],
  [
    'url'   => home_url('/will-support-ec/'),
    'label' => 'WILLSUPPORT EC',
    'title' => 'ウィルサポEC',
    'lead'  => 'EC事業者向けのECサイト制作のサブスクサービス。商品登録から運用改善まで伴走します。',
  ],
  [
    'url'   => home_url('/service/web-creative/'),
    'label' => 'WEB CREATIVE',
    'title' => 'Webサイト制作',
    'lead'  => '事業の構造から逆算した、単発のWebサイト制作。比較検討で選ばれる構造を設計します。',
  ],
];
?>

<?php get_header(); ?>

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
<section class="page-topv3-works" id="works">
  <div class="container">
    <div class="wrapper">

      <div class="works-header">
        <p class="en">CASE STUDIES</p>
        <h2>「比較検討で選ばれる」を<br>業種ごとに設計してきました</h2>
        <p class="lead">
          BtoB中小企業に特化し、製造・IT・士業・不動産など幅広い業種のホームページ制作を伴走支援してきました。<br>
          業種は異なっても、「比較検討で選ばれる構造」という設計思想は共通しています。業種ごとの設計意図とあわせて実績をご覧ください。
        </p>
      </div>

      <div class="works-list">
        <?php foreach ( $works_items as $item ) : ?>
          <a href="<?php echo esc_url( $item['url'] ); ?>"
             class="works-card animation-target to-up"
             target="_blank"
             rel="noopener noreferrer"
             aria-label="<?php echo esc_attr( $item['name'] ); ?>のWebサイトを新しいタブで開く">

            <div class="works-card-thumb">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/will-support-v2-assets/img/' . $item['img'] ); ?>"
                   alt="<?php echo esc_attr( $item['name'] ); ?> Webサイト制作実績"
                   width="800" height="450" loading="lazy" decoding="async">
            </div>

            <div class="works-card-body">
              <p class="works-card-name"><?php echo esc_html( $item['name'] ); ?></p>
            </div>

          </a>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<!-- ===================================================== -->
<!-- Section 3: サービス紹介(3カード)                         -->
<!-- ===================================================== -->
<section class="page-topv3-whatwedo" id="services">
  <div class="container">
    <div class="wrapper">

      <div class="whatwedo-header">
        <p class="en">SERVICES</p>
        <h2>提供サービス</h2>
        <p class="lead">
          事業フェーズや課題に合わせて、最適なサービスをご提案します。
        </p>
      </div>

      <div class="whatwedo-list">
        <?php
          $i = 1;
          foreach ( $service_cards as $card ) :
            // ウィルサポ / ウィルサポEC LP は別タブで開く
            $is_external_lp = ( strpos( $card['url'], 'willsupport' ) !== false ) || ( strpos( $card['url'], 'will-support' ) !== false );
        ?>
          <a href="<?php echo esc_url( $card['url'] ); ?>"
             class="whatwedo-item animation-target to-up"<?php if ( $is_external_lp ) : ?>
             target="_blank"
             rel="noopener noreferrer"<?php endif; ?>>
            <div class="whatwedo-item-header">
              <span class="whatwedo-number"><?php echo esc_html( str_pad( $i, 2, '0', STR_PAD_LEFT ) ); ?></span>
              <h3><?php echo esc_html( $card['title'] ); ?></h3>
            </div>
            <p class="whatwedo-body"><?php echo esc_html( $card['lead'] ); ?></p>
            <div class="whatwedo-link">
              <span class="whatwedo-link-text">サービス詳細を見る</span>
              <span class="whatwedo-link-arrow">→</span>
            </div>
          </a>
        <?php
          $i++;
          endforeach;
        ?>
      </div>

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

      <div class="ebooks-cards-grid ebooks-cards-grid--top-featured">
        <?php
          // ebook_pickup タクソノミー = top_featured(トップページ掲載)に紐づく資料を最大4件
          // page-topv3.php と同じ共通パターン
          $top_ebooks = new WP_Query([
            'post_type'      => 'ebooks',
            'posts_per_page' => 4,
            'tax_query'      => [
              [
                'taxonomy' => 'ebook_pickup',
                'field'    => 'slug',
                'terms'    => 'top_featured',
              ],
            ],
            'orderby'        => 'date',
            'order'          => 'DESC',
          ]);

          if ( $top_ebooks->have_posts() ) :
            while ( $top_ebooks->have_posts() ) : $top_ebooks->the_post();
              get_template_part( 'template-parts/ebooks-card', null, [ 'post_id' => get_the_ID() ] );
            endwhile;
            wp_reset_postdata();
          endif;
        ?>
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

        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="contact-v5-cta contact-v5-cta--solid">
          <span class="contact-v5-cta-label">CONTACT</span>
          <span class="contact-v5-cta-text">お問い合わせはこちら</span>
          <span class="contact-v5-cta-arrow">→</span>
        </a>

      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
