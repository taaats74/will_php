<?php get_header(); ?>

  <section class="hero-section single-service info">
    <div class="container">
      <div class="wrapper">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/information.png" alt="お知らせ">
        </div>
        <div class="hero-text">
          <h2 class="section-header"><span class="green">i</span>nformation</h2>
          <p class="sub-title">お知らせ</p>
        </div>
      </div>
    </div>
  </section>

  <section class="archive-info info">
    <div class="container">
      <h2 class="section-header"><span class="green">i</span>nformation</h2>
      <p class="sub-title">お知らせ</p>
      <div class="border"></div>
      <ul>
        <?php
        if(have_posts()):
          while(have_posts()): the_post();
        ?>
        <li>
          <a href="<?php the_permalink(); ?>">
            <span class="date"><?php echo get_the_time('Y.m.d'); ?></span>
            <span class="title"><?php the_title(); ?></span>
          </a>
        </li>
        <?php
          endwhile;
        endif;
        ?>
      </ul>
      <div class="pagination-wrapper">
        <?php
        the_posts_pagination(array(
          'prev_text' => '<i class="fas fa-chevron-left"></i>',
          'next_text' => '<i class="fas fa-chevron-right"></i>'
        ));
        ?>
      </div>
    </div>
  </section>

<?php get_footer("v2"); ?>
