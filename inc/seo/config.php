<?php
/**
 * SEO / AEO の設定値
 *
 * ページごとに変わる値（title / description / OGP画像 / noindex / canonical）は
 * 各投稿の編集画面「SEO設定」で入力する。ここに置くのはサイト共通の値と、
 * ページの内容からは自動で判別できない値（サービス名・料金）だけ。
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
 * 組織情報（Organization）。
 * @id はブログ側（別WordPress）の構造化データからも参照しているため変えないこと。
 */
function will_seo_organization() {
	$home = home_url( '/' );
	return [
		'@type'        => 'Organization',
		'@id'          => $home . '#organization',
		'name'         => get_bloginfo( 'name' ),
		'legalName'    => '合同会社ウィル',
		'url'          => $home,
		'logo'         => content_url( 'uploads/2025/08/logo_black.png' ),
		'image'        => content_url( 'uploads/2025/08/logo_black.png' ),
		'description'  => 'BtoB企業の営業基盤をWebから設計する、福岡のWebマーケティング支援会社。Webサイト制作・運用、MA構築・運用支援、コンテンツSEO構築・運用支援、Instagram構築・運用支援、グラフィック制作を統合的に提供。',
		'foundingDate' => '2023-11',
		'address'      => [
			'@type'           => 'PostalAddress',
			'streetAddress'   => '博多駅前1-23-2 ParkFront博多駅前1丁目5F-B',
			'addressLocality' => '福岡市博多区',
			'addressRegion'   => '福岡県',
			'postalCode'      => '812-0011',
			'addressCountry'  => 'JP',
		],
		// 連絡先の出典は特定商取引法に基づく表記ページ（page-tradelaw.php）
		'telephone'    => '+81-70-4131-3250',
		'email'        => 'info@will-corp.co.jp',
		'contactPoint' => [
			[
				'@type'             => 'ContactPoint',
				'contactType'       => 'customer support',
				'telephone'         => '+81-70-4131-3250',
				'email'             => 'info@will-corp.co.jp',
				'url'               => home_url( '/contact/' ),
				'areaServed'        => 'JP',
				'availableLanguage' => [ 'Japanese' ],
			],
		],
		'areaServed'   => [
			'@type' => 'Country',
			'name'  => '日本',
		],
		// 事業領域。about ページの「業務内容」と揃える
		'knowsAbout'   => [
			'BtoBマーケティング',
			'Webサイト制作',
			'Webサイト運用',
			'マーケティングオートメーション',
			'コンテンツSEO',
			'Instagram運用',
			'グラフィックデザイン',
		],
		'sameAs'       => [
			'https://www.instagram.com/will_marketing_branding',
			'https://www.youtube.com/@will-btob-marketing',
		],
	];
}

/**
 * 代表者（Person）。経歴は about ページ（page-about-v2.php）の記載に基づく。
 * @id はブログ側の Article.author と同じものを使い、同一人物として扱わせる。
 */
function will_seo_people() {
	$home  = home_url( '/' );
	$about = home_url( '/about/' );
	return [
		[
			'@type'       => 'Person',
			'@id'         => $home . '#person-takahashi',
			'name'        => '高橋 竜也',
			'jobTitle'    => '代表',
			'url'         => $about,
			'description' => 'アメリカの大学でマネジメントとマーケティングを学び、その後IT企業のマーケティング部門に10年間従事。マーケティングから内勤営業チームのマネジメントまで、集客から販売までの実践的なビジネススキルを培う。現在は福岡を拠点に、BtoB中小企業のWebマーケティング支援を行う。',
			'knowsAbout'  => [ 'BtoBマーケティング', 'Webマーケティング', 'リード獲得', 'マーケティングオートメーション', 'コンテンツSEO' ],
		],
		[
			'@type'       => 'Person',
			'@id'         => $home . '#person-iwata',
			'name'        => '岩田 あゆみ',
			'jobTitle'    => '代表',
			'url'         => $about,
			'description' => '九州大学大学院卒業後、研究職を経てWebデザイン・マーケティングの制作会社へ転職。独立後、制作全般とSNS集客支援・講師業を経て会社を設立。デザイン全般・SNS集客・ディレクションを担当。',
			'alumniOf'    => [
				'@type' => 'CollegeOrUniversity',
				'name'  => '九州大学大学院',
			],
			'knowsAbout'  => [ 'Webデザイン', 'グラフィックデザイン', 'Instagram運用', 'ディレクション' ],
		],
	];
}

/**
 * サービスを提供するページの定義。キーはページに割り当てたテンプレート。
 *
 * 説明文はここに書かない（ページのメタディスクリプションを使う）。
 * plans の金額は税抜。setup は初期費用（0 なら出力しない）。
 * 金額はページ上の表記と毎回照合し、見つからないときは料金を出力しない。
 */
function will_seo_services() {
	return [
		'page-service-web.php'          => [
			'name'        => 'Webサイト制作',
			'serviceType' => 'BtoB企業向けWebサイト制作・運用',
		],
		'page-service-ma.php'           => [
			'name'        => 'MA構築・運用支援',
			'serviceType' => 'マーケティングオートメーション導入・運用支援',
		],
		'page-service-seo.php'          => [
			'name'        => 'コンテンツSEO構築・運用支援',
			'serviceType' => 'コンテンツSEO構築・運用支援',
		],
		'page-service-sns.php'          => [
			'name'        => 'Instagram構築・運用支援',
			'serviceType' => 'Instagram構築・運用支援',
		],
		'page-service-creative.php'     => [
			'name'        => 'クリエイティブ制作',
			'serviceType' => 'グラフィック・クリエイティブ制作',
		],
		'page-willsupport-v2.php'       => [
			'name'        => 'ウィルサポ',
			'serviceType' => 'サブスク型ホームページ制作',
			'plans'       => [
				[ 'id' => 'simple', 'name' => 'シンプル', 'monthly' => 30000, 'setup' => 100000 ],
				[ 'id' => 'standard', 'name' => 'スタンダード', 'monthly' => 40000, 'setup' => 100000 ],
				[ 'id' => 'premium', 'name' => 'プレミアム', 'monthly' => 50000, 'setup' => 100000 ],
			],
		],
		'page-willgrow-v2.php'          => [
			'name'        => 'ウィルグロー',
			'serviceType' => 'BtoB特化・月額制のマーケティング支援',
			'plans'       => [
				[ 'id' => 'design', 'name' => '設計プラン', 'monthly' => 100000, 'setup' => 0 ],
				[ 'id' => 'inquiry', 'name' => '問い合わせプラン', 'monthly' => 300000, 'setup' => 0 ],
				[ 'id' => 'meeting', 'name' => '商談プラン', 'monthly' => 500000, 'setup' => 0 ],
			],
		],
		'page-will-support-ec.php'      => [
			'name'        => 'ウィルサポEC',
			'serviceType' => 'サブスク型ECサイト制作',
			'plans'       => [
				[ 'id' => 'simple', 'name' => 'シンプル', 'monthly' => 40000, 'setup' => 300000 ],
				[ 'id' => 'standard', 'name' => 'スタンダード', 'monthly' => 50000, 'setup' => 300000 ],
				[ 'id' => 'premium', 'name' => 'プレミアム', 'monthly' => 60000, 'setup' => 300000 ],
			],
		],
		'page-btob-consultation-lp.php' => [
			'name'        => 'BtoBマーケティング無料相談・無料診断',
			'serviceType' => '無料相談・無料診断',
			'plans'       => [
				[ 'id' => 'free-consultation', 'name' => '無料相談', 'monthly' => 0, 'setup' => 0 ],
			],
		],
	];
}
