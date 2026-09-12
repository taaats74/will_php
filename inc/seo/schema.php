<?php
/**
 * 構造化データ（JSON-LD）
 *
 * 表示中のページの内容（inc/seo/extract.php の解析結果）から自動で組み立てる。
 * テンプレートやページごとの設定は持たない。ページの記載を直せば構造化データも追従する。
 *
 * 1ページにつき1つの @graph を出力し、ノード同士は @id で参照する（同じ実体を2回書かない）。
 *
 *   WebSite ─ publisher → Organization ─ founder → Person
 *   WebPage（AboutPage / ContactPage / CollectionPage / +FAQPage）
 *     ├ isPartOf → WebSite / breadcrumb → BreadcrumbList / primaryImageOfPage → ImageObject
 *     ├ mainEntity … ページの主題
 *     │    料金表 1つ or 流れ → Service（offers）   料金表が複数 → OfferCatalog
 *     │    資料 → DigitalDocument   会社概要 → Organization   子ページ・一覧 → ItemList
 *     │    FAQ があるときは Question[]（主題は about へ）
 *     └ hasPart … 流れ（HowTo）・制作実績（ItemList）・記事（ItemList）・動画（VideoObject）
 *
 * 会社・代表者の詳細は、会社概要を載せたページ（About）とトップにだけ出し、他のページは @id で参照する。
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

// wp_head の時点で位置を確保し、クエリに依存する値を確定しておく
add_action( 'wp_head', function () {
	if ( will_seo_is_noindex() ) {
		return;
	}
	will_seo_schema_state( will_seo_schema_prepare() );
	echo "\n" . WILL_SEO_SCHEMA_MARKER . "\n";
}, 20 );

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
			$json = '<script type="application/ld+json">' . wp_json_encode(
				[
					'@context' => 'https://schema.org',
					'@graph'   => will_seo_schema_build( $state, $html ),
				],
				JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
			) . '</script>';
		}
	} catch ( Throwable $e ) {
		$json = ''; // 構造化データの失敗でページの表示を壊さない
	}
	return substr_replace( $html, $json, $pos, strlen( WILL_SEO_SCHEMA_MARKER ) );
}

/**
 * wp_head 時点の値（テンプレートのループでクエリが変わる前に確定させる）
 */
function will_seo_schema_prepare() {
	$post = is_singular() ? get_queried_object() : null;

	$state = [
		'url'         => will_seo_canonical_url() ?: home_url( '/' ),
		'title'       => wp_get_document_title(),
		'description' => will_seo_description(),
		'image'       => will_seo_image(),
		'breadcrumb'  => will_seo_breadcrumb_items(),
		'is_front'    => is_front_page(),
		'is_archive'  => is_post_type_archive() || is_tax() || is_category() || is_tag() || is_home(),
		'post_type'   => $post ? $post->post_type : '',
		'post_title'  => $post ? get_the_title( $post ) : '',
		'published'   => $post ? get_post_time( 'c', false, $post ) : '',
		'modified'    => $post ? wp_date( 'c', will_seo_modified_timestamp( $post->ID ) ) : '',
		'pages'       => (int) ( $post ? get_post_meta( $post->ID, 'dl_page_count', true ) : 0 ),
		'list'        => [],
	];

	// 一覧：表示中の投稿
	if ( $state['is_archive'] ) {
		global $wp_query;
		foreach ( $wp_query->posts as $item ) {
			$state['list'][] = [ will_seo_short_title( get_the_title( $item ) ), get_permalink( $item ) ];
		}
	}
	// 子ページを持つ固定ページ（例：サービス一覧）：子ページの一覧
	if ( $post && 'page' === $post->post_type && ! $state['is_front'] ) {
		$children = array_filter(
			get_pages( [ 'parent' => $post->ID, 'post_status' => 'publish', 'sort_column' => 'menu_order,post_title' ] ),
			function ( $child ) {
				return will_seo_post_is_listable( $child->ID );
			}
		);
		if ( count( $children ) >= 2 ) {
			foreach ( $children as $child ) {
				$state['list'][] = [ will_seo_short_title( get_the_title( $child ) ), get_permalink( $child ) ];
			}
		}
	}
	return $state;
}

/**
 * 「Webサイト制作｜BtoB中小企業の…｜福岡」→「Webサイト制作」
 */
function will_seo_short_title( $title ) {
	return trim( preg_split( '/[｜|]/u', wp_strip_all_tags( $title ) )[0] );
}

