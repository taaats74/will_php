<footer>
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <a href="<?php echo home_url('/'); ?>">
            <img src="img/white_yoko.png" alt="">
          </a>
        </div>
        <ul>
          <li>
            <a href="">top</a>
          </li>
          <li>
            <a href="">about</a>
          </li>
          <li>
            <a href="">service</a>
          </li>
          <li>
            <a href="">works</a>
          </li>
          <li>
            <a href="">blog</a>
          </li>
          <li>
            <a href="">partner</a>
          </li>
          <li>
            <a href="">contact</a>
          </li>
        </ul>
        <p class="small">&copy;2023-<?php the_time('Y'); ?> Will Corp.</p>
      </div>
    </div>
  </footer>
  <script src="js/loading.js"></script>
  <script src="js/sp-menu.js"></script>
  <script src="js/accordion.js"></script>
  <?php wp_footer(); ?>
</body>
</html>