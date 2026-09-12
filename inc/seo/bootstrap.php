<?php
/**
 * SEO / AEO 機能の読み込み
 *
 *   config.php   … ページ内容からは決められない値（計測タグID・人物の識別子など）
 *   context.php  … 表示中ページの title / description / 画像 / canonical / noindex / 更新日の判定
 *   extract.php  … ページ内容の解析（料金・流れ・実績・FAQ・人物・会社情報などを表示HTMLから取り出す）
 *   facts.php    … 会社情報・代表者・連絡先など、サイト共通の事実（ページの記載から読み取って保存）
 *   meta.php     … <head> の meta タグ
 *   schema.php   … 構造化データ（JSON-LD @graph）
 *   sitemap.php  … XMLサイトマップ / robots.txt / llms.txt
 *   tracking.php … GTM / HubSpot
 *   admin.php    … 編集画面の「SEO設定」
 *
 * config / context / extract / facts は関数定義だけなので常に読み込む（テンプレートの更新日表示などで使う）。
 * 出力を伴う機能は、SEO プラグイン（Slim SEO）が有効な間は二重出力になるため読み込まない。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/context.php';
require_once __DIR__ . '/extract.php';
require_once __DIR__ . '/facts.php';

if ( defined( 'SLIM_SEO_VER' ) ) {
	return;
}

foreach ( [ 'meta', 'schema', 'sitemap', 'tracking', 'admin' ] as $will_seo_file ) {
	require_once __DIR__ . "/{$will_seo_file}.php";
}
unset( $will_seo_file );
