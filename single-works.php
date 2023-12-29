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

  <section class="single-works-work">
    <div class="container">
      <div class="wrapper">
        <?php
          if(have_posts()):
            while(have_posts()): the_post();
        ?>
        <div class="name">
          <h2 class="client-name"><?php the_title(); ?></h2>
          <p class="pj-type">
            <?php
              if(get_post_meta($post->ID, 'プロジェクト名')):
                echo get_post_meta($post->ID, 'プロジェクト名', 'true');
              endif;
            ?>
          </p>
        </div>
        <?php the_content(); ?>
        <div class="overview">
          <ul>
            <li>
              <p class="header">
                <?php
                  if(get_post_meta($post->ID, '概要ヘッダー1')):
                    echo get_post_meta($post->ID, '概要ヘッダー1', 'true');
                  endif;
                ?>
              </p>
              <p class="desc">
                <?php
                  if(get_post_meta($post->ID, '概要コンテンツ1')):
                    echo get_post_meta($post->ID, '概要コンテンツ1', 'true');
                  endif;
                ?>
              </p>
            </li>
            <li>
              <p class="header">
                <?php
                  if(get_post_meta($post->ID, '概要ヘッダー2')):
                    echo get_post_meta($post->ID, '概要ヘッダー2', 'true');
                  endif;
                ?>
              </p>
              <p class="desc">
                <?php
                  if(get_post_meta($post->ID, '概要コンテンツ2')):
                    echo get_post_meta($post->ID, '概要コンテンツ2', 'true');
                  endif;
                ?>
              </p>
            </li>
            <li>
              <p class="header">
                <?php
                  if(get_post_meta($post->ID, '概要ヘッダー3')):
                    echo get_post_meta($post->ID, '概要ヘッダー3', 'true');
                  endif;
                ?>
              </p>
              <p class="desc">
                <?php
                  if(get_post_meta($post->ID, '概要コンテンツ3')):
                    echo get_post_meta($post->ID, '概要コンテンツ3', 'true');
                  endif;
                ?>
              </p>
            </li>
            <li>
              <p class="header">
                <?php
                  if(get_post_meta($post->ID, '概要ヘッダー4')):
                    echo get_post_meta($post->ID, '概要ヘッダー4', 'true');
                  endif;
                ?>
              </p>
              <p class="desc">
                <?php
                  if(get_post_meta($post->ID, '概要コンテンツ4')):
                    echo get_post_meta($post->ID, '概要コンテンツ4', 'true');
                  endif;
                ?>
              </p>
            </li>
            <li>
              <p class="header">
                <?php
                  if(get_post_meta($post->ID, '概要ヘッダー5')):
                    echo get_post_meta($post->ID, '概要ヘッダー5', 'true');
                  endif;
                ?>
              </p>
              <p class="desc">
                <?php
                  if(get_post_meta($post->ID, '概要コンテンツ5')):
                    echo get_post_meta($post->ID, '概要コンテンツ5', 'true');
                  endif;
                ?>
              </p>
            </li>
          </ul>
        </div>
        <?php
          endwhile;
        endif;
        ?>
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

<?php get_footer(); ?>
