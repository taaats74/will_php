<?php
  /*
  Template Name: Top Page
  Template Post Type: page
  */
?>

<?php get_header("top"); ?>

<section class="section-fv">
  <div class="container">
    <div class="wrapper">
      <div class="pc">
        <div class="fv-img">
          <div class="img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top-fv.png" alt="">
          </div>
          <div class="scrolldown"><span>Scroll</span></div>
        </div>
        <h2 class="fv-message"><span class="above">ともに、</span><br><span class="bottom">未来を創る。</span></h2>
      </div>
      <div class="sp">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/sp_top.jpg" alt="">
        </div>
      </div>
      <div class="info-wrapper">
        <h2 class="section-header"><span class="green">t</span>opics</h2>
        <p class="sub-title">お知らせ</p>
        <ul>
          <?php
            $args = array(
              'post_type' => 'info',
              'posts_per_page' => 1,
            );
            $info = new WP_Query($args);
            if($info->have_posts()):
              while($info->have_posts()):
                $info->the_post();
          ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <span class="date"><?php the_time('Y.m.d') ?></span>
              <span class="title"><?php the_title(); ?></span>
            </a>
          </li>
          <?php
            endwhile;
          else:
          ?>
          <li>お知らせはまだありません。</li>
          <?php
            endif;
            wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="sp sp-logo sp-page-top-logo">
  <div class="img-wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="">
  </div>
</div>

<section class="page-top-about">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">a</span>bout</h2>
      <p class="sub-title">ウィルについて</p>
      <div class="border"></div>
      <div class="content-wrapper">
        <div class="text-wrapper">
          <p class="content">わたしたちは、ウェブ制作やウェブマーケティング、SNS運用サポートのサービスをワンストップで提供することで、お客様のビジネスをトータルでサポートさせていただきます。弊社の強みは、横断したウェブマーケティングにおける知見と経験を活かし、お客様に最適なウェブ周りの戦略を一緒に考え、実行することです。ウェブ担当者やマーケティング部門がない地方の中小企業様にとって、戦略から戦術の策定、実行まで一気通貫で対応することは簡単ではありません。そんな担当者がいない企業様のビジネスや課題を理解し、その解決に全力で取り組むことが私たちの使命です。</p>
          <div class="btn">
            <a href="<?php echo get_page_link(11); ?>">view more</a>
          </div>
        </div>
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/page-top-about.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-top-service">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">s</span>ervice</h2>
      <p class="sub-title">サービス内容</p>
      <div class="border"></div>
      <p class="content">ウェブ担当者がいない地方の中小企業様を中心に、Webサイトの制作からウェブマーケティング施策まで、柔軟で効果的なソリューションをご提案させていただきます。また、私たちはお客様のビジョンを理解し、共に成長するための信頼性と長期的なパートナーシップを築くことが、ビジネスを成功するために非常に重要だと考えております。</p>
      <div class="btn">
        <a href="<?php echo get_page_link(39); ?>">view more</a>
      </div>
    </div>
    <div class="cover"></div>
  </div>
</section>

<section class="page-top-works">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">w</span>orks</h2>
      <p class="sub-title">実績紹介</p>
      <div class="border"></div>
      <div class="works-wrapper">
        <div class="card">
          <a href="">
            <div class="title-wrapper">
              <div class="title">
                <h3 class="pjct-name">イベントLP・バナー</h3>
                <p class="client-name">東京コーチング協会様</p>
              </div>
              <div class="num">
                <p>01</p>
              </div>
            </div>
            <div class="img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/img/works02.png" alt="">
            </div>
            <div class="works-btn">
              <div class="works-border"></div>
              <p>more</p>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="">
            <div class="title-wrapper">
              <div class="title">
                <h3 class="pjct-name">イベントLP・バナー</h3>
                <p class="client-name">東京コーチング協会様</p>
              </div>
              <div class="num">
                <p>02</p>
              </div>
            </div>
            <div class="img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/img/works02.png" alt="">
            </div>
            <div class="works-btn">
              <div class="works-border"></div>
              <p>more</p>
            </div>
          </a>
        </div>
        <div class="card">
          <a href="">
            <div class="title-wrapper">
              <div class="title">
                <h3 class="pjct-name">事業&ブログサイト</h3>
                <p class="client-name">浜田えり子様</p>
              </div>
              <div class="num">
                <p>03</p>
              </div>
            </div>
            <div class="img-wrapper">
              <img src="<?php echo get_template_directory_uri(); ?>/img/works03.png" alt="">
            </div>
            <div class="works-btn">
              <div class="works-border"></div>
              <p>more</p>
            </div>
          </a>
        </div>
      </div>
      <div class="btn">
        <a href="<?php echo get_page_link(43); ?>">view more</a>
      </div>
    </div>
  </div>
