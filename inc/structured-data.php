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
 * - LP各ページ       … Service + Offer、FAQPage
 *
 * LP の FAQ はテンプレートの表示マークアップを実行時に解析して生成するため、
 * 文言を直せば構造化データも自動で追従する（同期作業は不要）。
 * 価格だけは設定を正とし、表示と一致しないときは出力を止める。
 * 本番の出力確認は tools/check_lp_schema.py で行う。
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
	// noindex のページには出力しない。LP の公開前フラグ（$..._noindex）も
	// wp_robots フィルター経由で反映されるため、これ1つで判定できる。
	$robots = apply_filters( 'wp_robots', [] );
	if ( ! empty( $robots['noindex'] ) ) {
		return;
	}

	if ( is_singular( 'ebooks' ) ) {
		will_sd_ebook();
		return;
	}
	if ( ! is_page() ) {
		return;
	}
	will_sd_lp() || will_sd_service() || will_sd_service_list();
}
add_action( 'wp_head', 'will_sd_output', 20 );

/* =========================================================================
 * LP（ウィルサポ / ウィルグロー / ウィルサポEC / BtoB無料相談）
 *
 * 設計方針:
 *   FAQ  … テンプレートの表示マークアップ(<details>)を実行時に解析して生成する。
 *           文言を直せば構造化データが自動で追従し、二重管理が発生しない。
 *   価格 … 表示からの抽出は行わない。「月額10万円」のような表記ゆれがあり、
 *           抽出失敗が誤った金額の出力につながるため。設定を正とし、
 *           その金額がページ上に存在するかを毎回照合する。
 *           一致しない場合は Offer を出力せず、管理画面に警告を出す。
 *           （古い価格を出し続けるより、出さないほうが安全）
 * ========================================================================= */

/**
 * LP の定義。plans の金額は税抜。setup は初期費用（0なら出力しない）。
 */
function will_sd_lp_map() {
	return [
		'page-willsupport-v2.php' => [
			'name'        => 'ウィルサポ',
			'serviceType' => 'サブスク型ホームページ制作',
			'description' => 'BtoB企業のための月額制ホームページ制作・運用サービス。構成設計からデザイン・WordPress構築、公開後の更新・改善までを月額費用に含めて継続的に支援する。',
			'plans'       => [
				[ 'id' => 'simple', 'name' => 'シンプル', 'monthly' => 30000, 'setup' => 100000 ],
				[ 'id' => 'standard', 'name' => 'スタンダード', 'monthly' => 40000, 'setup' => 100000 ],
				[ 'id' => 'premium', 'name' => 'プレミアム', 'monthly' => 50000, 'setup' => 100000 ],
			],
		],
		'page-willgrow-v2.php' => [
			'name'        => 'ウィルグロー',
			'serviceType' => 'BtoB特化・月額制のマーケティング支援',
			'description' => 'BtoB特化・月額制のマーケティング支援。マーケティング担当がいなくても、問い合わせと商談が生まれる状態を、設計から運用までまとめて支援する。',
			'plans'       => [
				[ 'id' => 'design', 'name' => '設計プラン', 'monthly' => 100000, 'setup' => 0 ],
				[ 'id' => 'inquiry', 'name' => '問い合わせプラン', 'monthly' => 300000, 'setup' => 0 ],
				[ 'id' => 'meeting', 'name' => '商談プラン', 'monthly' => 500000, 'setup' => 0 ],
			],
		],
		'page-will-support-ec.php' => [
			'name'        => 'ウィルサポEC',
			'serviceType' => 'サブスク型ECサイト制作',
			'description' => 'BtoB企業・メーカー向けの月額制ECサイト制作・運用サービス。Shopify を用いた構築から公開後の運用までを月額費用に含めて支援する。',
			'plans'       => [
				[ 'id' => 'simple', 'name' => 'シンプル', 'monthly' => 40000, 'setup' => 300000 ],
				[ 'id' => 'standard', 'name' => 'スタンダード', 'monthly' => 50000, 'setup' => 300000 ],
				[ 'id' => 'premium', 'name' => 'プレミアム', 'monthly' => 60000, 'setup' => 300000 ],
			],
		],
		'page-btob-consultation-lp.php' => [
			'name'        => 'BtoBマーケティング無料相談・無料診断',
			'serviceType' => '無料相談・無料診断',
			'description' => 'ホームページとBtoBマーケティングについて、何から手をつけるべきかを整理する無料相談。10問の無料診断レポートを土台に、オンラインで全国から相談できる。',
			'plans'       => [
				[ 'id' => 'free-consultation', 'name' => '無料相談', 'monthly' => 0, 'setup' => 0 ],
			],
		],
	];
}

/**
 * 表示中のページに対応する LP 定義とテンプレートファイルのパスを返す
 */
