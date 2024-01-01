<?php
/*
Template Name: グラフィック
Template Post Type: service
*/
?>

<?php get_header(); ?>

  <section class="hero-section single-service gp">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/graphic.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">g</span>raphic</h2>
          <p class="sub-title">バナー・チラシ作成</p>
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

<?php get_footer(); ?>
