<?php
/**
 * Template Name: Contact
 * Template Post Type: page
 *
 * お問い合わせページ。本文は WordPress 管理画面で編集
 * (HubSpot フォームショートコード等を埋め込む想定)。
 *
 * - header + footer + template-parts/page-hero
 * - トンマナ: page-service-* / page-privacypolicy 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header();
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

      <div class="page-contact__privacy-notice" role="note">
        <p class="page-contact__privacy-notice-text">
          お問い合わせフォームを送信される前に、
          <a class="page-contact__privacy-notice-link" href="<?php echo esc_url( home_url('/privacy-policy/') ); ?>" target="_blank" rel="noopener noreferrer">
            プライバシーポリシー
            <span class="page-contact__privacy-notice-icon" aria-hidden="true">↗</span>
          </a>
          をご確認ください。
        </p>
        <p class="page-contact__privacy-notice-sub">
          本フォームを送信いただいた時点で、プライバシーポリシーに同意いただいたものとみなします。
        </p>
      </div>

      <div class="page-contact__form">
        <div id="page-contact-form"></div>
        <script charset="utf-8" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
        <script>
          (function(){
            if (typeof hbspt === 'undefined') return;
            hbspt.forms.create({
              region:   "na2",
              portalId: "48153453",
              formId:   "bf7c2589-af6c-47c8-a017-f6ae2303be47",
              target:   "#page-contact-form",
              css: ''
                + '.hs-form-field { margin-bottom: 12px; }'
                + '.hs-form-field > label, .legal-consent-container { font-size: 13px; }'
                + '.hs-input { font-size: 14px; padding: 10px 12px; }'
                + '.hs-button { font-size: 14px; padding: 12px 26px; }'
                + '.hs-error-msg { font-size: 11px; }'
                + '@media (max-width: 768px) {'
                +   '.hs-form-field { margin-bottom: 10px; }'
                +   '.hs-form-field > label, .legal-consent-container { font-size: 12px; }'
                +   '.hs-input { font-size: 13px; padding: 9px 10px; }'
                +   '.hs-button { font-size: 13px; padding: 11px 22px; }'
                +   '.hs-error-msg { font-size: 11px; }'
                + '}'
            });
          })();
        </script>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
