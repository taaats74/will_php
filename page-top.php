<?php
  /*
  Template Name: Top Page
  Template Post Type: page
  */
?>

<?php get_header("top"); ?>

<section class="section-fv">
  <div class="container">
    <div class="wrapper">
      <div class="pc">
        <div class="fv-img">
          <div class="img-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/img/page-top-fv.png" alt="">
          </div>
          <div class="scrolldown"><span>Scroll</span></div>
        </div>
        <h2 class="fv-message"><span class="above">ともに、</span><br><span class="bottom">未来を創る。</span></h2>
      </div>
      <div class="sp">
        <div class="img-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/img/sp_top.jpg" alt="">
        </div>
      </div>
      <div class="info-wrapper">
        <h2 class="section-header"><span class="green">t</span>opics</h2>
        <p class="sub-title">お知らせ</p>
        <ul>
          <?php
            $args = array(
              'post_type' => 'info',
              'posts_per_page' => 1,
            );
            $info = new WP_Query($args);
            if($info->have_posts()):
              while($info->have_posts()):
                $info->the_post();
          ?>
          <li>
            <a href="<?php the_permalink(); ?>">
              <span class="date"><?php the_time('Y.m.d') ?></span>
              <span class="title"><?php the_title(); ?></span>
            </a>
          </li>
          <?php
            endwhile;
          else:
          ?>
          <li>お知らせはまだありません。</li>
          <?php
            endif;
            wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php
  if(have_posts()):
  while(have_posts()): the_post();
?>
<?php the_content(); ?>
<?php
  endwhile;
endif;
?>

<?php get_footer("v2"); ?>
