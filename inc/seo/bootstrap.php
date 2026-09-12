<?php
/**
 * SEO / AEO 機能の読み込み
 *
 *   config.php   … サイト共通の値（会社情報・サービス定義・計測タグID）
 *   context.php  … 表示中ページの title / description / 画像 / canonical / noindex / 更新日の判定
 *   meta.php     … <head> の meta タグ
 *   schema.php   … 構造化データ（JSON-LD @graph）
 *   sitemap.php  … XMLサイトマップ / robots.txt / llms.txt
 *   tracking.php … GTM / HubSpot
 *   admin.php    … 編集画面の「SEO設定」
 *
 * config / context は関数定義だけなので常に読み込む（テンプレートの更新日表示などで使う）。
 * 出力を伴う機能は、SEO プラグイン（Slim SEO）が有効な間は二重出力になるため読み込まない。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/context.php';

if ( defined( 'SLIM_SEO_VER' ) ) {
	return;
}

foreach ( [ 'meta', 'schema', 'sitemap', 'tracking', 'admin' ] as $will_seo_file ) {
	require_once __DIR__ . "/{$will_seo_file}.php";
}
unset( $will_seo_file );
