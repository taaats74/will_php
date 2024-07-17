<?php
/*
Template Name: Web広告
Template Post Type: service
*/
?>

<?php get_header(); ?>

  <section class="hero-section single-service ad">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/Advertising.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">a</span>dvertising</h2>
          <p class="sub-title">Web広告運用代行</p>
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

<?php get_footer("v2"); ?>
