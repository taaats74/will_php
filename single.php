<?php
/**
 * ブログの記事（/blog/記事スラッグ/）
 *
 * 目次・関連記事・前後の記事・記事下CTA（本文にCTAが無い記事のみ）を付ける。詳細は inc/blog.php
 *
 * @package will-corp
 */

get_header();

while ( have_posts() ) :
	the_post();
	$will_post    = get_post();
	$will_cat     = will_blog_primary_category( $will_post );
	$will_body    = apply_filters( 'the_content', get_the_content() );
	$will_toc     = will_blog_toc( $will_body );
	$will_author  = will_seo_post_author();
	$will_blog_id = (int) get_option( 'page_for_posts' );
	?>

	<article class="blog-single">
		<header class="blog-single__head">
			<div class="blog-container blog-container--narrow">
				<nav class="blog-breadcrumb" aria-label="パンくずリスト">
					<ol>
						<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
						<li><a href="<?php echo esc_url( get_permalink( $will_blog_id ) ); ?>"><?php echo esc_html( get_the_title( $will_blog_id ) ); ?></a></li>
						<?php if ( $will_cat ) : ?>
							<li><a href="<?php echo esc_url( get_term_link( $will_cat ) ); ?>"><?php echo esc_html( $will_cat->name ); ?></a></li>
						<?php endif; ?>
					</ol>
				</nav>
				<?php if ( $will_cat ) : ?>
					<p class="blog-single__cat"><a href="<?php echo esc_url( get_term_link( $will_cat ) ); ?>"><?php echo esc_html( $will_cat->name ); ?></a></p>
				<?php endif; ?>
				<h1 class="blog-single__title"><?php the_title(); ?></h1>
				<p class="blog-single__meta">
					<span>公開日 <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time></span>
					<?php if ( get_the_modified_date( 'Ymd' ) > get_the_date( 'Ymd' ) ) : ?>
						<span>更新日 <time datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"><?php echo esc_html( get_the_modified_date( 'Y.m.d' ) ); ?></time></span>
					<?php endif; ?>
					<?php if ( $will_author ) : ?>
						<span class="blog-single__author">執筆 <a href="<?php echo esc_url( $will_author['url'] ); ?>"><?php echo esc_html( $will_author['label'] ); ?></a></span>
					<?php endif; ?>
				</p>
			</div>
		</header>

		<div class="blog-container blog-container--narrow">
			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="blog-single__thumb">
					<?php the_post_thumbnail( 'large', [ 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '(max-width: 840px) 100vw, 800px' ] ); ?>
				</figure>
			<?php endif; ?>

			<?php echo $will_toc['toc']; // phpcs:ignore WordPress.Security.EscapeOutput -- will_blog_toc() でエスケープ済み ?>

			<div class="blog-content">
				<?php echo $will_toc['content']; // phpcs:ignore WordPress.Security.EscapeOutput -- the_content 済みの本文 ?>
			</div>

			<?php echo will_blog_cta( $will_post ); // phpcs:ignore WordPress.Security.EscapeOutput ?>

			<nav class="blog-pn" aria-label="前後の記事">
				<div class="blog-pn__prev"><?php previous_post_link( '%link', '<span>前の記事</span>%title' ); ?></div>
				<div class="blog-pn__next"><?php next_post_link( '%link', '<span>次の記事</span>%title' ); ?></div>
			</nav>
		</div>

		<?php $will_related = will_blog_related_posts( $will_post ); ?>
		<?php if ( $will_related ) : ?>
			<section class="blog-related">
				<div class="blog-container">
					<h2 class="blog-related__title">関連記事</h2>
					<div class="blog-grid">
						<?php foreach ( $will_related as $will_rel ) : ?>
							<?php will_blog_card( $will_rel ); ?>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
	</article>

<?php endwhile; ?>

<?php get_footer(); ?>
