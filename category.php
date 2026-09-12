<?php
/**
 * ブログのカテゴリ（/blog/カテゴリスラッグ/）
 *
 * @package will-corp
 */

get_header();

$will_blog_cat = get_queried_object();

get_template_part( 'template-parts/page-hero', null, [
	'en'    => 'BLOG',
	'title' => single_cat_title( '', false ),
	'lead'  => wp_strip_all_tags( category_description() ),
] );
?>

<section class="blog-archive">
	<div class="blog-container">
		<?php will_blog_category_nav( $will_blog_cat ? (int) $will_blog_cat->term_id : 0 ); ?>

		<?php if ( have_posts() ) : ?>
			<div class="blog-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					will_blog_card( get_post() );
				endwhile;
				?>
			</div>
			<?php get_template_part( 'template-parts/blog-pagination' ); ?>
		<?php else : ?>
			<p class="blog-empty">このカテゴリの記事はまだありません。</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
