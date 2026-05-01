<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'INFORMATION',
  'title' => 'お知らせ',
  'lead'  => 'ウィルからの最新情報をお届けします。',
] );
?>

  <section class="single-info">
    <div class="container">
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
      ?>
      <h2><?php the_title(); ?></h2>
      <div class="date"><?php the_time('Y.m.d'); ?></div>
      <?php the_content(); ?>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </section>

<?php get_footer("v3"); ?>
