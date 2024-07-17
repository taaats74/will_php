<?php
  /*
  Template Name: tradelaw
  Template Post Type: page
  */
?>

<?php get_header(); ?>

<section class="hero-section tradelaw">
  <div class="container">
    <div class="wrapper">
      <div class="img-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/img/tradelaw-hero.png" alt="">
      </div>
      <div class="hero-text">
        <h2 class="section-header"><span class="green">t</span>radelaw</h2>
        <p class="sub-title">特定商取引法に基づく表記</p>
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
