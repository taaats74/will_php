<?php
/**
 * Plugin Name: Will Blog Security
 * Description: ブログ（/blog/）の公開情報から、攻撃の手がかりになる情報を減らす。
 *
 * 設置先：/blog/wp-content/mu-plugins/will-blog-security.php
 * コーポレートサイト側の同じ対応はテーマの inc/security.php。
 *
 *   - ユーザー名：未ログインでのユーザー一覧API・著者アーカイブ・oEmbed の著者情報から、
 *     ログイン名（例：willblog_admin）が分からないようにする
 *   - XML-RPC：パスワード総当たりの入口になるため停止する（外部アプリからの投稿では使っていない）
 *
 * ログイン画面のURL変更・ログイン試行の制限は SiteGuard プラグインで行っている。
 */

defined( 'ABSPATH' ) || exit;

// XML-RPC を停止する（リクエスト自体を拒否。system.multicall 等の組み込みメソッドも使わせない）
if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
	status_header( 403 );
	exit;
}
add_filter( 'xmlrpc_enabled', '__return_false' );
add_filter( 'xmlrpc_methods', '__return_empty_array' );
add_filter( 'wp_headers', function ( $headers ) {
	unset( $headers['X-Pingback'] );
	return $headers;
} );
remove_action( 'wp_head', 'rsd_link' );

// 未ログインでは /wp-json/wp/v2/users を使えないようにする
add_filter( 'rest_endpoints', function ( $endpoints ) {
	if ( is_user_logged_in() ) {
		return $endpoints;
	}
	foreach ( array_keys( $endpoints ) as $route ) {
		if ( 0 === strpos( $route, '/wp/v2/users' ) ) {
			unset( $endpoints[ $route ] );
		}
	}
	return $endpoints;
} );

// 著者アーカイブ（/?author=1 → /author/ログイン名/ への転送を含む）はブログのトップへ転送する
add_action( 'template_redirect', function () {
	if ( is_author() || isset( $_GET['author'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
}, 0 );

// 埋め込み用データ（oEmbed）の著者は、個人ではなくサイト名にする
add_filter( 'oembed_response_data', function ( $data ) {
	$data['author_name'] = get_bloginfo( 'name' );
	$data['author_url']  = home_url( '/' );
	return $data;
} );
