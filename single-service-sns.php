<?php
/*
Template Name: SNSサポート
Template Post Type: service
*/
?>

<?php get_header(); ?>

  <section class="hero-section single-service">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/SNS Adverti.png" alt="">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">s</span>ns advertising</h2>
          <p class="sub-title">SNS運用サポート</p>
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
