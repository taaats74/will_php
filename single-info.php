<?php get_header(); ?>

    <section class="hero-section single-service info">
      <div class="container">
        <div class="wrapper">
          <div class="img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/img/information.png" alt="">
          </div>
          <div class="hero-text">
            <h2 class="section-header"><span class="green">i</span>nformation</h2>
            <p class="sub-title">お知らせ</p>
          </div>
        </div>
      </div>
    </section>

  <section class="single-info">
    <div class="container">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
      ?>
      <h2><?php the_title(); ?></h2>
      <div class="date"><?php the_time('Y.m.d'); ?></div>
      <?php the_content(); ?>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </section>

<?php get_footer("v2"); ?>
