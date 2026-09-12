<?php
/**
 * XMLサイトマップ / robots.txt / llms.txt
 *
 * サイトマップは WordPress 標準機能を使い、公開URLは Slim SEO 時代と同じ /sitemap.xml にする。
 * 載せるのは検索結果に出すページだけ（noindex・別URLを正規URLに指定したページは除く）。
 *
 * llms.txt は AI検索・LLM 向けのサイト案内。各ページの title / description から自動生成する。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

/** リライトルールを変えたら上げる（本番反映時に1回だけ自動で再生成される） */
const WILL_SEO_REWRITE_VERSION = '2';

add_action( 'init', function () {
	add_rewrite_rule( '^sitemap\.xml$', 'index.php?sitemap=index', 'top' );
	add_rewrite_rule( '^llms\.txt$', 'index.php?will_llms=1', 'top' );
	// Slim SEO 時代の個別サイトマップURL（本体・統合前のブログ）
	add_rewrite_rule( '^(?:blog/)?sitemap-(post-type|taxonomy)-([a-z0-9_-]+)\.xml$', 'index.php?will_legacy_sitemap=$matches[1]:$matches[2]', 'top' );
	add_rewrite_rule( '^blog/sitemap\.xml$', 'index.php?will_legacy_sitemap=index:index', 'top' );

	if ( get_option( 'will_seo_rewrite_version' ) !== WILL_SEO_REWRITE_VERSION ) {
		flush_rewrite_rules( false );
		update_option( 'will_seo_rewrite_version', WILL_SEO_REWRITE_VERSION );
	}
}, 20 );

add_filter( 'query_vars', function ( $vars ) {
	$vars[] = 'will_llms';
	$vars[] = 'will_legacy_sitemap';
	return $vars;
} );

// 公開中の「投稿」が0件だと、WordPress はサイトマップ等の要求にも 404 を返してしまうため除外する。
// 存在しない種類のサイトマップ（例：users）は 404 のままにする。
add_filter( 'pre_handle_404', function ( $handled, $query ) {
	$sitemap = $query->get( 'sitemap' );
	if ( $sitemap ) {
		$exists = 'index' === $sitemap || isset( wp_get_sitemap_providers()[ $sitemap ] );
		return $exists ? true : $handled;
	}
	foreach ( [ 'sitemap-stylesheet', 'will_llms', 'will_legacy_sitemap' ] as $var ) {
		if ( $query->get( $var ) ) {
			return true;
		}
	}
	return $handled;
}, 10, 2 );

// /sitemap.xml を /wp-sitemap.xml へ転送せず、そのURLのまま返す
add_filter( 'redirect_canonical', function ( $redirect ) {
	return get_query_var( 'sitemap' ) || get_query_var( 'will_llms' ) ? false : $redirect;
} );

/* ---------- サイトマップ ---------- */

// ユーザー一覧は載せない
add_filter( 'wp_sitemaps_add_provider', function ( $provider, $name ) {
	return 'users' === $name ? false : $provider;
}, 10, 2 );

// タクソノミーはブログのカテゴリだけ（資料の分類などの一覧は noindex）
add_filter( 'wp_sitemaps_taxonomies', function ( $taxonomies ) {
	return array_intersect_key( $taxonomies, [ 'category' => true ] );
} );

// 公開中の投稿が1件以上ある投稿タイプだけ
add_filter( 'wp_sitemaps_post_types', function ( $post_types ) {
	return array_filter( $post_types, function ( $type ) {
		return (int) wp_count_posts( $type->name )->publish > 0;
	} );
} );

add_filter( 'wp_sitemaps_posts_query_args', function ( $args, $post_type ) {
	$args['post__not_in'] = array_merge( $args['post__not_in'] ?? [], will_seo_unlisted_post_ids( $post_type ) );
	return $args;
}, 10, 2 );

// 更新日時を載せる
add_filter( 'wp_sitemaps_posts_entry', function ( $entry, $post ) {
	$entry['lastmod'] = wp_date( 'c', will_seo_modified_timestamp( $post->ID ) );
	return $entry;
}, 10, 2 );

/**
 * サイトマップ・llms.txt に載せない公開投稿のID
 */
function will_seo_unlisted_post_ids( $post_type ) {
	$ids = get_posts( [
		'post_type'      => $post_type,
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'no_found_rows'  => true,
	] );
	return array_values( array_filter( $ids, function ( $id ) {
		return ! will_seo_post_is_listable( $id );
	} ) );
}

