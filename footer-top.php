    <footer>
      <div class="container">
        <div class="wrapper">
          <div class="img-wrapper">
            <a href="">
              <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="">
            </a>
          </div>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'footer-menu',
              'container' => 'nav',
            ));
          ?>
          <p class="footer-tradelaw">
            <a href="<?php echo get_page_link(214); ?>">特定商取引法に基づく表記</a>
          </p>
          <p class="small">&copy;2023-<?php echo date('Y'); ?> Will Corp.</p>
        </div>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