</section>

<section class="page-top-blog">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">b</span>log</h2>
      <p class="sub-title">ブログ</p>
      <div class="border"></div>
      <div class="blog-wrapper">
        <div class="above">
          <div class="large">
            <div class="card">
              <a href="">
                <div class="img-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-img01.png" alt="">
                </div>
                <div class="blog-info">
                  <div class="above">
                    <div class="icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/blog-icon.png" alt="">
                    </div>
                    <ul class="info">
                      <li>2023.11.1</li>
                      <li>webマーケティング</li>
                      <li>高橋竜也</li>
                    </ul>
                  </div>
                  <h3 class="blog-title">マーケティングの必要性</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="small">
            <div class="card">
              <a href="">
                <div class="img-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-img02.png" alt="">
                </div>
                <div class="blog-info">
                  <div class="above">
                    <div class="icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/blog-icon.png" alt="">
                    </div>
                    <ul class="info">
                      <li>2023.11.1</li>
                      <li>webマーケティング</li>
                      <li>高橋竜也</li>
                    </ul>
                  </div>
                  <h3 class="blog-title">マーケティングの必要性</h3>
                </div>
              </a>
            </div>
            <div class="card">
              <a href="">
                <div class="img-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-img03.png" alt="">
                </div>
                <div class="blog-info">
                  <div class="above">
                    <div class="icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/blog-icon.png" alt="">
                    </div>
                    <ul class="info">
                      <li>2023.11.1</li>
                      <li>webマーケティング</li>
                      <li>高橋竜也</li>
                    </ul>
                  </div>
                  <h3 class="blog-title">マーケティングの必要性</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="small">
            <div class="card">
              <a href="">
                <div class="img-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-img04.png" alt="">
                </div>
                <div class="blog-info">
                  <div class="above">
                    <div class="icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/blog-icon.png" alt="">
                    </div>
                    <ul class="info">
                      <li>2023.11.1</li>
                      <li>webマーケティング</li>
                      <li>高橋竜也</li>
                    </ul>
                  </div>
                  <h3 class="blog-title">マーケティングの必要性</h3>
                </div>
              </a>
            </div>
            <div class="card">
              <a href="">
                <div class="img-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-img05.png" alt="">
                </div>
                <div class="blog-info">
                  <div class="above">
                    <div class="icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/blog-icon.png" alt="">
                    </div>
                    <ul class="info">
                      <li>2023.11.1</li>
                      <li>webマーケティング</li>
                      <li>高橋竜也</li>
                    </ul>
                  </div>
                  <h3 class="blog-title">マーケティングの必要性</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="large">
            <div class="card">
              <a href="">
                <div class="img-wrapper">
                  <img src="<?php echo get_template_directory_uri(); ?>/img/blog-img06.png" alt="">
                </div>
                <div class="blog-info">
                  <div class="above">
                    <div class="icon">
                      <img src="<?php echo get_template_directory_uri(); ?>/img/blog-icon.png" alt="">
                    </div>
                    <ul class="info">
                      <li>2023.11.1</li>
                      <li>webマーケティング</li>
                      <li>高橋竜也</li>
                    </ul>
                  </div>
                  <h3 class="blog-title">マーケティングの必要性</h3>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn">
        <a href="">view more</a>
      </div>
    </div>
  </div>
</section>

<section class="page-top-contact">
  <div class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">c</span>ontact</h2>
      <p class="sub-title">お問い合わせ</p>
      <div class="border"></div>
      <p class="content">当社はウェブサイト制作に関するご質問やお見積もりのご依頼、ウェブ戦略に関する相談など、お客様のさまざまなニーズに対応いたします。専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションを提案いたします。お気軽にお問い合わせください。</p>
      <div class="btn transparent">
        <a href="<?php echo get_page_link(15); ?>">view more</a>
      </div>
    </div>
  </div>
</section>

<section class="page-top-partner">
  <dic class="container">
    <div class="wrapper">
      <h2 class="section-header"><span class="green">p</span>artner</h2>
      <p class="sub-title">パートナー</p>
      <div class="border"></div>
      <p class="content">弊社では、一緒に中小企業を支え、デジタル領域で共に成長するパートナー様を募集しています。あなたのクリエイティブなスキルでお客様の成功をともにサポートしませんか。興味があれば、お気軽にお問い合わせください。</p>
      <div class="btn">
        <a href="<?php echo get_page_link(18); ?>">view more</a>
      </div>
    </div>
  </dic>
</section>

<?php get_footer("top"); ?>
