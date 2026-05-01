<?php
  /*
  Template Name: tradelaw
  Template Post Type: page
  */
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'LEGAL',
  'title' => '特定商取引法に基づく表記',
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
