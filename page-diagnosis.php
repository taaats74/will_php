<?php
  /*
  Template Name: Diagnosis
  Template Post Type: page
  */
?>

<?php get_header('v4'); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'DIAGNOSIS',
  'title' => '1分でできる無料診断',
  'lead'  => '貴社のBtoBマーケで「最優先すべき一手」を見える化します。',
] );
?>

<section class="page-contact">
<div class="container">
  <div class="wrapper">
    <h2 class="section-header"><span class="green">d</span>iagnosis</h2>
    <p class="sub-title">Webサイト無料診断</p>
    <div class="border"></div>
    <p class="content">Webサイト活用の現状を“たった1分”で可視化する無料診断です。<br>この無料診断は、あなたの会社のWeb活用レベルを10問で可視化し、強みと改善点を明確にします。短時間で現状を把握できるため、全体像をつかみたい方に最適な診断です。<br>こちらからスタートしてください。</p>
      <?php
        if(have_posts()):
          while(have_posts()): the_post();
      ?>
      <?php the_content(); ?>
      <?php
        endwhile;
      endif;
      ?>
    <!-- <form action="">
      <ul>
        <li>
          <label for="company">会社名<span class="required">*</span></label>
          <input type="text" name="company" id="company" placeholder="サンプル株式会社" required>
        </li>
        <li>
          <label for="manager">お名前<span class="required">*</span></label>
          <input type="text" name="manager" id="manager" placeholder="サンプル 太郎" required>
        </li>
        <li>
          <label for="tel">電話番号<span class="required">*</span></label>
          <input type="number" name="tel" id="tel" placeholder="090-0000-0000" required>
        </li>
        <li>
          <label for="email">メールアドレス<span class="required">*</span></label>
          <input type="email" name="email" id="email" placeholder="example@email.com" required>
        </li>
        <li>
          <label for="message">お問い合わせ内容<span class="required">*</span></label>
          <textarea name="message" id="message" cols="30" rows="10" placeholder="お問い合わせ内容をご記載ください。" required></textarea>
        </li>
      </ul>
      <div class="privacy-policy">
        <a href="" target="_blank" rel="noopener noreferrer">プライバシーポリシーをご確認ください。 <i class="fas fa-external-link-alt"></i></a>
      </div>
      <div class="checkbox">
        <input type="checkbox" id="checkbox" required>
        <label for="checkbox"><span class="required">*</span>プライバシーポリシーに同意します。</label>
      </div>
      <div class="contact-btn">
        <button type="submit">上記の内容で送信する</button>
      </div>
      <div class="wpcf7-response-output" aria-hidden="true">送信中・・・</div>
    </form> -->
  </div>
</div>
</section>

<?php get_footer("v3"); ?>
