<?php
/**
 * Single: ebooks(資料個別ページ)
 *
 * 【編集ガイド】
 * 資料ごとの内容を編集する場合は、このファイルを複製して
 * single-ebooks-{slug}.php として保存し、WordPress側でテンプレートを
 * 切り替える運用も可能です。
 *
 * 各セクションは <!-- ◯◯セクション ここから --> のコメントで区切られています。
 * 編集時はそのコメントを目印に該当箇所を書き換えてください。
 */
?>
<?php get_header('v4'); ?>

<?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();

      $post_id   = get_the_ID();
      $thumb_url = get_the_post_thumbnail_url( $post_id, 'large' );

      // ページ数(カスタムフィールド dl_page_count)
      $page_count = get_post_meta( $post_id, 'dl_page_count', true );

      // HubSpot フォーム ID(これだけは投稿ごとに変わるためカスタムフィールドから取得)
      $hubspot_portal = get_post_meta( $post_id, 'dl_hubspot_portal_id', true );
      $hubspot_form   = get_post_meta( $post_id, 'dl_hubspot_form_id', true );

      // 関連資料の取得(自動で最新4件・2カラム表示)
      $related_ids = get_posts([
        'post_type'      => 'ebooks',
        'posts_per_page' => 4,
        'post__not_in'   => [ $post_id ],
        'fields'         => 'ids',
        'orderby'        => 'date',
        'order'          => 'DESC',
      ]);
?>

<!-- ===================================================== -->
<!-- ページヘッダー(archive-ebooks の .ebooks-header と統一) ここから -->
<!-- ===================================================== -->
<section class="ebooks-single-header">
  <div class="ebooks-single-header__inner">
    <p class="ebooks-single-header__en">EBOOK</p>
    <p class="ebooks-single-header__title">ダウンロード資料</p>
    <!-- リード(直書き・編集箇所) -->
    <p class="ebooks-single-header__lead">
      中小企業がWeb集客で成果を出すための実践ステップを<br>50社以上の支援経験からまとめました。
    </p>
  </div>
</section>
<!-- ページヘッダー ここまで -->

