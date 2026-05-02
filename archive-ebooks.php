<?php
/**
 * Archive: ebooks(資料一覧)
 * URL: /ebooks/
 *
 * - お役立ち資料 / サービス紹介資料 のタブ切替
 * - 件数・ピックアップは ebook_type / ebook_pickup タクソノミーから動的生成
 * - サービス紹介はテーマ別(ebook_theme)に分割表示
 */
?>
<?php get_header('v4'); ?>

<?php
  $useful_count_posts  = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'tax_query'      => [[
      'taxonomy' => 'ebook_type',
      'field'    => 'slug',
      'terms'    => 'useful',
    ]],
    'no_found_rows'  => true,
  ]);
  $useful_count = count( $useful_count_posts );

  $service_count_posts = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => -1,
    'fields'         => 'ids',
    'tax_query'      => [[
      'taxonomy' => 'ebook_type',
      'field'    => 'slug',
      'terms'    => 'service',
    ]],
    'no_found_rows'  => true,
  ]);
  $service_count = count( $service_count_posts );

  $total_count = $useful_count + $service_count;

  /**
   * 資料カードを描画するヘルパ
   * 実装は template-parts/ebooks-card.php に切り出し済み。
   * single-ebooks.php からも同パーツを利用してマークアップ統一。
   *
   * @param int $post_id
   */
  if ( ! function_exists( 'will_ebooks_render_card' ) ) {
    function will_ebooks_render_card( $post_id ) {
      get_template_part( 'template-parts/ebooks-card', null, [ 'post_id' => (int) $post_id ] );
    }
  }

  // ピックアップ取得
  $pickup_useful = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => 3,
    'tax_query'      => [
      'relation' => 'AND',
      [ 'taxonomy' => 'ebook_type',   'field' => 'slug', 'terms' => 'useful' ],
      [ 'taxonomy' => 'ebook_pickup', 'field' => 'slug', 'terms' => 'archive_featured' ],
    ],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  $pickup_service = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => 3,
    'tax_query'      => [
      'relation' => 'AND',
      [ 'taxonomy' => 'ebook_type',   'field' => 'slug', 'terms' => 'service' ],
      [ 'taxonomy' => 'ebook_pickup', 'field' => 'slug', 'terms' => 'archive_featured' ],
    ],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  // 全資料
  $all_posts = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  // 全資料パネル用のピックアップ(useful / service の archive_featured を統合)
  $pickup_all = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => 6,
    'tax_query'      => [[
      'taxonomy' => 'ebook_pickup',
      'field'    => 'slug',
      'terms'    => 'archive_featured',
    ]],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  // 全 useful
  $useful_posts = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => -1,
    'tax_query'      => [[
      'taxonomy' => 'ebook_type',
      'field'    => 'slug',
      'terms'    => 'useful',
    ]],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  // service をテーマで分類
  $service_posts = get_posts([
    'post_type'      => 'ebooks',
    'posts_per_page' => -1,
    'tax_query'      => [[
      'taxonomy' => 'ebook_type',
      'field'    => 'slug',
      'terms'    => 'service',
    ]],
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);

  // テーマ別グルーピング(主要3テーマ + その他)
  $theme_groups = [
    'willsuppo'           => [ 'label' => 'ウィルサポ',           'items' => [] ],
    'willsuppo-ec'        => [ 'label' => 'ウィルサポEC',         'items' => [] ],
    'partner-program'     => [ 'label' => 'パートナープログラム', 'items' => [] ],
    'other'               => [ 'label' => 'その他',               'items' => [] ],
  ];
  foreach ( $service_posts as $sp ) {
    $themes = get_the_terms( $sp->ID, 'ebook_theme' );
    $matched = false;
    if ( ! empty( $themes ) && ! is_wp_error( $themes ) ) {
      foreach ( $themes as $t ) {
        if ( isset( $theme_groups[ $t->slug ] ) ) {
          $theme_groups[ $t->slug ]['items'][] = $sp->ID;
          $matched = true;
          break;
        }
      }
    }
    if ( ! $matched ) {
      $theme_groups['other']['items'][] = $sp->ID;
    }
  }
?>

<main class="ebooks-archive">

  <section class="ebooks-header">
    <div class="ebooks-header__inner">
      <p class="ebooks-header__en">EBOOKS</p>
      <h1 class="ebooks-header__title">ダウンロード資料一覧</h1>
      <p class="ebooks-header__lead">
        BtoB マーケティングや Web 戦略に役立つ資料を無料でご提供しています。<br>
        貴社の課題に合わせて、必要な一冊をお選びください。
      </p>
      <p class="ebooks-header__count">
        現在 <strong><?php echo esc_html( $total_count ); ?></strong> 本の資料を公開中
      </p>
    </div>
  </section>

  <div class="ebooks-tabs-wrap">
    <div class="ebooks-tabs" role="tablist" aria-label="資料カテゴリ">
      <button
        type="button"
        class="ebooks-tabs__btn is-active"
        role="tab"
        aria-selected="true"
        aria-controls="ebooks-panel-all"
        id="ebooks-tab-all"
        data-tab="all"
      >
        <span class="ebooks-tabs__label">全ての資料</span>
        <span class="ebooks-tabs__count">(<?php echo esc_html( $total_count ); ?>)</span>
      </button>
      <button
        type="button"
        class="ebooks-tabs__btn"
        role="tab"
        aria-selected="false"
        aria-controls="ebooks-panel-useful"
        id="ebooks-tab-useful"
        tabindex="-1"
        data-tab="useful"
      >
        <span class="ebooks-tabs__label">お役立ち資料</span>
        <span class="ebooks-tabs__count">(<?php echo esc_html( $useful_count ); ?>)</span>
      </button>
      <button
        type="button"
        class="ebooks-tabs__btn"
        role="tab"
        aria-selected="false"
        aria-controls="ebooks-panel-service"
        id="ebooks-tab-service"
        tabindex="-1"
        data-tab="service"
      >
        <span class="ebooks-tabs__label">サービス紹介資料</span>
        <span class="ebooks-tabs__count">(<?php echo esc_html( $service_count ); ?>)</span>
      </button>
    </div>
  </div>

  <!-- 全ての資料パネル -->
  <section
    id="ebooks-panel-all"
    class="ebooks-tab-panel is-active"
    role="tabpanel"
    aria-labelledby="ebooks-tab-all"
    data-panel="all"
  >
    <div class="ebooks-tab-panel__inner">

      <?php if ( ! empty( $pickup_all ) ) : ?>
        <div class="ebooks-pickup">
          <h2 class="ebooks-section-title">
            <span class="ebooks-section-title__en">PICK UP</span>
            注目の資料
          </h2>
          <div class="ebooks-cards-grid ebooks-cards-grid--pickup">
            <?php foreach ( $pickup_all as $p ) : will_ebooks_render_card( $p->ID ); endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="ebooks-list">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">ALL</span>
          すべての資料
        </h2>
        <?php if ( ! empty( $all_posts ) ) : ?>
          <div class="ebooks-cards-grid">
            <?php foreach ( $all_posts as $p ) : will_ebooks_render_card( $p->ID ); endforeach; ?>
          </div>
        <?php else : ?>
          <p class="ebooks-empty">現在公開中の資料はありません。</p>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <!-- お役立ち資料パネル -->
  <section
    id="ebooks-panel-useful"
    class="ebooks-tab-panel"
    role="tabpanel"
    aria-labelledby="ebooks-tab-useful"
    data-panel="useful"
    hidden
  >
    <div class="ebooks-tab-panel__inner">

      <?php if ( ! empty( $pickup_useful ) ) : ?>
        <div class="ebooks-pickup">
          <h2 class="ebooks-section-title">
            <span class="ebooks-section-title__en">PICK UP</span>
            注目の資料
          </h2>
          <div class="ebooks-cards-grid ebooks-cards-grid--pickup">
            <?php foreach ( $pickup_useful as $p ) : will_ebooks_render_card( $p->ID ); endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="ebooks-list">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">USEFUL</span>
          お役立ち資料一覧
        </h2>
        <?php if ( ! empty( $useful_posts ) ) : ?>
          <div class="ebooks-cards-grid">
            <?php foreach ( $useful_posts as $p ) : will_ebooks_render_card( $p->ID ); endforeach; ?>
          </div>
        <?php else : ?>
          <p class="ebooks-empty">現在公開中の資料はありません。</p>
        <?php endif; ?>
      </div>

      <aside class="ebooks-cta-banner">
        <div class="ebooks-cta-banner__inner">
          <p class="ebooks-cta-banner__label">RECOMMEND</p>
          <h3 class="ebooks-cta-banner__title">
            BtoB 中小企業の Web 営業基盤を、<br>
            月額制で支える「ウィルサポ」
          </h3>
          <p class="ebooks-cta-banner__lead">
            戦略設計・サイト改善・運用支援までワンストップ。<br>
            まずは無料で診断・相談からどうぞ。
          </p>
          <div class="ebooks-cta-banner__buttons">
            <a href="/willsupport/" class="ebooks-cta-banner__btn ebooks-cta-banner__btn--primary">ウィルサポ詳細</a>
            <a href="/diagnosis/" class="ebooks-cta-banner__btn ebooks-cta-banner__btn--secondary">1分でできる無料診断</a>
          </div>
        </div>
      </aside>

    </div>
  </section>

  <!-- サービス紹介資料パネル -->
  <section
    id="ebooks-panel-service"
    class="ebooks-tab-panel"
    role="tabpanel"
    aria-labelledby="ebooks-tab-service"
    data-panel="service"
    hidden
  >
    <div class="ebooks-tab-panel__inner">

      <?php if ( ! empty( $pickup_service ) ) : ?>
        <div class="ebooks-pickup">
          <h2 class="ebooks-section-title">
            <span class="ebooks-section-title__en">PICK UP</span>
            注目の資料
          </h2>
          <div class="ebooks-cards-grid ebooks-cards-grid--pickup">
            <?php foreach ( $pickup_service as $p ) : will_ebooks_render_card( $p->ID ); endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="ebooks-list">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">SERVICES</span>
          サービス紹介資料一覧
        </h2>

        <?php if ( ! empty( $service_posts ) ) : ?>
          <?php foreach ( $theme_groups as $slug => $group ) : ?>
            <?php if ( empty( $group['items'] ) ) continue; ?>
            <div class="ebooks-list ebooks-list--by-theme" data-theme="<?php echo esc_attr( $slug ); ?>">
              <div class="ebooks-cards-grid">
                <?php foreach ( $group['items'] as $pid ) : will_ebooks_render_card( $pid ); endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p class="ebooks-empty">現在公開中のサービス紹介資料はありません。</p>
        <?php endif; ?>
      </div>

      <aside class="ebooks-cta-banner ebooks-cta-banner--alt">
        <div class="ebooks-cta-banner__inner">
          <p class="ebooks-cta-banner__label">CONTACT</p>
          <h3 class="ebooks-cta-banner__title">
            導入・運用について、<br>
            お気軽にご相談ください。
          </h3>
          <p class="ebooks-cta-banner__lead">
            貴社の状況に合わせて、最適な活用方法をご提案します。
          </p>
          <div class="ebooks-cta-banner__buttons">
            <a href="<?php echo esc_url( get_page_link( 15 ) ); ?>" class="ebooks-cta-banner__btn ebooks-cta-banner__btn--primary">無料相談はこちら</a>
          </div>
        </div>
      </aside>

    </div>
  </section>

  <!-- 信頼性ブロック(タブ非連動) -->
  <section class="ebooks-trust" aria-labelledby="ebooks-trust-title">
    <div class="ebooks-trust__inner">
      <h2 id="ebooks-trust-title" class="ebooks-trust__title">
        <span class="ebooks-trust__title-en">RELIABILITY</span>
        資料の作成元について
      </h2>

      <div class="ebooks-trust__author">
        <div class="ebooks-trust__author-photo">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/page-top2-tatsuya-img.png" alt="高橋 竜也">
        </div>
        <div class="ebooks-trust__author-text">
          <p class="ebooks-trust__author-name">高橋 竜也</p>
          <p class="ebooks-trust__author-title">合同会社ウィル 代表</p>
          <p class="ebooks-trust__author-bio">
            これまで 50 社以上の BtoB 中小企業様の Web 戦略・営業基盤設計を支援。
            「営業構造から逆算した Web 設計」をテーマに、現場で得た知見を資料化しています。
          </p>
        </div>
      </div>

      <dl class="ebooks-trust__company">
        <div>
          <dt>会社名</dt>
          <dd>合同会社ウィル</dd>
        </div>
        <div>
          <dt>所在地</dt>
          <dd>〒812-0011 福岡県福岡市博多区博多駅前1-23-2 ParkFront博多駅前1丁目5F-B</dd>
        </div>
        <div>
          <dt>事業内容</dt>
          <dd>BtoB マーケティング支援 / Web サイト制作 / MA・SEO・コンテンツ運用支援</dd>
        </div>
      </dl>

    </div>
  </section>

</main>

<?php get_footer( 'v3' ); ?>
