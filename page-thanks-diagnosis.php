<?php
/**
 * Template Name: Thanks Diagnosis
 * Template Post Type: page
 *
 * Webサイト無料診断 申込完了ページ。
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
  'en'    => 'THANKS',
  'title' => '診断レポート申込完了',
] );
?>

<section class="page-thanks">
  <div class="container">
    <div class="page-thanks__inner">

      <p class="page-thanks__lead">
        診断レポートのお申込みありがとうございます。<br>
        入力いただいた内容の確認メールをお送りしましたので、ご確認ください。
      </p>

      <p class="page-thanks__body">
        メールが届かない場合は、お手数ですが再度 URL にアクセスいただき、ご入力いただいたメールアドレスをご確認ください。
      </p>

      <p class="page-thanks__inline-link">
        <a href="<?php echo esc_url( home_url('/diagnosis/') ); ?>">メールが送られてきていない方はこちらをクリック</a>
      </p>

      <p class="page-thanks__body">
        ご入力いただいた内容をもとに、貴社の Web 活用状況を分析し、改善ポイントや優先すべき対策をまとめた診断レポートをお送りします。
        診断結果は後ほど担当者よりご連絡いたしますので、しばらくお待ちください。
      </p>

      <div class="page-thanks__actions">
        <a class="page-thanks__back" href="<?php echo esc_url( home_url('/') ); ?>">
          トップページに戻る
        </a>
      </div>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
