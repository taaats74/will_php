<?php
/**
 * 構造化データ（JSON-LD）
 *
 * 1ページにつき1つの @graph を出力する。ノード同士は @id で参照し、
 * 同じ実体を2回書かない。
 *
 *   WebSite ─ publisher → Organization ─ founder → Person
 *   WebPage（AboutPage / ContactPage / CollectionPage / +FAQPage）
 *     ├ isPartOf → WebSite
 *     ├ breadcrumb → BreadcrumbList
 *     ├ primaryImageOfPage → ImageObject
 *     └ mainEntity / about → Service / DigitalDocument / ItemList / Question[]
 *
 * 会社・代表者の詳細はトップと About にだけ出し、他のページは @id で参照する。
 *
 * ページの内容から作るもの（手作業での同期は不要）
 *   - FAQ   … 表示中のHTMLから抽出する（<details> 形式／アコーディオン形式）
 *   - 料金  … inc/seo/config.php の金額が、表示中のページに書かれているときだけ出力する
 *   - 一覧  … サービス一覧は子ページ、資料一覧は表示中の投稿から作る
 * そのため、ページの描画が終わってから組み立てて <head> に差し込む。
 *
 * noindex のページには出力しない。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

const WILL_SEO_SCHEMA_MARKER = '<!--will-seo:schema-->';

/* ---------- 出力の仕組み ---------- */

// ページ全体をバッファし、描画後に構造化データを差し込む
add_action( 'template_redirect', function () {
	if ( is_feed() || is_robots() || is_embed() || is_trackback() || get_query_var( 'sitemap' ) || is_admin() || wp_doing_ajax() ) {
		return;
	}
	ob_start( 'will_seo_schema_inject' );
}, 999 );

// wp_head の時点で位置だけ確保し、ページの状態（noindex 等）を確定しておく
add_action( 'wp_head', function () {
	if ( will_seo_is_noindex() ) {
		return;
	}
	will_seo_schema_state( will_seo_schema_prepare() );
	echo "\n" . WILL_SEO_SCHEMA_MARKER . "\n";
}, 20 );

/**
 * wp_head 時点の情報を保持する
 */
function will_seo_schema_state( $set = null ) {
	static $state = null;
	if ( null !== $set ) {
		$state = $set;
	}
	return $state;
}

/**
 * バッファの出力時に呼ばれる。印の位置に JSON-LD を差し込む
 */
function will_seo_schema_inject( $html ) {
	$pos = strpos( $html, WILL_SEO_SCHEMA_MARKER );
	if ( false === $pos ) {
		return $html;
	}
	$json = '';
	try {
		$state = will_seo_schema_state();
		if ( $state ) {
			$graph = will_seo_schema_build( $state, $html );
			$json  = '<script type="application/ld+json">' . wp_json_encode(
				[
					'@context' => 'https://schema.org',
					'@graph'   => $graph,
				],
				JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
			) . '</script>';
		}
	} catch ( Throwable $e ) {
		$json = '';
	}
	return substr_replace( $html, $json, $pos, strlen( WILL_SEO_SCHEMA_MARKER ) );
}

/* ---------- wp_head 時点での準備 ---------- */

/**
 * クエリに依存する値はテンプレートのループで変わる前に確定させる
 */
