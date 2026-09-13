<?php
/**
 * 表示中のページについて、SEO の各値を1か所で決める
 *
 * title / description / 画像 / canonical / noindex の判定はすべてここを通す。
 * meta タグ・構造化データ・サイトマップ・llms.txt が同じ値を使うので、
 * 出力先ごとに内容が食い違うことがない。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

/**
 * SEO設定を読む投稿のID。
 * トップ（固定ページ）はそのページ、投稿タイプのアーカイブは同じスラッグの固定ページ
 * （例：/ebooks/ → 固定ページ「ダウンロード資料」）を使う。
 */
function will_seo_object_id() {
	if ( is_front_page() && 'page' === get_option( 'show_on_front' ) ) {
		return (int) get_option( 'page_on_front' );
	}
	if ( is_singular() ) {
		return (int) get_queried_object_id();
	}
	if ( is_post_type_archive() ) {
		$page = will_seo_archive_page( get_query_var( 'post_type' ) );
		return $page ? $page->ID : 0;
	}
	if ( is_home() && get_option( 'page_for_posts' ) ) {
		return (int) get_option( 'page_for_posts' );
	}
	return 0;
}

/**
 * 投稿タイプのアーカイブと同じスラッグの固定ページ
 */
function will_seo_archive_page( $post_type ) {
	$post_type = is_array( $post_type ) ? reset( $post_type ) : $post_type;
	$object    = $post_type ? get_post_type_object( $post_type ) : null;
	if ( ! $object ) {
		return null;
	}
	$slug = ! empty( $object->rewrite['slug'] ) ? $object->rewrite['slug'] : $object->name;
	$page = get_page_by_path( $slug );
	return ( $page && 'publish' === $page->post_status ) ? $page : null;
}

/**
 * 投稿の SEO 設定（編集画面「SEO設定」の入力値）
 */
function will_seo_meta( $post_id ) {
	$meta = $post_id ? get_post_meta( $post_id, WILL_SEO_META_KEY, true ) : [];
	return is_array( $meta ) ? $meta : [];
}

/**
 * 入力値中の変数（Slim SEO 時代の書式）を展開する
 */
function will_seo_render_vars( $text, $post_id = 0 ) {
	if ( false === strpos( (string) $text, '{{' ) ) {
		return (string) $text;
	}
	$vars = [
		'site.title'       => get_bloginfo( 'name' ),
		'site.description' => get_bloginfo( 'description' ),
		'post.title'       => $post_id ? get_the_title( $post_id ) : '',
		'sep'              => WILL_SEO_TITLE_SEPARATOR,
		'separator'        => WILL_SEO_TITLE_SEPARATOR,
	];
	$text = preg_replace_callback(
		'/\{\{\s*([\w.]+)\s*\}\}/',
		function ( $m ) use ( $vars ) {
			return $vars[ $m[1] ] ?? '';
		},
		$text
	);
	return trim( preg_replace( '/\s+/u', ' ', $text ) );
}

/**
 * 手入力の title（未入力なら空文字。WordPress 標準の「ページ名 ｜ サイト名」になる）
 */
function will_seo_custom_title( $post_id ) {
	$meta = will_seo_meta( $post_id );
	return empty( $meta['title'] ) ? '' : will_seo_render_vars( $meta['title'], $post_id );
}

/**
 * 投稿の description。手入力 → 抜粋 → 本文の冒頭 の順で決める
 */
function will_seo_post_description( $post_id ) {
	$meta = will_seo_meta( $post_id );
	if ( ! empty( $meta['description'] ) ) {
		return will_seo_render_vars( $meta['description'], $post_id );
	}
	$post = get_post( $post_id );
	if ( ! $post || post_password_required( $post ) ) {
		return '';
	}
	if ( 'page' === get_option( 'show_on_front' ) && (int) get_option( 'page_on_front' ) === $post->ID ) {
		return get_bloginfo( 'description' );
	}
	// 抜粋 → 本文の冒頭。160字以内で、文の途中で切れないよう最後の「。」までにする
	$source = $post->post_excerpt ? $post->post_excerpt : $post->post_content;
	$text   = trim( preg_replace( '/\s+/u', ' ', wp_strip_all_tags( strip_shortcodes( $source ) ) ) );
	if ( mb_strlen( $text ) <= 160 ) {
		return $text;
	}
	$cut  = mb_substr( $text, 0, 160 );
	$last = mb_strrpos( $cut, '。' );
	return false !== $last && $last >= 60 ? mb_substr( $cut, 0, $last + 1 ) : $cut;
}

/**
 * 表示中ページの description
 */
function will_seo_description() {
	$id = will_seo_object_id();
	if ( $id ) {
		return will_seo_post_description( $id );
	}
	if ( is_front_page() ) {
		return get_bloginfo( 'description' );
	}
	if ( is_tax() || is_category() || is_tag() ) {
		return trim( wp_strip_all_tags( term_description() ) );
	}
	return '';
}

/**
 * 表示中ページの正規URL（ページ送り・クエリは含めない）
 */
