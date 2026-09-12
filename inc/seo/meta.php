<?php
/**
 * <head> の SEO タグ：title / description / robots / canonical / OGP / Twitter Card
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	// 固定ページでも抜粋を入力できるようにする（description の自動生成元）
	add_post_type_support( 'page', 'excerpt' );
} );

/* ---------- title ---------- */

add_filter( 'document_title_separator', function () {
	return WILL_SEO_TITLE_SEPARATOR;
} );

add_filter( 'pre_get_document_title', function ( $title ) {
	$custom = will_seo_custom_title( will_seo_object_id() );
	return $custom ? $custom : $title;
} );

/* ---------- robots ---------- */

add_filter( 'wp_robots', function ( array $robots ) {
	if ( '0' === get_option( 'blog_public' ) ) {
		return $robots;
	}
	if ( will_seo_request_is_noindex() ) {
		unset( $robots['max-image-preview'] );
		return wp_robots_no_robots( $robots ); // noindex, follow
	}
	$robots['max-snippet']       = '-1';
	$robots['max-video-preview'] = '-1';
	return $robots;
} );

/* ---------- description / canonical / OGP / Twitter ---------- */

remove_action( 'wp_head', 'rel_canonical' );

add_action( 'wp_head', 'will_seo_output_meta', 2 );

function will_seo_output_meta() {
	$noindex     = will_seo_is_noindex();
	$title       = wp_get_document_title();
	$description = will_seo_description();
	$canonical   = will_seo_canonical_url();
	$image       = will_seo_image();

	$tags = [];
	if ( $description ) {
		$tags[] = [ 'name', 'description', $description ];
	}

	$tags[] = [ 'property', 'og:title', $title ];
	$tags[] = [ 'property', 'og:type', ( is_front_page() || ! is_singular() ) ? 'website' : 'article' ];
	if ( $canonical ) {
		$tags[] = [ 'property', 'og:url', $canonical ];
	}
	if ( $description ) {
		$tags[] = [ 'property', 'og:description', $description ];
	}
	$tags[] = [ 'property', 'og:image', $image['url'] ];
	if ( $image['width'] && $image['height'] ) {
		$tags[] = [ 'property', 'og:image:width', $image['width'] ];
		$tags[] = [ 'property', 'og:image:height', $image['height'] ];
	}
	if ( $image['alt'] ) {
		$tags[] = [ 'property', 'og:image:alt', $image['alt'] ];
	}
	$tags[] = [ 'property', 'og:site_name', get_bloginfo( 'name' ) ];
	$tags[] = [ 'property', 'og:locale', 'ja_JP' ];
	if ( is_singular() && ! is_front_page() ) {
		$tags[] = [ 'property', 'article:modified_time', wp_date( 'c', will_seo_modified_timestamp( get_queried_object_id() ) ) ];
	}

	// X は og:title / og:description / og:image を読むため、カードの種類だけ指定する。
	// X 専用の画像が入力されている場合のみ上書きする。
	$tags[] = [ 'name', 'twitter:card', 'summary_large_image' ];
	$twitter_image = will_seo_meta( will_seo_object_id() )['twitter_image'] ?? '';
	if ( $twitter_image && $twitter_image !== $image['url'] ) {
		$tags[] = [ 'name', 'twitter:image', $twitter_image ];
	}

	echo "\n";
	foreach ( $tags as $tag ) {
		$value = in_array( $tag[1], [ 'og:url', 'og:image', 'twitter:image' ], true ) ? esc_url( $tag[2] ) : esc_attr( $tag[2] );
		printf( '<meta %s="%s" content="%s">' . "\n", $tag[0], esc_attr( $tag[1] ), $value );
	}
	// noindex のページに canonical を併記すると矛盾したシグナルになるため出さない
	if ( $canonical && ! $noindex ) {
		printf( '<link rel="canonical" href="%s">' . "\n", esc_url( $canonical ) );
	}
}

/* ---------- 画像の代替テキスト ---------- */

// 代替テキストが未入力の画像は、メディアのタイトルで補う
add_filter( 'wp_get_attachment_image_attributes', function ( $attr, $attachment ) {
	if ( empty( $attr['alt'] ) ) {
		$attr['alt'] = get_the_title( $attachment );
	}
	return $attr;
}, 10, 2 );
