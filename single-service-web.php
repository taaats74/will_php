<?php
/*
Template Name: Web制作
Template Post Type: service
*/
?>

<?php get_header(); ?>

  <section class="hero-section single-service-web">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/web creative.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">w</span>eb creative</h2>
          <p class="sub-title">Webサイト制作</p>
        </div>
      </div>
    </div>
  </section>

  <?php get_header(); ?>
  <?php
    if(have_posts()):
    while(have_posts()): the_post();
  ?>
  <?php the_content(); ?>
  <?php
    endwhile;
  endif;
  ?>

<?php get_footer("v2"); ?>