// 旧URL（/sitemap-post-type-page.xml 等）は新しいサイトマップへ恒久リダイレクト
add_action( 'template_redirect', function () {
	$legacy = get_query_var( 'will_legacy_sitemap' );
	if ( ! $legacy ) {
		return;
	}
	list( $kind, $name ) = explode( ':', $legacy ) + [ '', '' ];
	// 統合前のブログの固定ページ用サイトマップ（サンプルページのみ）は、本体の固定ページと別物なので全体へ
	$from_blog = false !== strpos( (string) wp_parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/blog/' ); // phpcs:ignore
	$to        = home_url( '/sitemap.xml' );
	if ( 'post-type' === $kind && post_type_exists( $name ) && ! ( $from_blog && 'page' === $name ) ) {
		$to = home_url( "/wp-sitemap-posts-{$name}-1.xml" );
	} elseif ( 'taxonomy' === $kind && 'category' === $name ) {
		$to = home_url( '/wp-sitemap-taxonomies-category-1.xml' );
	}
	wp_safe_redirect( $to, 301 );
	exit;
}, 1 );

/* ---------- robots.txt ---------- */

add_filter( 'robots_txt', function ( $output, $public ) {
	if ( ! $public ) {
		return $output;
	}
	$output  = preg_replace( '/^Sitemap:.*$\n?/mi', '', $output );
	$output  = preg_replace( '/^Allow: \/wp-admin\/admin-ajax\.php$\n?/mi', '', $output );
	$output  = rtrim( $output ) . "\n";
	$output .= "Disallow: /?s=\nDisallow: /page/*/?s=\nDisallow: /search/\nAllow: /wp-admin/admin-ajax.php\n\n";
	$output .= 'Sitemap: ' . home_url( '/sitemap.xml' ) . "\n";
	return $output;
}, 99, 2 );

/* ---------- llms.txt ---------- */

add_action( 'template_redirect', function () {
	if ( ! get_query_var( 'will_llms' ) ) {
		return;
	}
	status_header( 200 );
	header( 'Content-Type: text/plain; charset=utf-8' );
	header( 'X-Robots-Tag: noindex' );
	echo will_seo_llms_txt(); // phpcs:ignore WordPress.Security.EscapeOutput -- プレーンテキスト
	exit;
}, 1 );

/**
 * llms.txt の本文（https://llmstxt.org/ の書式）
 */
function will_seo_llms_txt() {
	$front_id     = (int) get_option( 'page_on_front' );
	$ebooks_page  = will_seo_archive_page( 'ebooks' );
	$ebooks_index = $ebooks_page ? $ebooks_page->ID : 0;
	$groups   = [
		'サービス'         => [],
		'ダウンロード資料' => [],
		'会社情報・その他' => [],
	];
	$blog_id    = (int) get_option( 'page_for_posts' );
	$blog_posts = [];

	$posts = get_posts( [
		'post_type'      => [ 'page', 'ebooks', 'info', 'post' ],
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => [ 'post_type' => 'ASC', 'menu_order' => 'ASC', 'date' => 'DESC' ],
	] );

	foreach ( $posts as $post ) {
		if ( $post->ID === $front_id || $post->ID === $blog_id || ! will_seo_post_is_listable( $post->ID ) ) {
			continue;
		}
		$title = will_seo_custom_title( $post->ID ) ?: get_the_title( $post );
		$line  = '- [' . will_seo_llms_escape( $title ) . '](' . get_permalink( $post ) . ')';
		$desc  = will_seo_post_description( $post->ID );
		if ( $desc ) {
			$line .= ': ' . will_seo_llms_escape( $desc );
		}

		// 分類は、そのページの構造化データで判定した主題による
		//   サービス … 主題が Service / OfferCatalog のページと、子ページがサービスのページ（サービス一覧）
		if ( 'post' === $post->post_type ) {
			$cats = get_the_category( $post->ID );
			$blog_posts[ $cats ? $cats[0]->name : 'その他' ][] = $line;
		} elseif ( 'ebooks' === $post->post_type || $post->ID === $ebooks_index ) {
			$groups['ダウンロード資料'][] = $line;
		} elseif ( will_seo_llms_is_service( $post ) ) {
			$groups['サービス'][] = $line;
		} else {
			$groups['会社情報・その他'][] = $line;
		}
	}

	// 会社情報は、会社概要・特定商取引法に基づく表記のページから読み取った内容
	$org  = will_seo_organization_node( true );
	$text = '# ' . get_bloginfo( 'name' ) . "\n\n";
	$text .= '> ' . will_seo_llms_escape( $front_id ? will_seo_post_description( $front_id ) : get_bloginfo( 'description' ) ) . "\n\n";
	if ( ! empty( $org['description'] ) ) {
		$text .= will_seo_llms_escape( $org['description'] ) . "\n";
	}
	$profile = [];
	if ( ! empty( $org['address'] ) ) {
		$profile[] = '所在地：' . ( $org['address']['addressRegion'] ?? '' ) . ( $org['address']['addressLocality'] ?? '' ) . ( $org['address']['streetAddress'] ?? '' );
	}
	if ( ! empty( $org['foundingDate'] ) ) {
		$profile[] = '設立：' . $org['foundingDate'];
	}
	if ( ! empty( $org['telephone'] ) ) {
		$profile[] = '電話：' . $org['telephone'];
	}
	if ( ! empty( $org['email'] ) ) {
		$profile[] = 'メール：' . $org['email'];
	}
	if ( $profile ) {
		$text .= implode( '　', $profile ) . "\n";
	}
	foreach ( $groups as $heading => $lines ) {
		if ( $lines ) {
			$text .= "\n## {$heading}\n\n" . implode( "\n", $lines ) . "\n";
		}
	}
	// ブログ記事（カテゴリ別）
	if ( $blog_posts ) {
		$text .= "\n## " . ( $blog_id ? get_the_title( $blog_id ) : 'ブログ' ) . "\n\n";
		if ( $blog_id ) {
			$text .= '- [' . will_seo_llms_escape( get_the_title( $blog_id ) ) . '](' . get_permalink( $blog_id ) . '): ' . will_seo_llms_escape( will_seo_post_description( $blog_id ) ) . "\n";
		}
		foreach ( $blog_posts as $category => $lines ) {
			$text .= "\n### {$category}\n\n" . implode( "\n", $lines ) . "\n";
		}
	}
	return $text;
}

function will_seo_llms_is_service( WP_Post $post ) {
	if ( in_array( will_seo_page_kind( get_permalink( $post ) ), [ 'Service', 'OfferCatalog' ], true ) ) {
		return true;
	}
	foreach ( get_pages( [ 'parent' => $post->ID, 'post_status' => 'publish' ] ) as $child ) {
		if ( 'Service' === will_seo_page_kind( get_permalink( $child ) ) ) {
			return true;
		}
	}
	return false;
}

function will_seo_llms_escape( $text ) {
	return trim( preg_replace( '/\s+/u', ' ', wp_strip_all_tags( (string) $text ) ) );
}
