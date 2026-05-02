<?php
/**
 * Template Name: Diagnosis
 * Template Post Type: page
 *
 * 1分でできる無料診断ページ。
 * 本文は WordPress 管理画面で編集(HubSpot 診断フォームショートコード等を埋め込む想定)。
 *
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - トンマナ: page-service-* / page-contact / page-privacypolicy 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'DIAGNOSIS',
  'title' => '1分でできる無料診断',
  'lead'  => '貴社のBtoBマーケで「最優先すべき一手」を見える化します。',
] );
?>

<section class="page-diagnosis">
  <div class="container">
    <div class="page-diagnosis__inner">

      <div class="page-diagnosis__form">
        <?php
          if ( have_posts() ) :
            while ( have_posts() ) : the_post();
              the_content();
            endwhile;
          endif;
        ?>
      </div>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