function will_seo_schema_prepare() {
	$object_id = will_seo_object_id();
	$post      = is_singular() ? get_queried_object() : null;
	$template  = $object_id ? get_page_template_slug( $object_id ) : '';

	$state = [
		'url'         => will_seo_canonical_url() ?: home_url( '/' ),
		'title'       => wp_get_document_title(),
		'description' => will_seo_description(),
		'image'       => will_seo_image(),
		'breadcrumb'  => will_seo_breadcrumb_items(),
		'is_front'    => is_front_page(),
		'template'    => $template,
		'post_id'     => $post ? $post->ID : 0,
		'post_type'   => $post ? $post->post_type : '',
		'published'   => $post ? get_post_time( 'c', false, $post ) : '',
		'modified'    => $post ? wp_date( 'c', will_seo_modified_timestamp( $post->ID ) ) : '',
		'is_archive'  => is_post_type_archive() || is_tax() || is_category() || is_tag() || is_home(),
		'list'        => [],
	];

	// 一覧ページ：表示中の投稿
	if ( $state['is_archive'] ) {
		global $wp_query;
		foreach ( $wp_query->posts as $item ) {
			$state['list'][] = [ get_the_title( $item ), get_permalink( $item ) ];
		}
	}
	// サービス一覧：子ページを、サービス定義（config.php）の順に並べる
	if ( 'page-service.php' === $template ) {
		$services = will_seo_services();
		$order    = array_flip( array_keys( $services ) );
		$children = get_pages( [ 'parent' => $object_id, 'post_status' => 'publish' ] );
		usort( $children, function ( $a, $b ) use ( $order ) {
			return ( $order[ get_page_template_slug( $a ) ] ?? PHP_INT_MAX ) <=> ( $order[ get_page_template_slug( $b ) ] ?? PHP_INT_MAX );
		} );
		foreach ( $children as $child ) {
			$state['list'][] = [
				$services[ get_page_template_slug( $child ) ]['name'] ?? get_the_title( $child ),
				get_permalink( $child ),
			];
		}
	}
	return $state;
}

/* ---------- @graph の組み立て ---------- */