function will_seo_canonical_url() {
	$id   = will_seo_object_id();
	$meta = will_seo_meta( $id );
	if ( ! empty( $meta['canonical'] ) && is_singular() ) {
		return $meta['canonical'];
	}
	if ( is_front_page() ) {
		return home_url( '/' );
	}
	if ( is_singular() ) {
		return wp_get_canonical_url( get_queried_object_id() );
	}
	// 一覧の2ページ目以降は、そのページ自身を正規URLにする
	$paged = (int) get_query_var( 'paged' );
	if ( is_home() || is_post_type_archive() || is_tax() || is_category() || is_tag() ) {
		if ( $paged > 1 ) {
			return get_pagenum_link( $paged );
		}
		if ( is_home() ) {
			return get_permalink( (int) get_option( 'page_for_posts' ) );
		}
		if ( is_post_type_archive() ) {
			return get_post_type_archive_link( get_query_var( 'post_type' ) );
		}
		$link = get_term_link( get_queried_object() );
		return is_wp_error( $link ) ? '' : $link;
	}
	return '';
}

/**
 * 投稿を検索エンジンに出さないか（投稿単位で決まる条件のみ）
 */
function will_seo_post_is_noindex( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post || 'publish' !== $post->post_status || post_password_required( $post ) ) {
		return true;
	}
	if ( ! empty( will_seo_meta( $post_id )['noindex'] ) ) {
		return true;
	}
	if ( 'page' === $post->post_type && will_seo_page_is_empty_archive( $post ) ) {
		return true;
	}
	return in_array( get_page_template_slug( $post ), will_seo_noindex_templates(), true );
}

/**
 * 投稿タイプの一覧と同じURLを持つ固定ページで、その一覧に公開記事が無いか
 * （例：固定ページ「お知らせ」＝ /info/ は、お知らせが0件の間は中身の無い一覧になる）
 */
function will_seo_page_is_empty_archive( WP_Post $page ) {
	foreach ( get_post_types( [ 'has_archive' => true ], 'objects' ) as $type ) {
		$slug = ! empty( $type->rewrite['slug'] ) ? $type->rewrite['slug'] : $type->name;
		if ( get_page_uri( $page ) === $slug ) {
			return 0 === (int) wp_count_posts( $type->name )->publish;
		}
	}
	return false;
}

/**
 * サイトマップ・llms.txt に載せるか。
 * noindex に加え、別URLを正規URLに指定しているページも載せない（正規URL側を載せる）。
 */
function will_seo_post_is_listable( $post_id ) {
	if ( will_seo_post_is_noindex( $post_id ) ) {
		return false;
	}
	$meta = will_seo_meta( $post_id );
	if ( ! empty( $meta['canonical'] ) && untrailingslashit( $meta['canonical'] ) !== untrailingslashit( get_permalink( $post_id ) ) ) {
		return false;
	}
	// 別URLへ転送しているページ（例：統合前のブログで内容を統合した旧記事）
	$redirects = get_option( 'will_redirects', [] );
	$home_path = untrailingslashit( (string) wp_parse_url( home_url(), PHP_URL_PATH ) );
	$path      = substr( (string) wp_parse_url( get_permalink( $post_id ), PHP_URL_PATH ), strlen( $home_path ) );
	return ! ( is_array( $redirects ) && isset( $redirects[ $path ] ) );
}

/**
 * 表示中のページを noindex にすべきか（テーマが判定する条件）
 */
function will_seo_request_is_noindex() {
	global $wp_query;

	if ( is_404() || is_search() ) {
		return true;
	}
	if ( is_singular() ) {
		if ( get_query_var( 'cpage' ) ) {
			return true;
		}
		return will_seo_post_is_noindex( get_queried_object_id() );
	}
	// ブログのカテゴリ以外のタクソノミー一覧（資料の分類など）は、専用テンプレートが無く内容が重複するため出さない
	if ( is_tax() || is_tag() || is_author() || is_date() ) {
		return true;
	}
	// 中身の無い一覧（例：公開記事が0件のお知らせ）
	if ( ! is_front_page() && ! $wp_query->post_count ) {
		return true;
	}
	$id = will_seo_object_id();
	return $id ? ! empty( will_seo_meta( $id )['noindex'] ) : false;
}

/**
 * wp_robots フィルターを最後まで通した結果で noindex かを返す。
 * LP テンプレート側のフラグ（$..._noindex）も反映される。wp_head 以降で使うこと。
 */
function will_seo_is_noindex() {
	$robots = apply_filters( 'wp_robots', [] );
	return ! empty( $robots['noindex'] );
}

/**
 * ページの最終更新日時（UNIX時刻）。
 * 料金などをテンプレートに直接書いているページもあるため、
 * 投稿の更新日時と、割り当てたテンプレートファイルの更新日時の新しい方を使う。
 * 構造化データ・OGP・サイトマップ・ページ上の表示のすべてでこの値を使う。
 */
function will_seo_modified_timestamp( $post_id ) {
	$post = get_post( $post_id );
	if ( ! $post ) {
		return 0;
	}
	$time     = (int) get_post_modified_time( 'U', true, $post );
	$template = get_page_template_slug( $post );
	$file     = $template ? locate_template( $template ) : '';
	if ( $file ) {
		$time = max( $time, (int) filemtime( $file ) );
	}
	return $time;
}

