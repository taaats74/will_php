<?php
  /*
  Template Name: Partner
  Template Post Type: page
  */
?>

<?php get_header(); ?>

  <section class="hero-section partner">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/partner.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">p</span>artner</h2>
          <p class="sub-title">パートナー募集</p>
        </div>
      </div>
    </div>
  </section>

  <?php
    if(have_posts()):
    while(have_posts()): the_post();
  ?>
  <?php the_content(); ?>
  <?php
    endwhile;
  endif;
  ?>

  <!-- <section class="page-partner-message">
    <div class="container">
      <div class="wrapper">
        <h2>私たちと一緒にお仕事しませんか？</h2>
        <p class="content">私たちは、デザイナーやコーダー、SNS運用者など、一緒に地方の中小企業を支援するパートナー様を募集しています。パートナーシップを通じて共に成長し、地域の発展に貢献しませんか？詳細はCONTACTからお問い合わせください。</p>
      </div>
    </div>
  </section>

  <section class="job-opening">
    <div class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">j</span>ob opening</h2>
        <p class="sub-title">こんな方を探しています</p>
        <div class="border"></div>
        <div class="box-wrapper">
          <div class="box">
            <div class="title-wrapper">
              <div class="num">
                <p>01</p>
              </div>
              <div class="title">
                <h3 class="plan alliance">アライアンスパートナー</h3>
              </div>
            </div>
            <div class="img-wrapper">
              <img src="[img]partner01.png" alt="">
            </div>
            <div class="desc">
              <p>広告代理店やマーケティングコンサルティング会社の方々へ。弊社は共に成長できるビジネスパートナーを探しています。経験豊富なプロフェッショナルとして共に未来を築くためのパートナーシップを歓迎します。ご興味のある方はお気軽にご連絡ください。</p>
            </div>
          </div>
          <div class="box">
            <div class="title-wrapper">
              <div class="num">
                <p>02</p>
              </div>
              <div class="title">
                <h3 class="plan">制作パートナー</h3>
              </div>
            </div>
            <div class="img-wrapper">
              <img src="[img]partner02.png" alt="">
            </div>
            <div class="desc">
              <p>クリエイティブなホームページ制作やデザインのプロとして、一緒にプロジェクトを進めるパートナーを募集しています。クライアントのビジョンを形にし、オンラインでの存在感を高めませんか？経験豊富な方や新しいアイデアを持つ方、ぜひご応募ください。</p>
            </div>
          </div>
          <div class="box">
            <div class="title-wrapper">
              <div class="num">
                <p>03</p>
              </div>
              <div class="title">
                <h3 class="plan">SNSパートナー</h3>
              </div>
            </div>
            <div class="img-wrapper">
              <img src="[img]partner03.png" alt="">
            </div>
            <div class="desc">
              <p>SNS運用やコンセプト設計のスペシャリストとして、一緒にプロジェクトを盛り上げるパートナーを求めています。クリエイティブな発想や実績を持つ方、お客様のストーリーを共に広げる仲間を募集中です。新しいアイデアやエキスパートなスキルをお持ちの方、ぜひご応募ください。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-top-contact partner-contact">
    <div class="container">
      <div class="wrapper">
        <p class="content">お問い合わせはこちらからお願いいたします。</p>
        <div class="btn">
          <a href="[partner]">お問い合わせはこちら</a>
        </div>
      </div>
    </div>
  </section> -->

<?php get_footer("v2"); ?>
