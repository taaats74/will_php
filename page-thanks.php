<?php
/**
 * Template Name: Thanks
 * Template Post Type: page
 *
 * お問い合わせ完了ページ。
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
  'title' => 'お問い合わせ完了',
] );
?>

<section class="page-thanks">
  <div class="container">
    <div class="page-thanks__inner">

      <p class="page-thanks__lead">
        お問い合わせありがとうございます。<br>
        お送りいただきました内容を確認の上、折り返しご連絡させていただきます。
      </p>

      <p class="page-thanks__body">
        ご記入いただいたメールアドレス宛に、自動返信の確認メールをお送りしております。
        しばらく経ってもメールが届かない場合は、入力いただいたメールアドレスに誤りがあるか、迷惑メールフォルダに振り分けられている可能性がございます。
        ドメイン指定をされている場合は、お手数ですが <a href="mailto:info@will-corp.co.jp">info@will-corp.co.jp</a> からのメールが受信できるよう設定いただいた上で、再度お問い合わせください。
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
