<?php
/*
Template Name: Web広告
Template Post Type: service
*/
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'SERVICES',
  'title' => 'Web広告運用代行',
  'lead'  => '検索広告・SNS広告で、確実な接点を作ります。',
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