function will_sd_current_lp() {
	$template = get_page_template_slug( get_queried_object_id() );
	$map      = will_sd_lp_map();
	if ( ! isset( $map[ $template ] ) ) {
		return null;
	}
	$path = get_template_directory() . '/' . $template;
	if ( ! is_readable( $path ) ) {
		return null;
	}
	$lp             = $map[ $template ];
	$lp['template'] = $template;
	$lp['path']     = $path;
	return $lp;
}

/**
 * テンプレートを解析して FAQ と表示テキストを取り出す。
 * ファイルの更新時刻をキーにキャッシュするので、編集すれば自動で作り直される。
 *
 * @return array{faq: array<int, array{0:string,1:string}>, text: string}
 */
function will_sd_parse_template( $path ) {
	$key    = 'will_sd_tpl_' . md5( $path . '|' . filemtime( $path ) );
	$cached = get_transient( $key );
	if ( is_array( $cached ) ) {
		return $cached;
	}

	$source = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions
	if ( false === $source ) {
		return [ 'faq' => [], 'text' => '' ];
	}

	// PHP と script/style を落として、表示されるHTMLだけにする
	$html = preg_replace( '#<\?php.*?\?>#s', '', $source );
	$html = preg_replace( '#<\?php.*$#s', '', $html );
	$html = preg_replace( '#<(script|style)\b[^>]*>.*?</\1>#is', '', $html );

	$result = [
		'faq'  => will_sd_extract_details_faq( $html ),
		'text' => preg_replace( '/\s+/u', '', wp_strip_all_tags( $html ) ),
	];

	set_transient( $key, $result, DAY_IN_SECONDS );
	return $result;
}

/**
 * <details><summary>質問</summary>…<p>回答</p></details> から Q&A を取り出す。
 *
 * - summary 内の装飾（Qバッジ・開閉アイコン）は質問文に含めない
 * - 「Q1.」のような連番はページ上には残すが、質問文からは外す
 * - 表・箇条書きは回答に含めない（回答文がページ上に存在することを担保するため）
 */
function will_sd_extract_details_faq( $html ) {
	if ( false === stripos( $html, '<details' ) ) {
		return [];
	}

	$doc = new DOMDocument();
	$previous = libxml_use_internal_errors( true );
	$doc->loadHTML( '<?xml encoding="UTF-8">' . $html, LIBXML_NOWARNING | LIBXML_NOERROR );
	libxml_clear_errors();
	libxml_use_internal_errors( $previous );

	$xpath = new DOMXPath( $doc );
	$faq   = [];

	foreach ( $xpath->query( '//details' ) as $details ) {
		$summary = $xpath->query( './summary', $details )->item( 0 );
		if ( ! $summary ) {
			continue;
		}

		// 装飾用の要素を除いた summary のテキスト
		$question = '';
		foreach ( $xpath->query( './/text()', $summary ) as $node ) {
			$skip = false;
			for ( $p = $node->parentNode; $p && $p !== $summary; $p = $p->parentNode ) {
				if ( $p instanceof DOMElement && preg_match( '/faq-(q|mark)\b/', (string) $p->getAttribute( 'class' ) ) ) {
					$skip = true;
					break;
				}
			}
			if ( ! $skip ) {
				$question .= $node->nodeValue;
			}
		}
		$question = trim( preg_replace( '#^Q\d+[.．、:：]?\s*#u', '', preg_replace( '/\s+/u', '', $question ) ) );

		// summary の外にある p（表・箇条書きの中は除く）を回答とする
		$answer = '';
		foreach ( $xpath->query( './/p[not(ancestor::summary) and not(ancestor::table) and not(ancestor::ul) and not(ancestor::ol)]', $details ) as $p ) {
			$answer .= preg_replace( '/\s+/u', '', $p->textContent );
		}

		if ( '' !== $question && '' !== $answer ) {
			$faq[] = [ $question, $answer ];
		}
	}
	return $faq;
}

/**
 * 設定した金額がページ上に書かれているか。
 * クラス名ではなく金額の文字列で照合するので、デザイン変更では壊れない。
 * 「30,000」「30000」「10万」のいずれの表記でも一致とみなす。
 */
