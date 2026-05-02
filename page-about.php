<?php
  /*
  Template Name: About
  Template Post Type: page
  */
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'ABOUT',
  'title' => 'ウィルについて',
  'lead'  => '福岡から、BtoB中小企業の営業基盤を設計する。',
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

<?php get_footer(); ?>
