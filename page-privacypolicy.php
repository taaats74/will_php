<?php
  /*
  Template Name: Privacy Policy
  Template Post Type: page
  */
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'PRIVACY POLICY',
  'title' => 'プライバシーポリシー',
] );
?>

  <?php
    if(have_posts()):
    while(have_posts()): the_post();
  ?>
  <?php the_content(); ?>
  <?php
    endwhile;
  endif;
  ?>

<?php get_footer("v3"); ?>