function will_sd_amount_on_page( $amount, $text ) {
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
 * 設定の価格が表示と一致しているか検証する
 *
 * @return string[] 不一致の内容（空なら一致）
 */
function will_sd_verify_prices( array $lp, $text ) {
	$problems = [];
	foreach ( $lp['plans'] as $plan ) {
		if ( '' !== $plan['name'] && false === strpos( $text, preg_replace( '/\s+/u', '', $plan['name'] ) ) ) {
			$problems[] = sprintf( 'プラン「%s」がページ上に見つかりません', $plan['name'] );
		}
		if ( ! will_sd_amount_on_page( $plan['monthly'], $text ) ) {
			$problems[] = sprintf( '「%s」の月額 %s円 がページ上に見つかりません', $plan['name'], number_format( $plan['monthly'] ) );
		}
		if ( ! empty( $plan['setup'] ) && ! will_sd_amount_on_page( $plan['setup'], $text ) ) {
			$problems[] = sprintf( '「%s」の初期費用 %s円 がページ上に見つかりません', $plan['name'], number_format( $plan['setup'] ) );
		}
	}
	return $problems;
}

/**
 * プラン1件分の Offer を組み立てる
 */
function will_sd_build_offer( array $plan, $url ) {
	$offer = [
		'@type'        => 'Offer',
		'@id'          => $url . '#offer-' . $plan['id'],
		'name'         => $plan['name'],
		'url'          => $url,
		'availability' => 'https://schema.org/InStock',
	];

	if ( empty( $plan['monthly'] ) ) {
		// 無料
		$offer['price']         = '0';
		$offer['priceCurrency'] = 'JPY';
		return $offer;
	}

	// 月額であることを referenceQuantity(unitCode=MON) で明示する。
	// price だけを書くと一回払いの金額として解釈されるため。
	$offer['priceSpecification'] = [
		'@type'                => 'UnitPriceSpecification',
		'price'                => $plan['monthly'],
		'priceCurrency'        => 'JPY',
		'valueAddedTaxIncluded' => false,
		'unitText'             => '月額',
		'referenceQuantity'    => [
			'@type'    => 'QuantitativeValue',
			'value'    => 1,
			'unitCode' => 'MON',
		],
	];

	if ( ! empty( $plan['setup'] ) ) {
		$offer['addOn'] = [
			'@type'             => 'Offer',
			'name'              => '初期費用',
			'priceSpecification' => [
				'@type'                => 'PriceSpecification',
				'price'                => $plan['setup'],
				'priceCurrency'        => 'JPY',
				'valueAddedTaxIncluded' => false,
			],
		];
	}

	return $offer;
}

/**
 * LP に Service と FAQPage を出力する
 */
function will_sd_lp() {
	$lp = will_sd_current_lp();
	if ( ! $lp ) {
		return false;
	}

	$parsed = will_sd_parse_template( $lp['path'] );
	$url    = get_permalink();
	$id     = get_queried_object_id();

	// 説明文は Slim SEO のメタディスクリプションを優先する。
	// LP を最適化する際に必ず見直される場所なので、そこに一元化しておく。
	$meta        = get_post_meta( $id, 'slim_seo', true );
	$description = is_array( $meta ) && ! empty( $meta['description'] ) ? $meta['description'] : $lp['description'];

	$service = [
		'@context'    => 'https://schema.org',
		'@type'       => 'Service',
		'@id'         => $url . '#service',
		'name'        => $lp['name'],
		'serviceType' => $lp['serviceType'],
		'description' => wp_strip_all_tags( $description ),
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
	];

	$problems = will_sd_verify_prices( $lp, $parsed['text'] );
	if ( $problems ) {
		// 表示と食い違う価格は出力しない。管理画面で気づけるようにする。
		will_sd_report_price_mismatch( $lp['name'], $problems );
	} else {
		$offers = [];
		foreach ( $lp['plans'] as $plan ) {
			$offers[] = will_sd_build_offer( $plan, $url );
		}
		$service['offers'] = $offers;
	}

	will_sd_print( $service );

	if ( $parsed['faq'] ) {
		$items = [];
		foreach ( $parsed['faq'] as $pair ) {
			$items[] = [
				'@type'          => 'Question',
				'name'           => $pair[0],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text'  => $pair[1],
				],
			];
		}
		will_sd_print( [
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'@id'        => $url . '#faqpage',
			'url'        => $url,
			'inLanguage' => 'ja',
			'isPartOf'   => [ '@id' => $url . '#webpage' ],
			'mainEntity' => $items,
		] );
	}

	return true;
}

/**
 * 価格の不一致を記録し、管理画面に警告を出す
 */
function will_sd_report_price_mismatch( $lp_name, array $problems ) {
	$stored = get_transient( 'will_sd_price_mismatch' );
	$stored = is_array( $stored ) ? $stored : [];
	$stored[ $lp_name ] = $problems;
	set_transient( 'will_sd_price_mismatch', $stored, WEEK_IN_SECONDS );
}

add_action( 'admin_notices', function () {
	$stored = get_transient( 'will_sd_price_mismatch' );
	if ( ! is_array( $stored ) || ! $stored ) {
		return;
	}
	echo '<div class="notice notice-warning"><p><strong>構造化データ：LPの価格設定がページの表示と一致していません。</strong><br>';
	echo '一致するまで価格（Offer）の出力を停止しています。<code>inc/structured-data.php</code> の <code>will_sd_lp_map()</code> を修正してください。</p><ul style="list-style:disc;padding-left:1.5em">';
	foreach ( $stored as $lp_name => $problems ) {
		foreach ( $problems as $problem ) {
			echo '<li>' . esc_html( $lp_name . '：' . $problem ) . '</li>';
		}
	}
	echo '</ul></div>';
} );