/* ---------- @graph の組み立て ---------- */

function will_seo_schema_build( array $s, $html ) {
	$a       = will_seo_analyze( $html );
	$facts   = will_seo_update_facts( $a, $s );
	$home    = home_url( '/' );
	$url     = $s['url'];
	$org_ref = [ '@id' => $home . '#organization' ];

	$is_about   = (bool) $a['company'];
	$is_contact = $a['has_form'] && preg_match( '/お問い合わせ|問合せ|contact/iu', $a['h1'] );
	$show_full  = $s['is_front'] || $is_about;

	$graph = [
		[
			'@type'       => 'WebSite',
			'@id'         => $home . '#website',
			'url'         => $home,
			'name'        => get_bloginfo( 'name' ),
			'description' => get_bloginfo( 'description' ),
			'inLanguage'  => 'ja',
			'publisher'   => $org_ref,
		],
		will_seo_organization_node( $show_full ),
	];

	// 人物：ページに載っている人物に加え、会社情報を出すページでは代表者も（founder の参照先）
	$people = [];
	foreach ( $a['people'] as $person ) {
		$people[ $person['name'] ] = $person;
	}
	if ( $show_full ) {
		foreach ( $facts['company']['founders'] ?? [] as $name ) {
			$people += [ $name => [ 'name' => $name ] ];
		}
	}
	foreach ( $people as $person ) {
		$graph[] = will_seo_person_node( $person, $org_ref );
	}

	// WebPage
	$types = [ 'WebPage' ];
	if ( $is_about ) {
		$types = [ 'AboutPage' ];
	} elseif ( $is_contact ) {
		$types = [ 'ContactPage' ];
	}

	$page = [
		'@id'        => $url . '#webpage',
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
	if ( $show_full ) {
		$page['about'] = $org_ref;
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

	// 制作実績・記事の一覧
	$works = $a['works'] ? will_seo_works_node( $a['works'], $url, $org_ref ) : null;
	$posts = $a['posts'] ? will_seo_posts_node( $a['posts'], $url, $org_ref ) : null;

	// ページの主題
	$main = null;
	if ( 'ebooks' === $s['post_type'] ) {
		$main = will_seo_document_node( $s, $a, $org_ref );
	} elseif ( $is_about ) {
		$page['mainEntity'] = $org_ref;
	} elseif ( count( $a['offers'] ) >= 2 ) {
		$main = will_seo_catalog_node( $a['offers'], $s, $org_ref );
	} elseif ( ! $s['is_front'] && ! $is_contact && ( $a['offers'] || $a['steps'] ) && 'page' === $s['post_type'] ) {
		$main = will_seo_service_node( $s, $a, $org_ref );
	} elseif ( $s['list'] ) {
		$types = [ 'CollectionPage' ];
		$main  = will_seo_item_list_node( $s['list'], $url . '#itemlist' );
	} elseif ( $works && preg_match( '/実績|事例|WORKS/iu', $a['h1'] ) ) {
		$types = [ 'CollectionPage' ];
		$main  = $works;
		$works = null;
	}
	if ( $s['is_archive'] ) {
		$types = [ 'CollectionPage' ];
	}
	if ( $main ) {
		$graph[]            = $main;
		$page['mainEntity'] = [ '@id' => $main['@id'] ];
	}
	will_seo_record_page_kind( $url, $main ? $main['@type'] : '' );

	// ページの一部
	$parts = [];
	foreach ( $a['steps'] as $i => $group ) {
		$parts[] = will_seo_howto_node( $group, $url . '#howto' . ( $i ? '-' . ( $i + 1 ) : '' ) );
	}
	foreach ( [ $works, $posts ] as $node ) {
		if ( $node ) {
			$parts[] = $node;
		}
	}
	foreach ( $a['videos'] as $video_id ) {
		$video = will_seo_video_node( $video_id );
		if ( $video ) {
			$parts[] = $video;
		}
	}
	foreach ( $parts as $part ) {
		$graph[]           = $part;
		$page['hasPart'][] = [ '@id' => $part['@id'] ];
	}

	// FAQ（ページに表示されている Q&A）
	if ( $a['faq'] ) {
		$types[] = 'FAQPage';
		if ( isset( $page['mainEntity'] ) && ! $is_about ) {
			$page['about'] = $page['mainEntity']; // FAQPage の mainEntity は質問の配列
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
		}, $a['faq'] );
	}

	// 料金表を読み取れなかった箇所は管理画面に知らせる
	will_seo_report_price_problems( $url, $a['problems'] );

	$page = array_merge( [ '@type' => 1 === count( $types ) ? $types[0] : $types ], $page );
	array_splice( $graph, 2, 0, [ $page ] );
	return $graph;
}

/* ---------- 各ノード ---------- */

function will_seo_person_node( array $person, array $org_ref ) {
	$node = [
		'@type' => 'Person',
		'@id'   => will_seo_person_id( $person['name'] ),
		'name'  => $person['name'],
	];
	foreach ( [ 'jobTitle', 'description', 'image' ] as $key ) {
		if ( ! empty( $person[ $key ] ) ) {
			$node[ $key ] = $person[ $key ];
		}
	}
	$node['worksFor'] = $org_ref;
	return $node;
}

/**
 * Service。料金はページの料金表から読み取ったもの
 */
function will_seo_service_node( array $s, array $a, array $org_ref ) {
	$name    = $a['service']['name'] ?: will_seo_short_title( $s['post_title'] );
	$service = [
		'@type'    => 'Service',
		'@id'      => $s['url'] . '#service',
		'name'     => $name,
		'url'      => $s['url'],
		'provider' => $org_ref,
	];
	if ( $a['service']['type'] ) {
		$service['serviceType'] = $a['service']['type'];
	}
	if ( $s['description'] ) {
		$service['description'] = $s['description'];
	}
	if ( false !== mb_strpos( $a['text'], '全国' ) ) {
		$service['areaServed'] = [
			'@type' => 'Country',
			'name'  => '日本',
		];
	}
	if ( $a['offers'] ) {
		$service['offers'] = will_seo_offer_nodes( $a['offers'][0]['offers'], $s['url'], 'offer' );
	} elseif ( false !== mb_strpos( $a['h1'], '無料' ) ) {
		// 料金表が無く、無料をうたうサービス（例：無料相談）
		$service['offers'] = [
			[
				'@type'         => 'Offer',
				'@id'           => $s['url'] . '#offer-free',
				'name'          => $name,
				'url'           => $s['url'],
				'price'         => '0',
				'priceCurrency' => 'JPY',
				'availability'  => 'https://schema.org/InStock',
			],
		];
	}
	return $service;
}

/**
 * OfferCatalog（料金ページのように、複数サービスの料金表が並ぶページ）
 */
function will_seo_catalog_node( array $groups, array $s, array $org_ref ) {
	$catalogs = [];
	foreach ( $groups as $i => $group ) {
		$offers = will_seo_offer_nodes( $group['offers'], $s['url'], 'offer-' . ( $i + 1 ) );
		foreach ( $offers as &$offer ) {
			$offer['offeredBy'] = $org_ref;
		}
		unset( $offer );
		$catalogs[] = [
			'@type'           => 'OfferCatalog',
			'name'            => $group['name'],
			'itemListElement' => $offers,
		];
	}
	return [
		'@type'           => 'OfferCatalog',
		'@id'             => $s['url'] . '#offercatalog',
		'name'            => will_seo_short_title( $s['post_title'] ),
		'itemListElement' => $catalogs,
	];
}

/**
 * 読み取った料金を Offer にする
 */
function will_seo_offer_nodes( array $plans, $url, $id_prefix ) {
	$offers = [];
	foreach ( $plans as $i => $plan ) {
		$spec = [
			'@type'         => $plan['unit'] ? 'UnitPriceSpecification' : 'PriceSpecification',
			( $plan['min'] ? 'minPrice' : 'price' ) => $plan['amount'],
			'priceCurrency' => 'JPY',
		];
		if ( null !== $plan['tax'] ) {
			$spec['valueAddedTaxIncluded'] = $plan['tax'];
		}
		if ( '月' === $plan['unit'] ) {
			// 月額であることを referenceQuantity(unitCode=MON) で明示する（price だけだと一回払いと解釈される）
			$spec['unitText']          = '月額';
			$spec['referenceQuantity'] = [
				'@type'    => 'QuantitativeValue',
				'value'    => 1,
				'unitCode' => 'MON',
			];
		} elseif ( $plan['unit'] ) {
			$spec['unitText'] = preg_match( '/^\d/', $plan['unit'] ) ? $plan['unit'] : '1' . $plan['unit'];
		}

		$offer = [
			'@type'              => 'Offer',
			'@id'                => $url . '#' . $id_prefix . '-' . ( $i + 1 ),
			'name'               => $plan['name'],
			'url'                => $url,
			'priceSpecification' => $spec,
		];
		if ( $plan['setup'] ) {
			$setup = [
				'@type'         => 'PriceSpecification',
				'price'         => $plan['setup'],
				'priceCurrency' => 'JPY',
			];
			if ( null !== $plan['tax'] ) {
				$setup['valueAddedTaxIncluded'] = $plan['tax'];
			}
			$offer['addOn'] = [
				'@type'              => 'Offer',
				'name'               => '初期費用',
				'priceSpecification' => $setup,
			];
		}
		$offers[] = $offer;
	}
	return $offers;
}

/**
 * DigitalDocument（ダウンロード資料）。目次・対象者・わかることはページの記載から
 */
function will_seo_document_node( array $s, array $a, array $org_ref ) {
	$doc = [
		'@type'         => 'DigitalDocument',
		'@id'           => $s['url'] . '#document',
		'name'          => $s['post_title'],
		'url'           => $s['url'],
		'inLanguage'    => 'ja',
		'datePublished' => $s['published'],
		'dateModified'  => $s['modified'],
		'publisher'     => $org_ref,
		'image'         => [ '@id' => $s['url'] . '#primaryimage' ],
	];
	if ( $s['description'] ) {
		$doc['description'] = $s['description'];
	}
	if ( $s['pages'] ) {
		$doc['numberOfPages'] = $s['pages'];
	}
	if ( $a['audience'] ) {
		$doc['audience'] = [
			'@type'        => 'Audience',
			'audienceType' => implode( '／', $a['audience'] ),
		];
	}
	if ( $a['teaches'] ) {
		$doc['teaches'] = $a['teaches'];
	}
	if ( $a['toc'] ) {
		$doc['hasPart'] = array_map( function ( $chapter, $i ) {
			$part = [
				'@type'    => 'CreativeWork',
				'position' => $i + 1,
				'name'     => trim( $chapter['label'] . ' ' . $chapter['name'] ),
			];
			if ( $chapter['text'] ) {
				$part['description'] = str_replace( "\n", '', $chapter['text'] );
			}
			return $part;
		}, $a['toc'], array_keys( $a['toc'] ) );
	}
	if ( false !== mb_strpos( $a['h1'] . $a['text'], '無料' ) ) {
		$doc['isAccessibleForFree'] = true;
		$doc['offers']              = [
			'@type'         => 'Offer',
			'price'         => '0',
			'priceCurrency' => 'JPY',
			'availability'  => 'https://schema.org/InStock',
			'url'           => $s['url'],
		];
	}
	return $doc;
}

function will_seo_howto_node( array $group, $id ) {
	return [
		'@type' => 'HowTo',
		'@id'   => $id,
		'name'  => $group['name'],
		'step'  => array_map( function ( $step, $i ) {
			$node = [
				'@type'    => 'HowToStep',
				'position' => $i + 1,
				'name'     => $step['name'],
			];
			$text = trim( ( $step['label'] ? $step['label'] . "\n" : '' ) . $step['text'] );
			if ( '' !== $text ) {
				$node['text'] = $text;
			}
			return $node;
		}, $group['steps'], array_keys( $group['steps'] ) ),
	];
}

function will_seo_item_list_node( array $list, $id ) {
	$elements = [];
	foreach ( $list as $i => $item ) {
		$elements[] = [
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'name'     => $item[0],
			'url'      => $item[1],
		];
	}
	return [
		'@type'           => 'ItemList',
		'@id'             => $id,
		'numberOfItems'   => count( $elements ),
		'itemListElement' => $elements,
	];
}

function will_seo_works_node( array $works, $url, array $org_ref ) {
	$elements = [];
	foreach ( $works as $i => $work ) {
		$item = [
			'@type'   => 'CreativeWork',
			'name'    => $work['alt'] ?: $work['name'],
			'creator' => $org_ref,
		];
		if ( $work['url'] ) {
			$item['url'] = $work['url'];
		}
		if ( $work['image'] ) {
			$item['image'] = $work['image'];
		}
		if ( $work['genre'] ) {
			$item['genre'] = $work['genre'];
		}
		$elements[] = [
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'item'     => $item,
		];
	}
	return [
		'@type'           => 'ItemList',
		'@id'             => $url . '#works',
		'name'            => '制作実績',
		'numberOfItems'   => count( $elements ),
		'itemListElement' => $elements,
	];
}

function will_seo_posts_node( array $posts, $url, array $org_ref ) {
	$elements = [];
	foreach ( $posts as $i => $post ) {
		$item = [
			'@type'         => 'BlogPosting',
			'headline'      => $post['name'],
			'url'           => $post['url'],
			'datePublished' => $post['date'],
			'publisher'     => $org_ref,
		];
		if ( $post['image'] ) {
			$item['image'] = $post['image'];
		}
		if ( $post['genre'] ) {
			$item['articleSection'] = $post['genre'];
		}
		$elements[] = [
			'@type'    => 'ListItem',
			'position' => $i + 1,
			'item'     => $item,
		];
	}
	return [
		'@type'           => 'ItemList',
		'@id'             => $url . '#posts',
		'name'            => 'ブログ記事',
		'numberOfItems'   => count( $elements ),
		'itemListElement' => $elements,
	];
}

/**
 * VideoObject。タイトル・公開日は YouTube から取得してキャッシュする（取得できなければ出力しない）
 */
function will_seo_video_node( $video_id ) {
	$key  = 'will_seo_video_' . $video_id;
	$data = get_transient( $key );
	if ( false === $data ) {
		$data  = [];
		$watch = 'https://www.youtube.com/watch?v=' . $video_id;
		$res   = wp_remote_get( 'https://www.youtube.com/oembed?format=json&url=' . rawurlencode( $watch ), [ 'timeout' => 3 ] );
		$json  = is_wp_error( $res ) ? null : json_decode( wp_remote_retrieve_body( $res ), true );
		if ( ! empty( $json['title'] ) ) {
			$data['title'] = $json['title'];
			$page          = wp_remote_get( $watch, [ 'timeout' => 3, 'headers' => [ 'Accept-Language' => 'ja' ] ] );
			$body          = is_wp_error( $page ) ? '' : wp_remote_retrieve_body( $page );
			if ( preg_match( '/itemprop="(?:uploadDate|datePublished)" content="([^"]+)"/', $body, $m ) ) {
				$data['date'] = $m[1];
			}
			if ( preg_match( '/<meta name="description" content="([^"]*)"/', $body, $m ) ) {
				$data['description'] = html_entity_decode( $m[1], ENT_QUOTES, 'UTF-8' );
			}
		}
		set_transient( $key, $data, $data ? 30 * DAY_IN_SECONDS : DAY_IN_SECONDS );
	}
	if ( empty( $data['title'] ) ) {
		return null;
	}
	$video = [
		'@type'        => 'VideoObject',
		'@id'          => 'https://www.youtube.com/watch?v=' . $video_id . '#video',
		'name'         => $data['title'],
		'description'  => $data['description'] ?? $data['title'],
		'thumbnailUrl' => 'https://i.ytimg.com/vi/' . $video_id . '/hqdefault.jpg',
		'embedUrl'     => 'https://www.youtube.com/embed/' . $video_id,
		'contentUrl'   => 'https://www.youtube.com/watch?v=' . $video_id,
	];
	if ( ! empty( $data['date'] ) ) {
		$video['uploadDate'] = $data['date'];
	}
	return $video;
}

/* ---------- 料金表の読み取り失敗の通知 ---------- */

function will_seo_report_price_problems( $url, array $problems ) {
	$stored = get_transient( 'will_seo_price_problems' );
	$stored = is_array( $stored ) ? $stored : [];
	if ( $problems ) {
		$stored[ $url ] = $problems;
	} elseif ( isset( $stored[ $url ] ) ) {
		unset( $stored[ $url ] );
	} else {
		return;
	}
	set_transient( 'will_seo_price_problems', $stored, WEEK_IN_SECONDS );
}

add_action( 'admin_notices', function () {
	$stored = get_transient( 'will_seo_price_problems' );
	if ( ! is_array( $stored ) || ! $stored ) {
		return;
	}
	echo '<div class="notice notice-warning"><p><strong>構造化データ：料金表を読み取れないページがあります。</strong><br>';
	echo 'そのページの料金（Offer）は出力を止めています。プラン名と「〇〇円」の金額が各プランに書かれているか確認してください。</p><ul style="list-style:disc;padding-left:1.5em">';
	foreach ( $stored as $url => $problems ) {
		foreach ( $problems as $problem ) {
			echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $url ) . '</a>：' . esc_html( $problem ) . '</li>';
		}
	}
	echo '</ul></div>';
} );
