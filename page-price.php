<?php
  /*
  Template Name: Price
  Template Post Type: page
  */
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'PRICE',
  'title' => '料金プラン',
  'lead'  => '事業フェーズに合わせた、無理のない料金体系。',
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
  <p style="text-align: center; font-size: 13px; color: #666; margin: 0 auto 60px; padding: 0 16px;">最終更新日：<?php echo will_seo_updated_html(); ?></p>


<?php get_footer(); ?>
