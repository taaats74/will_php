<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    (function (d) {
      var config = {
        kitId: 'ivl3pwh',
        scriptTimeout: 3000,
        async: true
      },
        h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <title>
    <?php
      if(is_single()):
        wp_title('|', true, 'right');
      elseif(is_page()):
        wp_title('|', true, 'right');
      elseif(is_archive()):
        wp_title('|', true, 'right');
      endif;
        bloginfo('name');
    ?>
  </title>
  <?php wp_head(); ?>
</head>
<body>

  <header class="header-child-page">
    <div class="container pc">
      <div class="wrapper">
        <h1 class="logo" alt="ウィル">
          <div class="img-wrapper">
            <a href="<?php echo home_url('/'); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="">
            </a>
          </div>
        </h1>
        <div class="header-menu">
          <ul>
            <li>
              <a href="">home</a>
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
        </div>
      </div>
      <div class="cover-white"></div>
    </div>
    <div class="sp-menu-icon sp">
      <ul>
        <li></li>
        <li></li>
        <li></li>
      </ul>
    </div>
    <div class="sp-menu sp">
      <div class="container">
        <div class="wrapper">
          <div class="img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/img/white_yoko.png" alt="">
          </div>
          <ul class="menu">
            <li>
              <a href=""><span></span>home<i class="fa-solid fa-chevron-right"></i></a>
            </li>
            <li>
              <a href=""><span></span> about<i class="fa-solid fa-chevron-right"></i></a>
            </li>
            <li>
              <a href=""><span></span>service<i class="fa-solid fa-chevron-right"></i></a>
            </li>
            <li>
              <a href=""><span></span>works<i class="fa-solid fa-chevron-right"></i></a>
            </li>
            <li>
              <a href=""><span></span>blog<i class="fa-solid fa-chevron-right"></i></a>
            </li>
            <li>
              <a href=""><span></span>partner<i class="fa-solid fa-chevron-right"></i></a>
            </li>
            <li>
              <a href=""><span></span>contact<i class="fa-solid fa-chevron-right"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- 下層ページのheaderには「header-child-page」のclassを入れてるので、WP化する時はかheaderテンプレートを2つ作る -->
  <!-- header-child-pageのstyleはheader.scssで制御している -->

  <div class="sp sp-logo">
    <div class="img-wrapper">
      <img src="<?php echo get_template_directory_uri(); ?>/img/logo_black.png" alt="">
    </div>
  </div>
