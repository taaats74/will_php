<?php
/**
 * 構造化データ(JSON-LD)の追加出力
 *
 * Organization / WebSite / WebPage / BreadcrumbList / Article は Slim SEO が
 * 出力するため、ここでは Slim SEO が扱わない型だけを補う。
 *
 * - サービス各ページ … Service（provider は Slim SEO の Organization を @id 参照）
 * - サービス一覧     … ItemList（配下5ページへのリスト）
 * - 資料(ebooks)個別 … DigitalDocument + Offer(無料)
 *
 * LP(ウィルサポ / ウィルグロー / BtoB無料相談)の Service・FAQPage は
 * 各テンプレート内に直接記述している。FAQ は tools/faq_schema_sync.py で
 * 本文と同期させること。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

/** Slim SEO が出力する Organization ノードの @id */
const WILL_SD_ORG_ID = 'https://will-corp.co.jp/#organization';

/**
 * サービスページの定義。
 * キーはページに割り当てているテンプレートファイル名。
 * description は各ページのメタディスクリプションと揃えている。
 */
function will_sd_service_map() {
	return [
		'page-service-web.php' => [
			'path'        => 'service/web-creative',
			'name'        => 'Webサイト制作',
			'serviceType' => 'BtoB企業向けWebサイト制作・運用',
			'description' => 'テンプレート型ではなく営業構造から逆算する戦略設計型のBtoBサイト制作。サブスク型「ウィルサポ」とフルオーダー型・大規模リニューアルを、企業の状況に合わせて使い分けます。',
		],
		'page-service-ma.php' => [
			'path'        => 'service/marketing-automation',
			'name'        => 'MA構築・運用支援',
			'serviceType' => 'マーケティングオートメーション導入・運用支援',
			'description' => '展示会・問い合わせで集めた見込み客を商談化につなげる仕組みづくり。HubSpotなどMAツールの導入から運用設計、シナリオ構築まで伴走支援します。',
		],
		'page-service-seo.php' => [
			'path'        => 'service/seo',
			'name'        => 'コンテンツSEO構築・運用支援',
			'serviceType' => 'コンテンツSEO構築・運用支援',
			'description' => '検索流入を起点にリード獲得を仕組み化し、商談化につなげるコンテンツSEO支援。記事戦略・キーワード設計・公開後の改善まで一気通貫で対応します。',
		],
		'page-service-sns.php' => [
			'path'        => 'service/instagram-support',
			'name'        => 'Instagram構築・運用支援',
			'serviceType' => 'Instagram構築・運用支援',
			'description' => 'BtoB中小企業向けのInstagram構築・運用支援。認知獲得から比較検討フェーズへの引き上げ、信頼構築までを設計し、アカウント設計から投稿運用支援まで伴走します。',
		],
		'page-service-creative.php' => [
			'path'        => 'service/creative',
			'name'        => 'クリエイティブ制作',
			'serviceType' => 'グラフィック・クリエイティブ制作',
			'description' => '営業導線とブランド軸を踏まえたクリエイティブ制作。チラシ・名刺・営業資料・ロゴ・バナーなど、オンラインとオフラインを横断して一貫した世界観で制作します。',
		],
	];
}

/**
 * サービス一覧ページに並べる配下ページのパス（表示順）
 */
function will_sd_service_paths() {
	return wp_list_pluck( will_sd_service_map(), 'path' );
}

/**
 * 表示中のページに対応するサービス定義を返す。
 * テンプレート割り当てで判定し、外れた場合はページのパスで拾う。
 */
function will_sd_current_service() {
	$map      = will_sd_service_map();
	$template = get_page_template_slug( get_queried_object_id() );
	if ( isset( $map[ $template ] ) ) {
		return $map[ $template ];
	}
	$path = trim( (string) get_page_uri( get_queried_object_id() ), '/' );
	foreach ( $map as $service ) {
		if ( $service['path'] === $path ) {
			return $service;
		}
	}
	return null;
}

