<?php
/**
 * Plugin Name: Will Blog Structured Data
 * Description: ブログ記事の構造化データを補正する。記事本文からの FAQPage 生成、
 *              コーポレートサイトとのエンティティ統合、実態と乖離した wordCount の除去。
 * Version:     1.0.0
 * Author:      合同会社ウィル
 *
 * 【設置場所】wp-content/mu-plugins/ の直下（サブディレクトリに置くと読み込まれない）
 * 【ソース】  will_php リポジトリの blog-mu-plugin/
 *
 * mu-plugin は常時有効で、WordPress 本体・テーマ・プラグインの更新では
 * 置き換えられない。ただし致命的エラーはサイト全体を止めるため、
 * Slim SEO の仕様が変わった場合は「何もせず素通しする」方針で書いている。
 *
 * FAQPage の出力は Slim SEO に依存しない独立処理にしてある。
 * Slim SEO が無効化・削除されても FAQ の構造化データは残る。
 */

defined( 'ABSPATH' ) || exit;

/** コーポレートサイト側の Organization / Person の @id。両サイトで同一エンティティとして扱う */
define( 'WILL_BSD_ORG_ID', 'https://will-corp.co.jp/#organization' );
define( 'WILL_BSD_PERSON_ID', 'https://will-corp.co.jp/#person-takahashi' );

/** Slim SEO がブログ単体で生成する Organization の @id（統合前の値） */
define( 'WILL_BSD_BLOG_ORG_ID', 'https://will-corp.co.jp/blog/#organization' );

/**
 * コーポレートサイトと同一内容の Organization
 */
function will_bsd_organization() {
	return [
		'@type'        => 'Organization',
		'@id'          => WILL_BSD_ORG_ID,
		'name'         => '合同会社ウィル',
		'legalName'    => '合同会社ウィル',
		'url'          => 'https://will-corp.co.jp/',
		'logo'         => 'https://will-corp.co.jp/wp-content/uploads/2025/08/logo_black.png',
		'image'        => 'https://will-corp.co.jp/wp-content/uploads/2025/08/logo_black.png',
		'description'  => 'BtoB企業の営業基盤をWebから設計する、福岡のWebマーケティング支援会社。Webサイト制作・運用、MA構築・運用支援、コンテンツSEO構築・運用支援、Instagram構築・運用支援、グラフィック制作を統合的に提供。',
		'telephone'    => '+81-70-4131-3250',
		'email'        => 'info@will-corp.co.jp',
		'foundingDate' => '2023-11',
		'address'      => [
			'@type'           => 'PostalAddress',
			'streetAddress'   => '博多駅前1-23-2 ParkFront博多駅前1丁目5F-B',
			'addressLocality' => '福岡市博多区',
			'addressRegion'   => '福岡県',
			'postalCode'      => '812-0011',
			'addressCountry'  => 'JP',
		],
		'sameAs'       => [
			'https://www.instagram.com/will_marketing_branding',
			'https://www.youtube.com/@will-btob-marketing',
		],
	];
}

/**
 * 記事の著者（代表 高橋竜也）。経歴は about ページの記載に基づく。
 */
function will_bsd_person() {
	return [
		'@type'       => 'Person',
		'@id'         => WILL_BSD_PERSON_ID,
		'name'        => '高橋 竜也',
		'jobTitle'    => '代表',
		'url'         => 'https://will-corp.co.jp/about/',
		'description' => 'アメリカの大学でマネジメントとマーケティングを学び、その後IT企業のマーケティング部門に10年間従事。マーケティングから内勤営業チームのマネジメントまで、集客から販売までの実践的なビジネススキルを培う。現在は福岡を拠点に、BtoB中小企業のWebマーケティング支援を行う。',
		'worksFor'    => [ '@id' => WILL_BSD_ORG_ID ],
		'knowsAbout'  => [
			'BtoBマーケティング',
			'Webマーケティング',
			'リード獲得',
			'マーケティングオートメーション',
			'コンテンツSEO',
		],
	];
}

/**
 * 配列を再帰的に走査し、@id 参照を置き換える
 */
function will_bsd_replace_refs( $value, array $map ) {
	if ( is_array( $value ) ) {
		foreach ( $value as $k => $v ) {
			$value[ $k ] = will_bsd_replace_refs( $v, $map );
		}
		return $value;
	}
	if ( is_string( $value ) && isset( $map[ $value ] ) ) {
		return $map[ $value ];
	}
	return $value;
}

/**
 * Slim SEO のグラフを加工する。
 * 対象ノードが見つからない場合は何も変更しない。
 */
