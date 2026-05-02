<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * お問い合わせページ。本文は WordPress 管理画面で編集
 * (HubSpot フォームショートコード等を埋め込む想定)。
 *
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - トンマナ: page-service-* / page-privacypolicy 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'CONTACT',
  'title' => 'お問い合わせ',
  'lead'  => '「次の一手」を、一緒に考えましょう。',
] );
?>

<section class="page-contact">
  <div class="container">
    <div class="page-contact__inner">

      <p class="page-contact__lead">
        ウェブサイト制作に関するご質問、お見積もりのご依頼、ウェブ戦略に関するご相談など、
        専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションをご提案いたします。
        お気軽にお問い合わせください。
      </p>

      <div class="page-contact__form">
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