/**
 * JSON-LD を1ブロック出力する
 */
function will_sd_print( array $data ) {
	$flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		$flags |= JSON_PRETTY_PRINT;
	}
	echo "\n" . '<script type="application/ld+json">' . wp_json_encode( $data, $flags ) . '</script>' . "\n";
}

/**
 * サービスページ: Service
 */
function will_sd_service() {
	$s = will_sd_current_service();
	if ( ! $s ) {
		return false;
	}
	$url = get_permalink();

	will_sd_print( [
		'@context'    => 'https://schema.org',
		'@type'       => 'Service',
		'@id'         => $url . '#service',
		'name'        => $s['name'],
		'serviceType' => $s['serviceType'],
		'description' => $s['description'],
		'url'         => $url,
		'provider'    => [ '@id' => WILL_SD_ORG_ID ],
		'areaServed'  => [
			'@type' => 'Country',
			'name'  => '日本',
		],
		'audience'    => [
			'@type' => 'BusinessAudience',
			'name'  => 'BtoB中小企業',
		],
	] );
	return true;
}

/**
 * サービス一覧ページ: ItemList
 */
function will_sd_service_list() {
	$id = get_queried_object_id();
	if ( 'page-service.php' !== get_page_template_slug( $id )
		&& 'service' !== trim( (string) get_page_uri( $id ), '/' ) ) {
		return false;
	}
	$elements = [];
	$position = 1;
	foreach ( will_sd_service_paths() as $path ) {
		$page = get_page_by_path( $path );
		if ( ! $page ) {
			continue;
		}
		$elements[] = [
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => get_the_title( $page ),
			'url'      => get_permalink( $page ),
		];
	}
	if ( ! $elements ) {
		return false;
	}
	will_sd_print( [
		'@context'        => 'https://schema.org',
		'@type'           => 'ItemList',
		'@id'             => get_permalink() . '#servicelist',
		'name'            => '支援領域',
		'itemListElement' => $elements,
	] );
	return true;
}

/**
 * 資料(ebooks)個別ページ: DigitalDocument + 無料 Offer
 */
function will_sd_ebook() {
	if ( ! is_singular( 'ebooks' ) ) {
		return false;
	}
	$post_id = get_queried_object_id();
	$url     = get_permalink( $post_id );

	// 説明文は Slim SEO のメタディスクリプション → 抜粋 の順で採用する
	$meta        = get_post_meta( $post_id, 'slim_seo', true );
	$description = is_array( $meta ) && ! empty( $meta['description'] ) ? $meta['description'] : get_the_excerpt( $post_id );

	$data = [
		'@context'            => 'https://schema.org',
		'@type'               => 'DigitalDocument',
		'@id'                 => $url . '#document',
		'name'                => get_the_title( $post_id ),
		'url'                 => $url,
		'inLanguage'          => 'ja',
		'datePublished'       => get_the_date( DATE_W3C, $post_id ),
		'dateModified'        => get_the_modified_date( DATE_W3C, $post_id ),
		'publisher'           => [ '@id' => WILL_SD_ORG_ID ],
		'isAccessibleForFree' => true,
		'offers'              => [
			'@type'         => 'Offer',
			'price'         => '0',
			'priceCurrency' => 'JPY',
			'availability'  => 'https://schema.org/InStock',
			'url'           => $url,
		],
	];
	if ( $description ) {
		$data['description'] = wp_strip_all_tags( $description );
	}
	$thumb = get_the_post_thumbnail_url( $post_id, 'full' );
	if ( $thumb ) {
		$data['image'] = $thumb;
	}

	will_sd_print( $data );
	return true;
}

/**
 * ページ種別に応じて出力を振り分ける
 */
function will_sd_output() {
	if ( is_singular( 'ebooks' ) ) {
		will_sd_ebook();
		return;
	}
	if ( ! is_page() ) {
		return;
	}
	will_sd_service() || will_sd_service_list();
}
add_action( 'wp_head', 'will_sd_output', 20 );
