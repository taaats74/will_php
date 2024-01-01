<?php
  /*
  Template Name: About
  Template Post Type: page
  */
?>

<?php get_header(); ?>

<section class="hero-section about">
  <div class="container">
    <div class="wrapper">
      <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/img/about-hero.png" alt="">
      </div>
      <div class="hero-text">
        <h2 class="section-header"><span class="green">a</span>bout</h2>
        <p class="sub-title">ウィルについて</p>
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
