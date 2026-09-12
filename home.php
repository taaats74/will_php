<?php
/**
 * ブログのトップ（/blog/）
 * 固定ページ「blog」を「投稿ページ」に設定して表示する。詳細は inc/blog.php
 *
 * @package will-corp
 */

get_header();

$will_blog_page = get_post( (int) get_option( 'page_for_posts' ) );
$will_blog_lead = $will_blog_page ? will_seo_post_description( $will_blog_page->ID ) : '';

get_template_part( 'template-parts/page-hero', null, [
	'en'    => 'BLOG',
	'title' => $will_blog_page ? get_the_title( $will_blog_page ) : 'ブログ',
	'lead'  => $will_blog_lead,
] );
?>

<section class="blog-archive">
	<div class="blog-container">
		<?php will_blog_category_nav(); ?>

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
			<p class="blog-empty">記事はまだありません。</p>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