function will_seo_schema_build( array $s, $html ) {
	$home      = home_url( '/' );
	$org       = will_seo_organization();
	$org_ref   = [ '@id' => $org['@id'] ];
	$url       = $s['url'];
	$page_id   = $url . '#webpage';
	$template  = $s['template'];
	$services  = will_seo_services();
	$is_about  = 0 === strpos( $template, 'page-about' );
	$show_full = $s['is_front'] || $is_about;
	$graph     = [];

	// WebSite
	$graph[] = [
		'@type'       => 'WebSite',
		'@id'         => $home . '#website',
		'url'         => $home,
		'name'        => get_bloginfo( 'name' ),
		'description' => get_bloginfo( 'description' ),
		'inLanguage'  => 'ja',
		'publisher'   => $org_ref,
	];

	// Organization / Person
	if ( $show_full ) {
		$people           = will_seo_people();
		$org['founder']   = array_map( function ( $p ) {
			return [ '@id' => $p['@id'] ];
		}, $people );
		$graph[]          = $org;
		foreach ( $people as $person ) {
			$person['worksFor'] = $org_ref;
			$graph[]            = $person;
		}
	} else {
		$graph[] = array_intersect_key( $org, array_flip( [ '@type', '@id', 'name', 'url', 'logo' ] ) );
	}

	// WebPage
	$types = [ 'WebPage' ];
	if ( $is_about ) {
		$types = [ 'AboutPage' ];
	} elseif ( 'page-contact.php' === $template ) {
		$types = [ 'ContactPage' ];
	} elseif ( $s['is_archive'] || 'page-service.php' === $template || 'page-works.php' === $template ) {
		$types = [ 'CollectionPage' ];
	}

	$page = [
		'@id'        => $page_id,
		'url'        => $url,
		'name'       => $s['title'],
		'inLanguage' => 'ja',
		'isPartOf'   => [ '@id' => $home . '#website' ],
	];
	if ( $s['description'] ) {
		$page['description'] = $s['description'];
	}
	if ( $s['published'] ) {
		$page['datePublished'] = $s['published'];
		$page['dateModified']  = $s['modified'];
	}
	if ( $s['is_front'] || $is_about ) {
		$page['about'] = $org_ref;
	}
	if ( $is_about ) {
		$page['mainEntity'] = $org_ref;
	}

	// 代表画像
	if ( $s['image']['url'] ) {
		$image = [
			'@type'      => 'ImageObject',
			'@id'        => $url . '#primaryimage',
			'url'        => $s['image']['url'],
			'contentUrl' => $s['image']['url'],
		];
		if ( $s['image']['width'] ) {
			$image['width']  = $s['image']['width'];
			$image['height'] = $s['image']['height'];
		}
		if ( $s['image']['alt'] ) {
			$image['caption'] = $s['image']['alt'];
		}
		$graph[]                    = $image;
		$page['primaryImageOfPage'] = [ '@id' => $image['@id'] ];
	}

	// パンくず
	if ( $s['breadcrumb'] ) {
		$elements = [];
		foreach ( $s['breadcrumb'] as $i => $crumb ) {
			$elements[] = [
				'@type'    => 'ListItem',
				'position' => $i + 1,
				'name'     => wp_strip_all_tags( $crumb[0] ),
				'item'     => $crumb[1],
			];
		}
		$graph[]            = [
			'@type'           => 'BreadcrumbList',
			'@id'             => $url . '#breadcrumb',
			'itemListElement' => $elements,
		];
		$page['breadcrumb'] = [ '@id' => $url . '#breadcrumb' ];
	}

	// ページの主題
	$main = null;
	if ( isset( $services[ $template ] ) ) {
		$main = will_seo_schema_service( $services[ $template ], $s, $org_ref, $html );
	} elseif ( 'ebooks' === $s['post_type'] ) {
		$main = will_seo_schema_document( $s, $org_ref );
	} elseif ( $s['list'] ) {
		$main = will_seo_schema_item_list( $s );
	}
	if ( $main ) {
		$graph[]            = $main;
		$page['mainEntity'] = [ '@id' => $main['@id'] ];
	}

	// FAQ（ページに表示されている Q&A）
	$faq = will_seo_extract_faq( $html );
	if ( $faq ) {
		$types[] = 'FAQPage';
		// FAQPage の mainEntity は質問の配列。ページの主題は about に移す
		if ( isset( $page['mainEntity'] ) && ! $is_about ) {
			$page['about'] = $page['mainEntity'];
		}
		$page['mainEntity'] = array_map( function ( $qa ) {
			return [
				'@type'          => 'Question',
				'name'           => $qa[0],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => $qa[1],
				],
			];
		}, $faq );
	}

	$page = array_merge( [ '@type' => 1 === count( $types ) ? $types[0] : $types ], $page );
	array_splice( $graph, 2, 0, [ $page ] );

	return $graph;
}

/**
 * Service（料金は表示と一致した場合のみ）
 */
function will_seo_schema_service( array $def, array $s, array $org_ref, $html ) {
	$service = [
		'@type'       => 'Service',
		'@id'         => $s['url'] . '#service',
		'name'        => $def['name'],
		'serviceType' => $def['serviceType'],
		'url'         => $s['url'],
		'provider'    => $org_ref,
		'areaServed'  => [
			'@type' => 'Country',
			'name'  => '日本',
		],
		'audience'    => [
			'@type'        => 'BusinessAudience',
			'audienceType' => 'BtoB中小企業',
		],
	];
	if ( $s['description'] ) {
		$service['description'] = $s['description'];
	}

	if ( ! empty( $def['plans'] ) ) {
		$text     = will_seo_page_text( $html );
		$problems = will_seo_verify_prices( $def['plans'], $text );
		if ( $problems ) {
			will_seo_report_price_mismatch( $def['name'], $problems );
		} else {
			will_seo_clear_price_mismatch( $def['name'] );
			$service['offers'] = array_map( function ( $plan ) use ( $s ) {
				return will_seo_build_offer( $plan, $s['url'] );
			}, $def['plans'] );
		}
	}
	return $service;
}

/**
 * DigitalDocument（無料ダウンロード資料）
 */
