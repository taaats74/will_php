<?php get_header(); ?>

  <section class="hero-section single-service works">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/works.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">w</span>orks</h2>
          <p class="sub-title">制作実績</p>
        </div>
      </div>
    </div>
  </section>

  <section class="archive-works-works">
    <div class="container">
      <div class="wrapper">
        <div class="box-wrapper">
          <?php
          if(have_posts()):
            while(have_posts()): the_post();
          ?>
          <div class="box">
            <a href="<?php the_permalink(); ?>">
            <div class="box-content-wrapper">
              <div class="img-wrapper">
                <?php
                  if(has_post_thumbnail()):
                  the_post_thumbnail();
                else:
                ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/about-strength01.jpg" alt="">
                <?php endif; ?>
              </div>
              <span class="tag">
                <?php
                  $terms = get_the_terms($post->ID, 'works');
                  if(!empty($terms)) {
                    foreach($terms as $term):
                    echo $term->name;
                    endforeach;
                  } else {
                    echo '未分類';
                  }
                ?>
              </span>
            </div>
            </a>
          </div>
          <?php
            endwhile;
          endif;
          ?>
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
