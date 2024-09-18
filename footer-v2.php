    <footer class="footer02">
      <div class="footer-container">
        <div class="footer-wrapper">
          <a href=""><img src="<?php echo get_template_directory_uri(); ?>/img/page-top2-white_yoko.png" alt=""></a>
          <div class="link-wrapper">
            <div class="left-wrapper">
              <div class="address">
                <span>〒812-0011</span><br>
                <span>福岡県福岡市博多区博多駅前1-23-2</span>
              </div>
              <a href="https://www.instagram.com/luce_create/" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
            </div>
            <div class="right-wrapper">
              <!-- <ul class="menu-wrapper">
                <li>
                  <a href="">トップ</a>
                </li>
                <li>
                  <a href="">制作実績</a>
                </li>
                <li>
                  <a href="">ウィルについて</a>
                </li>
                <li>
                  <a href="">ブログ</a>
                </li>
                <li>
                  <a href="">お問い合わせ</a>
                </li>
                <li>
                  <a href="">特定商取引法に基づく表記</a>
                </li>
                <li>
                  <a href="">サービス内容</a>
                </li>
              </ul> -->
              <?php
                wp_nav_menu(array(
                  'theme_location' => 'footer-menu',
                  'container' => 'nav',
                  'menu_class' => 'menu-wrapper',
                ));
              ?>
              <ul class="service-wrapper">
                <li>
                  <a href="">Webサイト制作</a>
                </li>
                <li>
                  <a href="">Webマーケティング</a>
                </li>
                <li>
                  <a href="">SNS運用サポート</a>
                </li>
                <li>
                  <a href="">Web広告運用代行</a>
                </li>
                <li>
                  <a href="">チラシ・バナー制作</a>
                </li>
              </ul>
            </div>
          </div>
          <p class="copy">&copy;2023-<?php echo date('Y'); ?> Will Corp.</p>
        </div>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