function will_seo_schema_document( array $s, array $org_ref ) {
	$doc = [
		'@type'               => 'DigitalDocument',
		'@id'                 => $s['url'] . '#document',
		'name'                => get_the_title( $s['post_id'] ),
		'url'                 => $s['url'],
		'inLanguage'          => 'ja',
		'datePublished'       => $s['published'],
		'dateModified'        => $s['modified'],
		'publisher'           => $org_ref,
		'isAccessibleForFree' => true,
		'image'               => [ '@id' => $s['url'] . '#primaryimage' ],
		'offers'              => [
			'@type'         => 'Offer',
			'price'         => '0',
			'priceCurrency' => 'JPY',
			'availability'  => 'https://schema.org/InStock',
			'url'           => $s['url'],
		],
	];
	if ( $s['description'] ) {
		$doc['description'] = $s['description'];
	}
	return $doc;
}

/**
 * ItemList（一覧ページ）
 */
function will_seo_schema_item_list( array $s ) {
	$elements = [];
	foreach ( $s['list'] as $i => $item ) {
		$elements[] = [
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'name'     => wp_strip_all_tags( $item[0] ),
			'url'      => $item[1],
		];
	}
	return [
		'@type'           => 'ItemList',
		'@id'             => $s['url'] . '#itemlist',
		'numberOfItems'   => count( $elements ),
		'itemListElement' => $elements,
	];
}

/* ---------- FAQ の抽出 ---------- */

/**
 * 表示中のHTMLから Q&A を取り出す。
 *
 * 対応する形式
 *   A. <details><summary>質問</summary>回答</details>（LP）
 *   B. .accordion 内の <* class="question">質問</*><* class="answer">回答</*>（サービスページ）
 *
 * ヘッダー・ナビ・フッター内の <details>（メニュー）は対象外。
 * 「Q」「A」のバッジ・開閉アイコンは本文に含めず、「Q1.」のような連番も外す。
 *
 * @return array<int, array{0:string,1:string}>
 */
function will_seo_extract_faq( $html ) {
	if ( false === stripos( $html, '<details' ) && false === stripos( $html, 'question' ) ) {
		return [];
	}
	$dom = will_seo_dom( $html );
	if ( ! $dom ) {
		return [];
	}
	$class = function ( $name ) {
		return "contains(concat(' ', normalize-space(@class), ' '), ' $name ')";
	};
	$xpath   = new DOMXPath( $dom );
	$outside = "not(ancestor-or-self::*[contains(@class, 'menu')]) and not(ancestor::header) and not(ancestor::nav) and not(ancestor::footer)";
	$faq     = [];

	foreach ( $xpath->query( "//details[summary][$outside]" ) as $details ) {
		$question = '';
		$answer   = [];
		foreach ( $details->childNodes as $child ) {
			if ( $child instanceof DOMElement && 'summary' === strtolower( $child->tagName ) ) {
				$question = will_seo_node_text( $child );
			} else {
				$answer[] = will_seo_node_text( $child );
			}
		}
		$faq[] = [ $question, implode( "\n", $answer ) ];
	}

	foreach ( $xpath->query( '//*[' . $class( 'accordion' ) . ']//*[' . $class( 'question' ) . "][$outside]" ) as $q ) {
		$a = $xpath->query( 'following-sibling::*[' . $class( 'answer' ) . '][1]', $q )->item( 0 );
		if ( $a ) {
			$faq[] = [ will_seo_node_text( $q ), will_seo_node_text( $a ) ];
		}
	}

	$result = [];
	foreach ( $faq as $pair ) {
		$question = trim( preg_replace( '/^Q\d*\s*[.．、:：]?\s*/u', '', will_seo_clean_text( $pair[0] ) ) );
		$answer   = will_seo_clean_text( $pair[1] );
		if ( '' !== $question && '' !== $answer && ! isset( $result[ $question ] ) ) {
			$result[ $question ] = [ $question, $answer ];
		}
	}
	return array_values( $result );
}

/**
 * HTML を DOM にする（同じリクエスト内では1回だけ解析する）
 */
