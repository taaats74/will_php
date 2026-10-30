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

      <div class="page-diagnosis__intro">
        <h2 class="page-diagnosis__heading">貴社のBtoBマーケティングの現状を<br class="pc">"たった1分"で可視化する無料診断です。</h2>
        <p class="page-diagnosis__sub">選択式3問に答えるだけ。貴社のWebサイトと回答内容をもとに、<br class="pc">ウィルが「最優先すべき一手」をレポートにまとめてお送りします。費用は一切かかりません。</p>
      </div>

      <section class="page-diagnosis__block">
        <h3 class="page-diagnosis__block-title">こんな方におすすめです</h3>
        <ul class="page-diagnosis__checks">
          <li>Webサイトはあるが、新規の問い合わせにつながっていない</li>
          <li>新規開拓が紹介や既存の取引先頼みになっている</li>
          <li>Web集客を強化したいが、何から手をつければいいか分からない</li>
          <li>マーケティングの専任担当がおらず、社内で判断できる人がいない</li>
        </ul>
      </section>

      <section class="page-diagnosis__block">
        <h3 class="page-diagnosis__block-title">お届けする診断レポートの内容</h3>
        <p class="page-diagnosis__block-lead">ご回答いただいた3問と、貴社のWebサイトを拝見したうえで、以下を5ページ程度のレポートにまとめます。</p>
        <ol class="page-diagnosis__report">
          <li class="page-diagnosis__report-item">
            <span class="page-diagnosis__report-num">01</span>
            <h4 class="page-diagnosis__report-title">現在地の整理</h4>
            <p class="page-diagnosis__report-text">問い合わせ状況・実施中の施策・課題感から、貴社のWeb集客が今どの段階にあるかを整理します</p>
          </li>
          <li class="page-diagnosis__report-item">
            <span class="page-diagnosis__report-num">02</span>
            <h4 class="page-diagnosis__report-title">Webサイトの強みと改善点</h4>
            <p class="page-diagnosis__report-text">集客（サイトに来てもらう）、導線（サイト内で問い合わせまで誘導する）、受け皿（問い合わせフォームや相談窓口）の3つの観点から見ます</p>
          </li>
          <li class="page-diagnosis__report-item">
            <span class="page-diagnosis__report-num">03</span>
            <h4 class="page-diagnosis__report-title">最優先すべき一手</h4>
            <p class="page-diagnosis__report-text">改善点を並べるだけでなく、限られた予算と人手で「まず何をやるべきか」を1つに絞ってお伝えします</p>
          </li>
        </ol>
      </section>

      <section class="page-diagnosis__block">
        <p class="page-diagnosis__note">レポートをお読みいただいたうえで、ご希望の方にはオンラインでの無料相談（60分程度）も承ります。<br class="pc">相談だけで終わっても構いません。</p>
      </section>

      <p class="page-diagnosis__cta">まずは下記より、診断をスタートしてください。</p>

      <div class="page-diagnosis__form">
        <script src="https://js-na2.hsforms.net/forms/embed/48153453.js" defer></script>
        <div class="hs-form-frame" data-region="na2" data-form-id="ad4084fb-fdf4-49d2-b4d6-52375b29c848" data-portal-id="48153453"></div>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
