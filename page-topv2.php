<?php
  /*
  Template Name: Page Top Ver.2
  Template Post Type: page
  */
?>

<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@400;500;700;900&display=swap" rel="stylesheet">
  <title>Document</title>
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
        <ul class="menu">
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
            <a href=""><span></span>contact<i class="fa-solid fa-chevron-right"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div> -->

  <?php get_header("topv2"); ?>

  <div class="loading-container">
    <section class="page-top2-fv pc">
      <div class="container">
        <div class="wrapper">
          <header class="page-top2-header">
            <!-- <nav>
              <ul>
                <li>
                  <span></span><a href="">ウィルについて</a>
                </li>
                <li>
                  <span></span><a href="">サービス内容</a>
                </li>
                <li>
                  <span></span><a href="">制作実績</a>
                </li>
                <li>
                  <span></span><a href="">ブログ</a>
                </li>
              </ul>
            </nav> -->
            <?php
              wp_nav_menu(array(
                'theme_location' => 'header-menu-top',
                'container' => 'nav',
                'before' => '<span></span>'
              ));
            ?>
          </header>
          <div class="bg-img">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-fv-img.png" alt="">
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
            <p class="en">Uncover the unknown and turn it into an answer.</p>
            <p class="ja">未知をひらき、答えにする。</p>
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
                <a href=""><span class="pc">ウィルサポの</span>詳細はこちら<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-white.png" alt=""></a>
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
                <a href=""><span class="pc">SNS運用支援の</span>詳細はこちら<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-white.png" alt=""></a>
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
                <a href=""><span class="pc">その他の</span>詳細はこちら<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-white.png" alt=""></a>
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
            <a href="">
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
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
              <div class="work">
                <a href="">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-maru-suru.png" alt="">
                  <div class="text-wrapper">
                    <p>ホームページ制作</p>
                    <p>コーチング事業</p>
                    <p>株式会社maru-suru様</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="page-top2-btn">
            <a href="">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
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
                  <a href="">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
                </div>
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-Blog.png" alt="">
              </div>
            </div>
          </div>
          <div class="content-wrapper">
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="content animation-target to-right">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-blog-img.png" alt="">
                <div class="text-wrapper">
                  <div class="above">
                    <span class="date">2024.06.07</span><br class="sp">
                    <span class="category">ホームページ制作</span>
                  </div>
                  <p class="title">ブログのタイトルはこちらブログのタイトルはこちら</p>
                </div>
              </a>
            </div>
            <div class="page-top2-btn sp">
              <a href="">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
    </section>

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
            <a href="">一覧を見る<img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-arrow-black.png" alt=""></a>
          </div>
        </div>
      </div>
    </section>

    <section class="page-top2-contact">
      <div class="container">
        <div class="wrapper">
          <h2>無料相談・お問い合わせ</h2>
          <div class="contact-btn">
            <a href="">
              <span>CONTACT</span>
              <img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-contactarrow.png" alt="">
            </a>
          </div>
          <p>Web制作や集客などに関するお悩みがある個人・中小企業の経営者様、担当者様はお気軽にご相談ください。<br>具体的な内容が決まっていない場合でも、しっかりと相談に乗らせていただきます。</p>
        </div>
      </div>
    </section>

    <?php get_footer("v2"); ?>