function will_seo_dom( $html ) {
	static $cache = [];
	$key = md5( $html );
	if ( ! isset( $cache[ $key ] ) ) {
		$dom      = new DOMDocument();
		$previous = libxml_use_internal_errors( true );
		$loaded   = $dom->loadHTML( '<?xml encoding="UTF-8">' . $html, LIBXML_NOWARNING | LIBXML_NOERROR | LIBXML_COMPACT );
		libxml_clear_errors();
		libxml_use_internal_errors( $previous );
		$cache[ $key ] = $loaded ? $dom : false;
	}
	return $cache[ $key ];
}

/**
 * 要素のテキスト。装飾（バッジ・アイコン・非表示要素）と表は除き、段落・項目は改行で区切る
 */
function will_seo_node_text( DOMNode $node ) {
	if ( $node instanceof DOMText ) {
		return $node->nodeValue;
	}
	if ( ! $node instanceof DOMElement ) {
		return '';
	}
	$tag = strtolower( $node->tagName );
	if ( in_array( $tag, [ 'script', 'style', 'svg', 'i', 'button', 'table', 'img', 'template', 'noscript' ], true ) ) {
		return '';
	}
	if ( 'true' === $node->getAttribute( 'aria-hidden' )
		|| preg_match( '/(^|\s)(list-icon|faq-q|faq-mark|icon)(\s|$)/', $node->getAttribute( 'class' ) ) ) {
		return '';
	}
	if ( 'br' === $tag ) {
		return "\n";
	}
	$text = '';
	foreach ( $node->childNodes as $child ) {
		$text .= will_seo_node_text( $child );
	}
	if ( 'li' === $tag ) {
		return "\n・" . trim( $text ) . "\n";
	}
	if ( in_array( $tag, [ 'p', 'div', 'ul', 'ol', 'dl', 'dt', 'dd', 'h2', 'h3', 'h4', 'h5', 'section' ], true ) ) {
		return "\n" . $text . "\n";
	}
	return $text;
}

/**
 * 空白の整理。行ごとに詰め、日本語の前後に入った改行由来の空白は取り除く
 */
function will_seo_clean_text( $text ) {
	$lines = [];
	foreach ( preg_split( '/\n+/u', html_entity_decode( $text, ENT_QUOTES, 'UTF-8' ) ) as $line ) {
		$line = trim( preg_replace( '/[ \t\r\x{00A0}\x{3000}]+/u', ' ', $line ) );
		$line = preg_replace( '/(?<=[^\x00-\x7F]) | (?=[^\x00-\x7F])/u', '', $line );
		if ( '' !== $line ) {
			$lines[] = $line;
		}
	}
	return implode( "\n", $lines );
}

/* ---------- 料金の照合 ---------- */

/**
 * 本文のテキスト（空白なし）。<head> 内の description 等に書かれた金額では一致させない
 */
function will_seo_page_text( $html ) {
	$start = stripos( $html, '<body' );
	$body  = false === $start ? $html : substr( $html, $start );
	$body  = preg_replace( '#<(script|style|noscript|template)\b[^>]*>.*?</\1>#is', '', $body );
	return preg_replace( '/\s+/u', '', html_entity_decode( wp_strip_all_tags( $body ), ENT_QUOTES, 'UTF-8' ) );
}

/**
 * 金額がページ上に書かれているか。「30,000」「30000」「3万」のいずれでも一致とみなす
 */
function will_seo_amount_on_page( $amount, $text ) {
	$amount = (int) $amount;
	if ( $amount <= 0 ) {
		return true; // 無料プランは金額表記を持たない
	}
	$variants = [ number_format( $amount ), (string) $amount ];
	if ( 0 === $amount % 10000 ) {
		$variants[] = number_format( $amount / 10000 ) . '万';
	}
	foreach ( $variants as $variant ) {
		if ( false !== strpos( $text, $variant ) ) {
			return true;
		}
	}
	return false;
}