/**
 * 最終更新日の表示用HTML（例：<time datetime="2026-09-13T10:00:00+09:00">2026年9月13日</time>）
 */
function will_seo_updated_html( $post_id = 0 ) {
	$time = will_seo_modified_timestamp( $post_id ? $post_id : get_queried_object_id() );
	if ( ! $time ) {
		return '';
	}
	return sprintf( '<time datetime="%s">%s</time>', esc_attr( wp_date( 'c', $time ) ), esc_html( wp_date( 'Y年n月j日', $time ) ) );
}

/**
 * 表示中ページの代表画像 [url, width, height, alt]
 */
function will_seo_image() {
	$id   = will_seo_object_id();
	$meta = will_seo_meta( $id );
	$url  = '';

	if ( ! empty( $meta['facebook_image'] ) ) {
		$url = $meta['facebook_image'];
	} elseif ( $id && has_post_thumbnail( $id ) ) {
		// アイキャッチは画像IDが分かるので、URLから引き当てずにサイズを取る
		// （統合前のブログの画像は本体の uploads 外にあり、URLからは引き当てられないため）
		return will_seo_image_data_by_id( get_post_thumbnail_id( $id ) );
	}
	if ( ! $url ) {
		$url = content_url( 'uploads/' . WILL_SEO_DEFAULT_IMAGE );
	}
	return will_seo_image_data( $url );
}

/**
 * 画像IDからURL・サイズ・代替テキストを取る
 */
function will_seo_image_data_by_id( $attachment_id ) {
	$file = wp_get_attachment_metadata( $attachment_id );
	return [
		'url'    => wp_get_attachment_url( $attachment_id ),
		'width'  => (int) ( $file['width'] ?? 0 ),
		'height' => (int) ( $file['height'] ?? 0 ),
		'alt'    => get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ?: get_the_title( $attachment_id ),
	];
}

/**
 * 画像URLからサイズと代替テキストを引く（メディアライブラリにある場合）
 */
function will_seo_image_data( $url ) {
	$data = [
		'url'    => $url,
		'width'  => 0,
		'height' => 0,
		'alt'    => '',
	];
	$attachment_id = attachment_url_to_postid( $url );
	if ( ! $attachment_id ) {
		// 日本語ファイル名はエンコード有無で一致しないことがあるため両方で引く
		$attachment_id = attachment_url_to_postid( rawurldecode( $url ) );
	}
	if ( $attachment_id ) {
		$file           = wp_get_attachment_metadata( $attachment_id );
		$data['width']  = (int) ( $file['width'] ?? 0 );
		$data['height'] = (int) ( $file['height'] ?? 0 );
		$data['alt']    = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ?: get_the_title( $attachment_id );
	}
	return $data;
}

/**
 * パンくず [ [name, url], ... ]（トップでは空）
 */
function will_seo_breadcrumb_items() {
	if ( is_front_page() || is_404() || is_search() ) {
		return [];
	}
	$items   = [ [ 'ホーム', home_url( '/' ) ] ];
	$blog_id = (int) get_option( 'page_for_posts' );

	if ( is_singular( 'post' ) ) {
		// ホーム ＞ ブログ ＞ カテゴリ ＞ 記事
		$post = get_queried_object();
		if ( $blog_id ) {
			$items[] = [ get_the_title( $blog_id ), get_permalink( $blog_id ) ];
		}
		$cats = get_the_category( $post->ID );
		if ( $cats ) {
			$items[] = [ $cats[0]->name, get_term_link( $cats[0] ) ];
		}
		$items[] = [ get_the_title( $post ), get_permalink( $post ) ];
	} elseif ( is_home() && $blog_id ) {
		$items[] = [ get_the_title( $blog_id ), get_permalink( $blog_id ) ];
	} elseif ( is_category() && $blog_id ) {
		$items[] = [ get_the_title( $blog_id ), get_permalink( $blog_id ) ];
		$items[] = [ single_cat_title( '', false ), get_term_link( get_queried_object() ) ];
	} elseif ( is_singular() ) {
		$post = get_queried_object();
		if ( 'page' !== $post->post_type ) {
			$archive = get_post_type_archive_link( $post->post_type );
			if ( $archive ) {
				$page    = will_seo_archive_page( $post->post_type );
				$items[] = [ $page ? get_the_title( $page ) : get_post_type_object( $post->post_type )->labels->name, $archive ];
			}
		}
		foreach ( array_reverse( get_post_ancestors( $post ) ) as $ancestor ) {
			$items[] = [ get_the_title( $ancestor ), get_permalink( $ancestor ) ];
		}
		$items[] = [ get_the_title( $post ), get_permalink( $post ) ];
	} elseif ( is_post_type_archive() ) {
		$items[] = [ post_type_archive_title( '', false ), will_seo_canonical_url() ];
	} elseif ( is_tax() || is_category() || is_tag() ) {
		$items[] = [ single_term_title( '', false ), will_seo_canonical_url() ];
	}
	return count( $items ) > 1 ? $items : [];
}
