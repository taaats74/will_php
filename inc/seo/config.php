<?php
/**
 * SEO / AEO の設定値
 *
 * 構造化データの中身はページの記載から自動で作るため、ここには置かない。
 * ここに置くのは、ページの内容からは決められない識別子とサイト共通の値だけ。
 * ページごとに変わる値（title / description / OGP画像 / noindex / canonical）は、
 * 各投稿の編集画面「SEO設定」で入力する。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

/** 計測タグ */
const WILL_SEO_GTM_ID         = 'GTM-W2HNMN6J';
const WILL_SEO_HUBSPOT_PORTAL = '48153453';

/** 投稿メタのキー。Slim SEO 時代の入力をそのまま引き継ぐため同じキーを使う */
const WILL_SEO_META_KEY = 'slim_seo';

/** <title> の区切り文字 */
const WILL_SEO_TITLE_SEPARATOR = '｜';

/** OGP画像が未設定のページで使う画像（uploads からの相対パス） */
const WILL_SEO_DEFAULT_IMAGE = '2025/07/スクリーンショット-2025-07-11-4.45.53.png';

/** 検索エンジンに出さないテンプレート（サンクスページ等） */
function will_seo_noindex_templates() {
	return [
		'page-thanks.php',
		'page-thanks-diagnosis.php',
		'page-thanks-download.php',
	];
}

/**
 * ブログ記事の著者（記事ページの「執筆」表示と、構造化データの author に使う）
 */
function will_seo_post_author() {
	return [
		'name'  => '高橋竜也',
		'label' => '高橋 竜也（合同会社ウィル 代表）',
		'url'   => home_url( '/about/' ),
	];
}

/**
 * 人物の @id に使う識別子（人名 → 識別子）。
 * ブログ（別WordPress）の Article.author と同じ @id にして、同一人物として扱わせるためのもの。
 * 人名は空白を詰めて書く。ここに無い人物にも、ページに載っていれば @id は自動で付く。
 */
function will_seo_person_slugs() {
	return [
		'高橋竜也'   => 'person-takahashi',
		'岩田あゆみ' => 'person-iwata',
	];
}