/**
 * @return string[] 不一致の内容（空なら一致）
 */
function will_seo_verify_prices( array $plans, $text ) {
	$problems = [];
	foreach ( $plans as $plan ) {
		if ( false === strpos( $text, preg_replace( '/\s+/u', '', $plan['name'] ) ) ) {
			$problems[] = sprintf( 'プラン「%s」がページ上に見つかりません', $plan['name'] );
		}
		if ( ! will_seo_amount_on_page( $plan['monthly'], $text ) ) {
			$problems[] = sprintf( '「%s」の月額 %s円 がページ上に見つかりません', $plan['name'], number_format( $plan['monthly'] ) );
		}
		if ( ! empty( $plan['setup'] ) && ! will_seo_amount_on_page( $plan['setup'], $text ) ) {
			$problems[] = sprintf( '「%s」の初期費用 %s円 がページ上に見つかりません', $plan['name'], number_format( $plan['setup'] ) );
		}
	}
	return $problems;
}

function will_seo_build_offer( array $plan, $url ) {
	$offer = [
		'@type'        => 'Offer',
		'@id'          => $url . '#offer-' . $plan['id'],
		'name'         => $plan['name'],
		'url'          => $url,
		'availability' => 'https://schema.org/InStock',
	];

	if ( empty( $plan['monthly'] ) ) {
		$offer['price']         = '0';
		$offer['priceCurrency'] = 'JPY';
		return $offer;
	}

	// 月額であることを referenceQuantity(unitCode=MON) で明示する
	$offer['priceSpecification'] = [
		'@type'                 => 'UnitPriceSpecification',
		'price'                 => $plan['monthly'],
		'priceCurrency'         => 'JPY',
		'valueAddedTaxIncluded' => false,
		'unitText'              => '月額',
		'referenceQuantity'     => [
			'@type'    => 'QuantitativeValue',
			'value'    => 1,
			'unitCode' => 'MON',
		],
	];
	if ( ! empty( $plan['setup'] ) ) {
		$offer['addOn'] = [
			'@type'              => 'Offer',
			'name'               => '初期費用',
			'priceSpecification' => [
				'@type'                 => 'PriceSpecification',
				'price'                 => $plan['setup'],
				'priceCurrency'         => 'JPY',
				'valueAddedTaxIncluded' => false,
			],
		];
	}
	return $offer;
}

/* ---------- 料金不一致の通知 ---------- */

function will_seo_report_price_mismatch( $name, array $problems ) {
	$stored          = get_transient( 'will_seo_price_mismatch' );
	$stored          = is_array( $stored ) ? $stored : [];
	$stored[ $name ] = $problems;
	set_transient( 'will_seo_price_mismatch', $stored, WEEK_IN_SECONDS );
}

function will_seo_clear_price_mismatch( $name ) {
	$stored = get_transient( 'will_seo_price_mismatch' );
	if ( is_array( $stored ) && isset( $stored[ $name ] ) ) {
		unset( $stored[ $name ] );
		set_transient( 'will_seo_price_mismatch', $stored, WEEK_IN_SECONDS );
	}
}

add_action( 'admin_notices', function () {
	$stored = get_transient( 'will_seo_price_mismatch' );
	if ( ! is_array( $stored ) || ! $stored ) {
		return;
	}
	echo '<div class="notice notice-warning"><p><strong>構造化データ：料金の設定がページの表示と一致していません。</strong><br>';
	echo '一致するまで料金（Offer）の出力を停止しています。<code>inc/seo/config.php</code> の <code>will_seo_services()</code> を修正してください。</p><ul style="list-style:disc;padding-left:1.5em">';
	foreach ( $stored as $name => $problems ) {
		foreach ( $problems as $problem ) {
			echo '<li>' . esc_html( $name . '：' . $problem ) . '</li>';
		}
	}
	echo '</ul></div>';
} );
