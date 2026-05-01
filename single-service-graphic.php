<?php
/*
Template Name: グラフィック
Template Post Type: service
*/
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'SERVICES',
  'title' => 'グラフィック制作',
  'lead'  => 'バナー・チラシ・販促物を一貫したトーンで設計します。',
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
