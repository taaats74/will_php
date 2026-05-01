<?php
/*
Template Name: Web制作
Template Post Type: service
*/
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'SERVICES',
  'title' => 'Webサイト制作',
  'lead'  => '営業基盤として機能する Web サイトを設計・制作します。',
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
