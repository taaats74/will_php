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
          <p class="small">&copy;2023-<?php the_time('Y'); ?> Will Corp.</p>
        </div>
      </div>
    </footer>
  </div>
  <script src="<?php echo get_template_directory_uri(); ?>/js/loading.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/sp-menu.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/accordion.js"></script>
  <?php wp_footer(); ?>
</body>
</html>
