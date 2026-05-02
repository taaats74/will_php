<?php
/**
 * Template Name: Privacy Policy
 * Template Post Type: page
 *
 * プライバシーポリシーページ。本文は WordPress 管理画面で編集する想定。
 *
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - トンマナ: page-service-* / page-contact / page-tradelaw 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'PRIVACY POLICY',
  'title' => 'プライバシーポリシー',
] );
?>

<section class="page-privacypolicy">
  <div class="container">
    <div class="page-privacypolicy__inner">

      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            the_content();
          endwhile;
        endif;
      ?>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