function will_bsd_filter_graph( $graph ) {
	if ( ! is_array( $graph ) ) {
		return $graph;
	}

	$map = [];

	foreach ( $graph as $key => $node ) {
		if ( ! is_array( $node ) || empty( $node['@type'] ) ) {
			continue;
		}
		$type = is_array( $node['@type'] ) ? $node['@type'] : [ $node['@type'] ];

		// ブログ単体の Organization を、コーポレートと同一のエンティティに置き換える
		if ( in_array( 'Organization', $type, true ) ) {
			if ( ! empty( $node['@id'] ) && WILL_BSD_ORG_ID !== $node['@id'] ) {
				$map[ $node['@id'] ] = WILL_BSD_ORG_ID;
			}
			$graph[ $key ] = will_bsd_organization();
			continue;
		}

		// 著者を代表 高橋竜也 に差し替える（WPアカウント名のままにしない）
		if ( in_array( 'Person', $type, true ) ) {
			if ( ! empty( $node['@id'] ) && WILL_BSD_PERSON_ID !== $node['@id'] ) {
				$map[ $node['@id'] ] = WILL_BSD_PERSON_ID;
			}
			$graph[ $key ] = will_bsd_person();
			continue;
		}

		// wordCount は空白区切りで数えられており日本語で機能していないため落とす
		if ( in_array( 'Article', $type, true ) && isset( $node['wordCount'] ) ) {
			unset( $graph[ $key ]['wordCount'] );
		}
	}

	if ( $map ) {
		$graph = will_bsd_replace_refs( $graph, $map );
	}

	return $graph;
}
add_filter( 'slim_seo_schema_graph', 'will_bsd_filter_graph', 20 );

/**
 * 記事本文の <section id="faq"> から Q&A を取り出す。
 *
 * 対応する書き方（実データで確認済み）:
 *   <section id="faq"> <h2>よくある質問</h2>
 *     <article id="faq-xxx"><h3>質問</h3><p>回答</p></article>  … article でくくる形
 *     <h3>Q1. 質問</h3><p>回答</p>                              … article なしの形
 *   </section>
 *
 * @return array{0:string,1:string}[] [質問, 回答] の配列
 */
function will_bsd_extract_faq( $content ) {
	if ( ! is_string( $content ) || false === strpos( $content, 'id="faq"' ) ) {
		return [];
	}
	if ( ! preg_match( '#<section[^>]+id="faq"[^>]*>(.*?)</section>#is', $content, $m ) ) {
		return [];
	}

	// h3 ごとに区切る。各区切りの中の <p> をすべて回答として拾う。
	if ( ! preg_match_all( '#<h3[^>]*>(.*?)</h3>(.*?)(?=<h3[^>]*>|\z)#is', $m[1], $items, PREG_SET_ORDER ) ) {
		return [];
	}

	$faq = [];
	foreach ( $items as $item ) {
		// 「Q1.」のような連番はページ上には残すが、構造化データの質問文からは外す
		$question = trim( preg_replace( '#^Q\d+[.．、:：]?\s*#u', '', wp_strip_all_tags( $item[1] ) ) );

		$answer = '';
		if ( preg_match_all( '#<p[^>]*>(.*?)</p>#is', $item[2], $paragraphs ) ) {
			$answer = trim( wp_strip_all_tags( implode( '', $paragraphs[1] ) ) );
		}

		if ( '' !== $question && '' !== $answer ) {
			$faq[] = [ $question, $answer ];
		}
	}
	return $faq;
}

/**
 * 記事ページに FAQPage を出力する
 */
function will_bsd_output_faq() {
	if ( ! is_singular( 'post' ) ) {
		return;
	}
	$post_id = get_queried_object_id();
	$faq     = will_bsd_extract_faq( get_post_field( 'post_content', $post_id ) );
	if ( ! $faq ) {
		return;
	}

	$url   = get_permalink( $post_id );
	$items = [];
	foreach ( $faq as $pair ) {
		$items[] = [
			'@type'          => 'Question',
			'name'           => $pair[0],
			'acceptedAnswer' => [
				'@type' => 'Answer',
				'text'  => $pair[1],
			],
		];
	}

	$data = [
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'@id'        => $url . '#faqpage',
		'url'        => $url,
		'inLanguage' => 'ja',
		'isPartOf'   => [ '@id' => $url . '#webpage' ],
		'mainEntity' => $items,
	];

	echo "\n" . '<script type="application/ld+json">'
		. wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE )
		. '</script>' . "\n";
}
add_action( 'wp_head', 'will_bsd_output_faq', 20 );
