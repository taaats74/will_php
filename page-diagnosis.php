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
  'title' => 'BtoBマーケティング<br>どこから改善すべきかが<br class="sp">わかる無料診断',
  'lead'  => '貴社の回答とWebサイトをもとに、<br class="sp">現状・ボトルネック・改善の優先順位を<br>レポートにまとめてお送りします。',
  'badge' => '約1分・3問で完了',
] );
?>

<section class="page-diagnosis">
  <div class="container">
    <div class="page-diagnosis__inner">

      <section class="page-diagnosis__block">
        <h2 class="page-diagnosis__block-title">お届けする診断レポートの内容</h2>
        <ol class="page-diagnosis__report">
          <li class="page-diagnosis__report-item">
            <span class="page-diagnosis__report-num">01</span>
            <h3 class="page-diagnosis__report-title">現在地</h3>
            <p class="page-diagnosis__report-text">現在の集客・見込み客獲得・商談化の状況を整理</p>
          </li>
          <li class="page-diagnosis__report-item">
            <span class="page-diagnosis__report-num">02</span>
            <h3 class="page-diagnosis__report-title">ボトルネック</h3>
            <p class="page-diagnosis__report-text">成果につながりにくい要因と、改善できるポイントを整理</p>
          </li>
          <li class="page-diagnosis__report-item">
            <span class="page-diagnosis__report-num">03</span>
            <h3 class="page-diagnosis__report-title">最優先すべき一手</h3>
            <p class="page-diagnosis__report-text">現状を踏まえ、最も優先して取り組むべきことを提示</p>
          </li>
        </ol>
      </section>

      <p class="page-diagnosis__cta">まずは下記より、<br class="sp">診断をスタートしてください。</p>

      <div class="page-diagnosis__form">
        <script src="https://js-na2.hsforms.net/forms/embed/48153453.js" defer></script>
        <div class="hs-form-frame" data-region="na2" data-form-id="ad4084fb-fdf4-49d2-b4d6-52375b29c848" data-portal-id="48153453"></div>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