<main class="ebooks-single">
  <div class="ebooks-single__layout">

    <article class="ebooks-single__main">

      <!-- ===================================================== -->
      <!-- カバー画像 + テーマタグ ここから                          -->
      <!-- ===================================================== -->
      <header class="ebooks-hero">

        <!-- テーマカテゴリタグ(WordPress 管理画面の ebook_theme タクソノミーから動的取得 / 未設定時は「BtoBマーケティング」) -->
        <?php
          $hero_themes = get_the_terms( $post_id, 'ebook_theme' );
          $has_themes  = ( ! empty( $hero_themes ) && ! is_wp_error( $hero_themes ) );
        ?>
        <ul class="ebooks-hero__themes">
          <?php if ( $has_themes ) : ?>
            <?php foreach ( $hero_themes as $hero_theme ) : ?>
              <li><?php echo esc_html( $hero_theme->name ); ?></li>
            <?php endforeach; ?>
          <?php else : ?>
            <li>BtoBマーケティング</li>
          <?php endif; ?>
        </ul>

        <!-- 投稿タイトル(動的出力) -->
        <h1 class="ebooks-hero__title"><?php the_title(); ?></h1>

        <!-- カバー画像(アイキャッチを動的出力) -->
        <?php if ( $thumb_url ) : ?>
          <figure class="ebooks-hero__cover">
            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
            <!-- ページ数(カスタムフィールド dl_page_count から動的取得) -->
            <?php if ( $page_count ) : ?>
              <figcaption class="ebooks-hero__pages">全 <?php echo esc_html( $page_count ); ?> ページ</figcaption>
            <?php endif; ?>
          </figure>
        <?php endif; ?>

      </header>
      <!-- カバー画像 + テーマタグ ここまで -->


      <!-- ===================================================== -->
      <!-- SP 専用フォームサイドバー(アイキャッチ直下) ここから -->
      <!-- PC では SCSS で非表示。SP のみアイキャッチの直下に表示。 -->
      <!-- ===================================================== -->
      <aside class="ebooks-form-sidebar ebooks-form-sidebar--top" aria-label="ダウンロードフォーム(SP上部)">
        <div class="ebooks-form-sidebar__inner">

          <h2 class="ebooks-form-sidebar__heading">無料で資料をダウンロード</h2>
          <p class="ebooks-form-sidebar__lead">
            以下のフォームにご記入ください。ご登録いただいたメールアドレスに、資料PDFのダウンロードURLをお送りします。
          </p>

          <?php if ( $hubspot_portal && $hubspot_form ) : ?>
            <div id="hubspot-form-<?php echo esc_attr( $post_id ); ?>-top" class="ebooks-form-sidebar__form"></div>
            <script charset="utf-8" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
            <script>
              (function(){
                if (typeof hbspt === 'undefined') return;
                hbspt.forms.create({
                  region: "na2",
                  portalId: "<?php echo esc_js( $hubspot_portal ); ?>",
                  formId: "<?php echo esc_js( $hubspot_form ); ?>",
                  target: "#hubspot-form-<?php echo esc_js( $post_id ); ?>-top",
                  onFormSubmitted: function() {
                    if (typeof gtag === 'function') {
                      gtag('event', 'form_submit', {
                        'event_category': 'ebook_download',
                        'event_label': '<?php echo esc_js( get_the_title() ); ?>',
                        'ebook_id': '<?php echo esc_js( $post_id ); ?>',
                        'position': 'top'
                      });
                    }
                  }
                });
              })();
            </script>
          <?php else : ?>
            <p class="ebooks-form-sidebar__placeholder">
              フォームを準備中です。お急ぎの方は<a href="/contact/">お問い合わせフォーム</a>からご連絡ください。
            </p>
          <?php endif; ?>

          <p class="ebooks-form-sidebar__privacy">
            ご入力いただいた情報は<a href="/privacy-policy/">プライバシーポリシー</a>に基づき適切に管理します。
          </p>

        </div>
      </aside>
      <!-- SP 専用フォームサイドバー ここまで -->


      <!-- ===================================================== -->
      <!-- 本文(WordPress 管理画面 / 投稿エディタの内容を出力) ここから -->
      <!-- 投稿の本文に「こんな方におすすめ / この資料でわかること / 資料の目次 / 制作背景」を記述すると、ここに反映されます。 -->
      <!-- 下のコメントアウト部分(直書きサンプル)は参考用に残しています。 -->
      <!-- ===================================================== -->
      <section class="ebooks-content">
        <?php the_content(); ?>
      </section>
      <!-- 本文 ここまで -->


      <!-- ===================================================== -->
      <!-- こんな方におすすめ ここから                             -->
      <!-- ===================================================== -->
      <!-- <section class="ebooks-target">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">FOR YOU</span>
          こんな方におすすめ
        </h2>
        <ul class="ebooks-target__list">
          <li><span class="ebooks-target__check" aria-hidden="true">✓</span>Webからの集客を増やしたいが、どの施策が効果的かわからない方</li>
          <li><span class="ebooks-target__check" aria-hidden="true">✓</span>ホームページやSNSを活用しているが、問い合わせや売上につながらない方</li>
          <li><span class="ebooks-target__check" aria-hidden="true">✓</span>少ない予算・人員でも実践できるWebマーケティングの方法を知りたい方</li>
          <li><span class="ebooks-target__check" aria-hidden="true">✓</span>社内に専任のWeb担当者がいない方</li>
          <li><span class="ebooks-target__check" aria-hidden="true">✓</span>これからBtoBマーケティングを本格的に始めたい方</li>
        </ul>
      </section> -->
      <!-- こんな方におすすめ ここまで -->


      <!-- ===================================================== -->
      <!-- この資料でわかること ここから                            -->
      <!-- ===================================================== -->
      <!-- <section class="ebooks-benefits">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">BENEFITS</span>
          この資料でわかること
        </h2>
        <ol class="ebooks-benefits__list">
          <li>
            <span class="ebooks-benefits__num">01</span>
            <span class="ebooks-benefits__text">中小企業が成果を出すためのWebマーケティングの基本と成功ステップ</span>
          </li>
          <li>
            <span class="ebooks-benefits__num">02</span>
            <span class="ebooks-benefits__text">「アクセスが増えない」「問い合わせが少ない」など、よくある課題の解決策</span>
          </li>
          <li>
            <span class="ebooks-benefits__num">03</span>
            <span class="ebooks-benefits__text">限られたリソースでも実践できるデジタルマーケティングの手法</span>
          </li>
          <li>
            <span class="ebooks-benefits__num">04</span>
            <span class="ebooks-benefits__text">自社サイトの現状を客観的に診断するチェックポイント</span>
          </li>
        </ol>
      </section> -->
      <!-- この資料でわかること ここまで -->


      <!-- ===================================================== -->
      <!-- 資料の目次 ここから                                     -->
      <!-- ===================================================== -->
      <!-- <section class="ebooks-toc">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">CONTENTS</span>
          資料の目次
        </h2>
        <ol class="ebooks-toc__list">
          <li class="ebooks-toc__item">
            <span class="ebooks-toc__label">第1章</span>
            <div class="ebooks-toc__body">
              <h3 class="ebooks-toc__title">中小企業を取り巻くWeb集客の現状</h3>
              <p class="ebooks-toc__desc">市場環境の変化と、なぜ今Webマーケティングが必要なのかを解説します</p>
            </div>
          </li>
          <li class="ebooks-toc__item">
            <span class="ebooks-toc__label">第2章</span>
            <div class="ebooks-toc__body">
              <h3 class="ebooks-toc__title">成果を出すための戦略設計</h3>
              <p class="ebooks-toc__desc">目的・ターゲット・KPIを定める基本フレームワークを紹介します</p>
            </div>
          </li>
          <li class="ebooks-toc__item">
            <span class="ebooks-toc__label">第3章</span>
            <div class="ebooks-toc__body">
              <h3 class="ebooks-toc__title">具体的な施策と優先順位</h3>
              <p class="ebooks-toc__desc">SEO・コンテンツ・SNS・MAなど主要施策の選び方を整理します</p>
            </div>
          </li>
          <li class="ebooks-toc__item">
            <span class="ebooks-toc__label">第4章</span>
            <div class="ebooks-toc__body">
              <h3 class="ebooks-toc__title">運用と改善のサイクル</h3>
              <p class="ebooks-toc__desc">PDCAを回すための具体的な指標と運用方法を解説します</p>
            </div>
          </li>
          <li class="ebooks-toc__item">
            <span class="ebooks-toc__label">第5章</span>
            <div class="ebooks-toc__body">
              <h3 class="ebooks-toc__title">よくある失敗例と回避策</h3>
              <p class="ebooks-toc__desc">支援企業の事例から学ぶ、つまずきやすいポイントをまとめます</p>
            </div>
          </li>
        </ol>
      </section> -->
      <!-- 資料の目次 ここまで -->


      <!-- ===================================================== -->
      <!-- 制作背景 ここから                                       -->
      <!-- ===================================================== -->
      <!-- <section class="ebooks-message">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">MESSAGE</span>
          本資料を作成した背景
        </h2>
        <p class="ebooks-message__body">
          これまで50社以上のBtoB企業様のWebマーケティング支援に関わる中で、ご相談の最初の段階で同じ課題が繰り返し話題にあがることに気づきました。本資料は、その「最初に確認しておきたい視点」を一冊にまとめたものです。Webマーケティングの専門知識がない方でも、自社の現状を客観的に把握し、次に取るべき一歩が見える構成にしました。
        </p>
      </section> -->
      <!-- 制作背景 ここまで -->


      <!-- ===================================================== -->
      <!-- 監修者・運営会社 ここから                                -->
      <!-- ===================================================== -->
      <section class="ebooks-author">
        <h2 class="ebooks-section-title">
          <span class="ebooks-section-title__en">AUTHOR</span>
          監修者・運営会社
        </h2>
        <div class="ebooks-author__card">
          <div class="ebooks-author__photo">
            <!-- 編集箇所:著者写真のパスを直書き -->
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/page-top2-tatsuya-img.png" alt="高橋 竜也">
          </div>
          <div class="ebooks-author__text">
            <!-- 編集箇所:著者情報を直書き -->
            <p class="ebooks-author__name">高橋 竜也</p>
            <p class="ebooks-author__title">合同会社ウィル 代表</p>
            <p class="ebooks-author__bio">
              BtoB企業向けWebマーケティング支援を専門とし、これまで50社以上の集客・仕組み化を支援。サブスクリプション型WordPressサイト制作サービス「ウィルサポ」、EC支援サービス「ウィルサポEC」を運営。
            </p>
          </div>
        </div>
        <dl class="ebooks-author__company">
          <!-- 会社情報(基本固定・必要に応じて編集) -->
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
            <dd>BtoBマーケティング支援、Webサイト制作、EC構築支援</dd>
          </div>
        </dl>
      </section>
      <!-- 監修者・運営会社 ここまで -->


      <!-- ===================================================== -->
      <!-- 関連資料 ここから(動的出力)                             -->
      <!-- ===================================================== -->
      <?php if ( ! empty( $related_ids ) ) : ?>
        <section class="ebooks-related">
          <h2 class="ebooks-section-title">
            <span class="ebooks-section-title__en">RELATED</span>
            その他のダウンロード資料
          </h2>
          <div class="ebooks-cards-grid ebooks-cards-grid--related">
            <?php foreach ( $related_ids as $rid ) : ?>
              <?php get_template_part( 'template-parts/ebooks-card', null, [ 'post_id' => (int) $rid ] ); ?>
            <?php endforeach; ?>
          </div>
          <p class="ebooks-related__more">
            <a href="<?php echo esc_url( get_post_type_archive_link( 'ebooks' ) ); ?>">資料一覧をすべて見る →</a>
          </p>
        </section>
      <?php endif; ?>
      <!-- 関連資料 ここまで -->

    </article>


    <!-- ===================================================== -->
    <!-- 右カラム:HubSpotフォーム(sticky)                       -->
    <!-- ===================================================== -->
    <aside class="ebooks-form-sidebar" aria-label="ダウンロードフォーム">
      <div class="ebooks-form-sidebar__inner">

        <?php if ( $thumb_url ) : ?>
          <div class="ebooks-form-sidebar__thumb">
            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
          </div>
        <?php endif; ?>

        <!-- フォーム見出し・リード(直書き) -->
        <h2 class="ebooks-form-sidebar__heading">無料で資料をダウンロード</h2>
        <p class="ebooks-form-sidebar__lead">
          以下のフォームにご記入ください。ご登録いただいたメールアドレスに、資料PDFのダウンロードURLをお送りします。
        </p>

        <!-- HubSpotフォーム(動的) -->
        <?php if ( $hubspot_portal && $hubspot_form ) : ?>
          <div id="hubspot-form-<?php echo esc_attr( $post_id ); ?>" class="ebooks-form-sidebar__form"></div>
          <script charset="utf-8" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
          <script>
            (function(){
              if (typeof hbspt === 'undefined') return;
              hbspt.forms.create({
                region: "na2",
                portalId: "<?php echo esc_js( $hubspot_portal ); ?>",
                formId: "<?php echo esc_js( $hubspot_form ); ?>",
                target: "#hubspot-form-<?php echo esc_js( $post_id ); ?>",
                onFormSubmitted: function() {
                  if (typeof gtag === 'function') {
                    gtag('event', 'form_submit', {
                      'event_category': 'ebook_download',
                      'event_label': '<?php echo esc_js( get_the_title() ); ?>',
                      'ebook_id': '<?php echo esc_js( $post_id ); ?>',
                      'position': 'sidebar'
                    });
                  }
                }
              });
            })();
          </script>
        <?php else : ?>
          <p class="ebooks-form-sidebar__placeholder">
            フォームを準備中です。お急ぎの方は<a href="/contact/">お問い合わせフォーム</a>からご連絡ください。
          </p>
        <?php endif; ?>

        <p class="ebooks-form-sidebar__privacy">
          ご入力いただいた情報は<a href="/privacy-policy/">プライバシーポリシー</a>に基づき適切に管理します。
        </p>

      </div>
    </aside>

  </div>
</main>

<?php
    endwhile;
  endif;
?>

<?php get_footer( 'v3' ); ?>
