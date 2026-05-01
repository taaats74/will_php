<?php
  /*
  Template Name: Thanks Diagnosis
  Template Post Type: page
  */
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'THANKS',
  'title' => '診断レポート申込完了',
] );
?>

  <section class="page-contact">
    <div class="container">
      <div class="wrapper">
        <h2 class="section-header"><span class="green">d</span>iagnosis</h2>
        <p class="sub-title">Webサイト無料診断</p>
        <div class="border"></div>
        <div class="text-wrapper">
          <p>入力いただいた内容の確認メールを送らせていただきましたので、ご確認ください。メールが送られてきていない場合は、大変お手数ですが、再度URLにアクセスいただき、入力いただいたメールアドレスをご確認ください。</p>
            <a href="https://will-corp.co.jp/diagnosis/">メールが送られてきていない方はこちらをクリック</a>
          </p>
          <p>ご入力いただいた内容をもとに、あなたの会社のWeb活用状況を分析し、改善ポイントや優先すべき対策をまとめた診断レポートをお送りします。診断結果は後ほど担当者よりご連絡いたしますので、しばらくお待ちください。</p>
        </div>
      </div>
    </div>
  </section>

<?php get_footer("v3"); ?>
