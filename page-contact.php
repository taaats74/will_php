<?php
  /*
  Template Name: Contact
  Template Post Type: page
  */
?>

<?php get_header(); ?>

<section class="hero-section contact">
<div class="container">
<div class="wrapper">
  <div class="img-wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/img/contact.png" alt="">
  </div>
  <div class="hero-text">
    <h2 class="section-header"><span class="green">c</span>ontact</h2>
    <p class="sub-title">お問い合わせ</p>
  </div>
</div>
</div>
</section>

<section class="page-contact">
<div class="container">
<div class="wrapper">
  <h2 class="section-header"><span class="green">c</span>ontact</h2>
  <p class="sub-title">お問い合わせ</p>
  <div class="border"></div>
  <p class="content">当社はウェブサイト制作に関するご質問やお見積もりのご依頼、ウェブ戦略に関する相談など、専門スタッフがお客様のご要望を丁寧にお伺いし、最適なソリューションを提案いたします。お気軽にお問い合わせください。</p>
  <form action="">
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
  </form>
</div>
</div>
</section>

<?php get_footer(); ?>
