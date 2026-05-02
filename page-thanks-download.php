<?php
/**
 * Template Name: Thanks Download
 * Template Post Type: page
 *
 * 資料ダウンロード 申込完了ページ。
 *
 * - header-v4 + footer-v3 + template-parts/page-hero
 * - トンマナ: page-service-* / page-contact / page-thanks-diagnosis 準拠(Zen Kaku Gothic + 共通余白)
 *
 * @package will-corp
 */
get_header('v4');
?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'THANKS',
  'title' => '資料ダウンロード申込完了',
] );
?>

<section class="page-thanks">
  <div class="container">
    <div class="page-thanks__inner">

      <p class="page-thanks__lead">
        資料のお申込みありがとうございます。<br>
        ご登録いただいたメールアドレス宛に、資料ダウンロード用のURLをお送りしました。
      </p>

      <p class="page-thanks__body">
        メールが届かない場合は、迷惑メールフォルダをご確認いただくか、お手数ですが再度フォームよりお申込みください。
      </p>

      <p class="page-thanks__inline-link">
        <a href="<?php echo esc_url( home_url('/ebook/') ); ?>">メールが送られてきていない方はこちらをクリック</a>
      </p>

      <p class="page-thanks__body">
        資料は貴社の Web 活用や営業の仕組み化を検討される際の参考資料としてお役立てください。
        ご不明点やより具体的なご相談がございましたら、お気軽にお問い合わせください。
      </p>

      <!-- 次のアクション誘導 -->
      <div class="page-thanks__next">
        <h2 class="page-thanks__next-heading">あわせてご検討ください</h2>

        <div class="page-thanks__next-items">
          <a class="page-thanks__next-item" href="<?php echo esc_url( home_url('/contact/') ); ?>">
            <span class="page-thanks__next-label">無料相談</span>
            <span class="page-thanks__next-text">
              資料の内容について個別にご相談されたい方は、60分の無料オンライン相談をご利用ください。
            </span>
          </a>

          <a class="page-thanks__next-item" href="<?php echo esc_url( home_url('/ebook/') ); ?>">
            <span class="page-thanks__next-label">他の資料を見る</span>
            <span class="page-thanks__next-text">
              Webマーケティング・営業の仕組み化に関する資料を他にもご用意しています。
            </span>
          </a>
        </div>
      </div>

      <div class="page-thanks__actions">
        <a class="page-thanks__back" href="<?php echo esc_url( home_url('/') ); ?>">
          トップページに戻る
        </a>
      </div>

    </div>
  </div>
</section>

<?php get_footer('v3'); ?>
