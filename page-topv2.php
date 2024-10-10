<?php
  /*
  Template Name: Page Top Ver.2
  Template Post Type: page
  */
?>

  <?php get_header("topv2"); ?>

  <div class="loading-container">
    <section class="page-top2-fv pc">
      <div class="container">
        <div class="wrapper">
          <header class="page-top2-header">
            <?php
              wp_nav_menu(array(
                'theme_location' => 'header-menu-top',
                'container' => 'nav',
                'before' => '<span></span>'
              ));
            ?>
          </header>
          <div class="bg-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-fv.png" alt="">
          </div>
          <div class="logo-wrapper">
            <div class="logo-text">
              <p class="text1">Web marketing & design</p>
              <p class="text2">Branding Agency</p>
            </div>
            <h1 class="logo-img">
              <a href="<?php echo home_url( '/' ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-header-logo.png" alt="合同会社ウィル 福岡 ウェブ制作 ウェブマーケティング ホームページ制作">
              </a>
            </h1>
          </div>
          <div class="fv-message-wrapper">
            <p class="en">Create the future together.</p>
            <p class="ja">ともに、未来を創る</p>
          </div>
          <div class="mail-icon">
            <a href="<?php echo get_page_link(15); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-mail-icon.png" alt="">
            </a>
          </div>
          <div class="scroll"></div>
        </div>
      </div>
    </section>

    <section class="page-top2-fv-sp sp">
      <div class="container">
        <div class="wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-sp_top.jpg" alt="">
          <a href="<?php echo home_url( '/' ); ?>" class="page-top2-sp-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/img/black.png" alt="合同会社ウィル 福岡 ウェブ制作 ウェブマーケティング ホームページ制作">
          </a>
        </div>
      </div>
    </section>

    <section class="page-top2-issue">
      <div class="container">
        <div class="wrapper">
          <h2>個人・中小企業の<br>経営者様のお悩みを解決します</h2>
          <div class="issue-wrapper animation-target to-up">
            <div class="issue">
              <p>Webサイトをリニューアルしたいが<br>費用が高く着手できない</p>
            </div>
            <div class="issue">
              <p>Webサイトを作ったが、運用まで<br>手が回っておらず活用できていない</p>
            </div>
            <div class="issue">
              <p>ウェブ集客の必要性は理解しているが<br class="pc">予算があまりかけられない</p>
            </div>
            <div class="issue">
              <p>ウェブ集客に力を入れたいが、知見が<br class="pc">なく何から取り組んでいいかわからない</p>
            </div>
            <div class="issue">
              <p>SNSで発信を行なっているが<br>思ったような効果が出ない</p>
            </div>
            <div class="issue">
              <p>お金をかけて採用しているが<br>なかなか人が集まらない</p>
            </div>
          </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Management Issue.png" alt="management issue" class="text-image rellax-up">
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-logo-bg.png" alt="合同会社ウィル" class="logo-image rellax-up">
      </div>
    </section>

    <section class="page-top2-service">
      <div class="container">
        <div class="wrapper">
          <h2>ウィルでは個人・中小企業様の<br>ウェブマーケティングをサポートしております。</h2>
          <ul class="tab">
            <li data-tab="tab1">
              <a href="#web">Web制作</a>
            </li>
            <li data-tab="tab2">
              <a href="#sns">SNS運用支援</a>
            </li>
            <li data-tab="tab3">
              <a href="#others">その他</a>
            </li>
          </ul>
          <div class="service-wrapper animation-target to-up">
            <div id="tab1" class="service is-active">
              <p>ウィルサポは、自由なデザインの高品質ホームページを<span>月額9,800円から</span>ご利用いただける定額サブスクサービスです。</p>
              <div class="service-desc">
                <p>定額サブスクホームページ</p>
                <h3><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-willsupport-logo-white.png" alt="ウィルサポ"></h3>
                <div class="desc-wrapper">
                  <ul>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">限られた予算で本格的なサイトが持てる</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">フルオーダーでデザイン作成</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">初期費用無料</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">サーバー、ドメイン費用無料</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">サイトの更新や保守費用無料</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">契約期間の縛りなし</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">Webサイトの買取可能</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">集客サポートプランあり</li>
                  </ul>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-willsupport-illust.png" alt="" class="desc-image">
                </div>
              </div>
              <div class="btn-more">
                <a href="<?php echo get_page_link(206); ?>" target="_blank" rel="noopener noreferrer"><span class="pc">ウィルサポの</span>詳細はこちら<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-white.png" alt=""></a>
              </div>
            </div>
            <div id="tab2" class="service">
              <p>インスタグラムからお問い合わせを獲得するためのアカウント設計や運用方法、投稿内容など、インスタグラムの初期立ち上げをサポートさせていただきます。</p>
              <div class="service-desc">
                <p>SNS運用支援</p>
                <h3>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-snslogo.png" alt="instagram運用戦略設計" class="pc">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-snslogo-sp.png" alt="instagram運用戦略設計" class="sp">
                </h3>
                <div class="desc-wrapper">
                  <ul>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">土台構築ができて、自社運用が楽になる</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">オリジナルの投稿デザインを作成</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">数ヶ月分の投稿ネタ出しサポート</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">実績に基づいたインスタのノウハウが得られる</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">自社のブランディング強化</li>
                  </ul>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-insta.png" alt="" class="desc-image">
                </div>
              </div>
              <div class="btn-more">
                <a href="<?php echo get_permalink(89); ?>"><span class="pc">SNS運用支援の</span>詳細はこちら<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-white.png" alt=""></a>
              </div>
            </div>
            <div id="tab3" class="service">
              <p>目的やご要望に合わせて、デザインや制作、ウェブマーケティングをサポート。ご要望に合わせてオーダーメイドでご提案させていただきます。</p>
              <div class="service-desc">
                <p>その他</p>
                <h3>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-creativelogo.png" alt="クリエイティブ・コンサルティング" class="pc">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-creativelogo-sp.png" alt="クリエイティブ・コンサルティング" class="sp">
                </h3>
                <div class="desc-wrapper">
                  <ul>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">ロゴ制作</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">名刺制作</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">チラシ制作</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">バナー制作</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">動画制作</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">集客設計コンサルティング</li>
                    <li><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-check.png" alt="">集客サポートプラン</li>
                  </ul>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-creative.png" alt="" class="desc-image">
                </div>
              </div>
              <div class="btn-more">
                <a href="<?php echo get_permalink(87); ?>"><span class="pc">その他の</span>詳細はこちら<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-white.png" alt=""></a>
              </div>
            </div>
          </div>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Service.png" alt="Service" class="rellax-down">
      </div>
    </section>

    <section class="page-top2-contact">
      <div class="container">
        <div class="wrapper">
          <h2>無料相談・お問い合わせ</h2>
          <div class="contact-btn">
            <a href="<?php echo get_page_link(15); ?>">
              <span>CONTACT</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-contactarrow.png" alt="">
            </a>
          </div>
          <p>Web制作や集客などに関するお悩みがある個人・中小企業の経営者様、担当者様はお気軽にご相談ください。<br>具体的な内容が決まっていない場合でも、しっかりと相談に乗らせていただきます。</p>
        </div>
      </div>
    </section>

    <section class="page-top2-works">
      <div class="container">
        <div class="wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Works.png" alt="works" class="rellax-up2">
          <h2 class="rellax-horizontal"><span></span>制作実績</h2>
          <div class="carousel-wrapper">
            <div class="carousel">
              <?php
                $args = array(
                  'post_type' => 'works',
                  'posts_per_page' => 6,
                );
                $works = new WP_Query($args);
                if($works->have_posts()):
                  while($works->have_posts()):
                    $works->the_post();
              ?>
              <div class="work">
                <a href="<?php the_permalink(); ?>">
                  <?php
                    if(has_post_thumbnail()):
                      the_post_thumbnail();
                    else:
                      ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                    <?php
                      endif;
                    ?>
                  <div class="text-wrapper">
                    <p>
                      <?php
                        if(get_post_meta($post->ID, 'プロジェクト名')):
                          echo get_post_meta($post->ID, 'プロジェクト名', 'true');
                        endif;
                      ?>
                    </p>
                    <p>
                      <?php
                        if(get_post_meta($post->ID, '概要コンテンツ2')):
                          echo get_post_meta($post->ID, '概要コンテンツ2', 'true');
                        endif;
                      ?>
                    </p>
                    <p><?php the_title(); ?></p>
                  </div>
                </a>
              </div>
              <?php
                endwhile;
              else:
              ?>
              <p>制作実績はまだありません。</p>
              <?php
                endif;
                wp_reset_postdata();
              ?>
            </div>
          </div>
          <div class="page-top2-btn">
            <a href="<?php echo get_page_link(43) ?>">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
          </div>
        </div>
      </div>
    </section>

    <section class="page-top2-blog">
      <div class="container">
        <div class="wrapper">
          <div class="sticky">
            <div class="sticky-container">
              <div class="sticky-wrapper">
                <h2><span></span>ブログ</h2>
                <div class="page-top2-btn pc">
                  <a href="https://will-corp.co.jp/blog/" target="_blank" rel="noopener noreferrer" >一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Blog.png" alt="">
              </div>
            </div>
          </div>
          <div class="content-wrapper">
            <?php
              include_once( ABSPATH . WPINC . '/feed.php' );
              $rss = fetch_feed( 'https://will-corp.co.jp/blog/' ); // ここにURLを入力する
              if ( !is_wp_error( $rss ) ) {
                $maxitems = $rss->get_item_quantity( 5 );
                $rss_items = $rss->get_items( 0, $maxitems );
              }
            ?>
            <?php if ( !empty( $maxitems ) ) : ?>
            <?php
              if ($maxitems == 0) echo '<li>RSSデータがありませんでした.</li>';
                else
              foreach ( $rss_items as $item ) :
            ?>
            <div class="content animation-target to-right">
              <a href="<?php echo $item->get_permalink(); ?>" target="_blank" rel="noopener noreferrer">
              <?php
                $first_img = '';
                if ( preg_match( '/<img.+?src=[\'"]([^\'"]+?)[\'"].*?>/msi',
                $item->get_content(), $matches )
                ) { $first_img = $matches[1]; }
              ?>
              <?php if ( !empty( $first_img ) ) : ?>
                <img src="<?php echo esc_attr( $first_img ); ?>" alt="">
              <?php endif; ?>
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date"><?php echo $item->get_date('Y.m.d'); ?></span><br class="sp">
                    <span class="category">
                      <?php
                        $categorys = $item->get_categories();
                          foreach ( $categorys as $category ) {
                          echo '<span>'.esc_html( $category->get_label() ).'</span>';
                        }
                      ?>
                    </span>
                  </div>
                  <p class="title"><?php echo $item->get_title(); ?></p>
                </div>
              </a>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="page-top2-btn sp">
              <a href="https://will-corp.co.jp/blog/" target="_blank" rel="noopener noreferrer">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section class="page-top2-insta">
      <div class="container">
        <div class="wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-instagram.png" alt="instagram">
          <h2 class="rellax-horizontal"><span></span>インスタグラム</h2>
          <?php
            if(have_posts()):
              while(have_posts()): the_post();
          ?>
          <div class="insta-wrapper">
            <?php the_content(); ?>
          </div>
          <?php
            endwhile;
          endif;
          ?>
          <div class="page-top2-btn">
            <a href="<?php echo get_page_link(43) ?>">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
          </div>
        </div>
      </div>
    </section> -->

    <section class="page-top2-about">
      <div class="container">
        <div class="wrapper">
          <h2><span></span>わたしたちについて</h2>
          <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-About us.png" alt="about">
          <div class="content-wrapper animation-target to-up">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-about-pic.png" alt="">
            <p>わたしたちは、ウェブ制作やウェブ集客、SNS運用サポートをワンストップで提供することで、お客様のビジネスをトータルでサポートさせていただきます。<br>ウェブ担当者やマーケティング部門がない中小企業様にとって、戦略から戦術の策定、実行まで一気通貫で対応することは簡単ではありません。中小企業様のビジネスや課題を理解し、解決に全力で取り組ませていただきます。</p>
          </div>
          <div class="page-top2-btn">
            <a href="<?php echo get_page_link(11) ?>">ウィルについて<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
          </div>
        </div>
      </div>
    </section>

    <section class="page-top2-contact">
      <div class="container">
        <div class="wrapper">
          <h2>無料相談・お問い合わせ</h2>
          <div class="contact-btn">
            <a href="<?php echo get_page_link(15); ?>">
              <span>CONTACT</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-contactarrow.png" alt="">
            </a>
          </div>
          <p>Web制作や集客などに関するお悩みがある個人・中小企業の経営者様、担当者様はお気軽にご相談ください。<br>具体的な内容が決まっていない場合でも、しっかりと相談に乗らせていただきます。</p>
        </div>
      </div>
    </section>

    <?php get_footer("v2"); ?>
