<?php
/**
 * Template Name: Diagnosis
 * Template Post Type: page
 *
 * 1分でできる無料診断ページ。
 * 本文は WordPress 管理画面で編集(HubSpot 診断フォームショートコード等を埋め込む想定)。
 *
 * - header + footer + template-parts/page-hero
 * - トンマナ: page-service-* / page-contact / page-privacypolicy 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header();
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
        <div id="page-diagnosis-form"></div>
        <script charset="utf-8" src="//js-na2.hsforms.net/forms/embed/v2.js"></script>
        <script>
          (function(){
            if (typeof hbspt === 'undefined') return;
            hbspt.forms.create({
              region:   "na2",
              portalId: "48153453",
              formId:   "cbefaef6-5ca4-4ee6-ab0e-76fd49e7a96c",
              target:   "#page-diagnosis-form",
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
