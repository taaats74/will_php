<?php
/**
 * ページ内容の解析（構造化データの材料を表示中のHTMLから取り出す）
 *
 * テンプレートごとの設定は持たない。どのページにも同じ規則を当てる。
 *
 *   セクション … h2 見出しと、その上のラベル（例：PRICE / FLOW / WORKS）で種類を判定する
 *   項目       … セクション内で「同じ形の要素が2つ以上並んでいる」ものを項目とみなす
 *
 * 取り出すもの
 *   料金    … 料金セクションの各カードから プラン名・金額・単位（月額／回／〜）・初期費用・税抜
 *   流れ    … 流れセクションの各ステップから 名前・説明
 *   実績    … 実績セクションの各カードから 名前・URL・画像・分類
 *   記事    … ブログセクションの各カードから タイトル・URL・日付・画像
 *   資料    … 目次・対象者・わかること
 *   FAQ     … <details> 形式、.accordion 内の .question / .answer 形式
 *   人物    … 会社情報に載っている人名を含む「名前」要素と、その紹介文
 *   会社情報 … 会社概要の表（dl）、特商法の表（table）、フッターのSNSリンク
 *   動画    … YouTube の埋め込み（コメントアウトされたものは対象外）
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

/**
 * ページを解析する（同じHTMLは1回だけ解析する）
 */
function will_seo_analyze( $html ) {
	static $cache = [];
	$key = md5( $html );
	if ( isset( $cache[ $key ] ) ) {
		return $cache[ $key ];
	}

	$result = [
		'h1'       => '',
		'service'  => [ 'name' => '', 'type' => '' ],
		'offers'   => [],   // [ [ 'name' => セクション名, 'offers' => [...] ], ... ]
		'problems' => [],   // 料金表を読み取れなかった箇所
		'steps'    => [],
		'works'    => [],
		'posts'    => [],
		'toc'      => [],
		'audience' => [],
		'teaches'  => [],
		'faq'      => [],
		'people'   => [],
		'company'  => [],
		'contact'  => [],
		'same_as'  => [],
		'videos'   => [],
		'has_form' => false,
		'text'     => '',
	];

	$dom = will_seo_dom( $html );
	if ( ! $dom ) {
		return $cache[ $key ] = $result;
	}
	$xpath = new DOMXPath( $dom );

	$result['text']     = will_seo_page_text( $html );
	$result['has_form'] = (bool) $xpath->query( '//body//form | //*[contains(@class, "hs-form") or contains(@class, "hbspt-form")]' )->length
		|| false !== strpos( $html, 'hbspt.forms.create' );

	$h1 = $xpath->query( '//body//h1' )->item( 0 );
	if ( $h1 ) {
		$result['h1']      = will_seo_clean_text( will_seo_node_text( $h1 ) );
		$result['service'] = will_seo_extract_service_name( $h1 );
	}

	// 料金ページ（H1 が「料金」）では、各見出し（サービス名）のセクションを料金表の候補にする
	$price_page = (bool) preg_match( '/料金|価格|PRICE/iu', $result['h1'] );

	foreach ( will_seo_sections( $xpath ) as $section ) {
		$label = $section['label'];
		$root  = $section['root'];

		$group = null;
		if ( $price_page || preg_match( '/料金|費用|PRICE|PRICING|PLAN/iu', $label ) ) {
			$group = will_seo_extract_offers( $root, $section['title'] );
			if ( $group['offers'] ) {
				$result['offers'][] = $group;
			}
			if ( $group['problem'] ) {
				$result['problems'][] = $group['problem'];
			}
		}
		if ( $group && ( $group['offers'] || $group['problem'] ) ) {
			continue;
		} elseif ( preg_match( '/流れ|FLOW|ステップ|STEP|プロセス|進め方/iu', $label ) ) {
			$steps = will_seo_extract_steps( $root );
			if ( count( $steps ) >= 2 ) {
				$result['steps'][] = [ 'name' => $section['title'], 'steps' => $steps ];
			}
		} elseif ( preg_match( '/実績|事例|WORKS|CASE/iu', $label ) ) {
			$result['works'] = array_merge( $result['works'], will_seo_extract_cards( $root, false ) );
		} elseif ( preg_match( '/BLOG|ブログ|記事/iu', $label ) ) {
			$result['posts'] = array_merge( $result['posts'], will_seo_extract_cards( $root, true ) );
		} elseif ( preg_match( '/目次|CONTENTS/iu', $label ) ) {
			$result['toc'] = will_seo_extract_steps( $root );
		} elseif ( preg_match( '/おすすめ|FOR ?YOU|対象/iu', $label ) ) {
			$result['audience'] = will_seo_extract_list_items( $root );
		} elseif ( preg_match( '/わかること|分かること|BENEFITS|得られる/iu', $label ) ) {
			$result['teaches'] = will_seo_extract_list_items( $root );
		}
	}

	$result['works']   = will_seo_unique_by( $result['works'], 'name' );
	$result['posts']   = will_seo_unique_by( $result['posts'], 'url' );
	$result['faq']     = will_seo_extract_faq( $html );
	$result['company'] = will_seo_extract_company( $xpath );
	$result['contact'] = will_seo_extract_contact( $xpath );
	$result['same_as'] = will_seo_extract_same_as( $xpath );
	$result['videos']  = will_seo_extract_videos( $xpath );
	$result['people']  = will_seo_extract_people( $xpath );

	return $cache[ $key ] = $result;
}

/* =========================================================================
 * セクション・項目の検出
 * ========================================================================= */

/**
 * h2 ごとのセクション。
 * 範囲は「その h2 だけを含む、いちばん外側の要素」とする（料金ページのように1つの section に
 * 複数の h2 が並ぶ場合も、h2 ごとに分かれる）。
 *
 * @return array<int, array{title:string,label:string,root:DOMElement}>
 */
function will_seo_sections( DOMXPath $xpath ) {
	$sections = [];
	foreach ( $xpath->query( '//body//h2[not(ancestor::header) and not(ancestor::nav) and not(ancestor::footer)]' ) as $h2 ) {
		$root = $h2;
		while ( $root->parentNode instanceof DOMElement
			&& 'body' !== strtolower( $root->parentNode->tagName )
			&& 1 === (int) $xpath->evaluate( 'count(.//h2)', $root->parentNode ) ) {
			$root = $root->parentNode;
		}
		// 見出しの上に付いている英字ラベル（PRICE など）も判定に使う
		$eyebrow = '';
		foreach ( $xpath->query( './/*[contains(@class, "eyebrow") or contains(concat(" ", normalize-space(@class), " "), " en ") or contains(@class, "__en")]', $root ) as $node ) {
			$eyebrow .= ' ' . will_seo_clean_text( will_seo_node_text( $node ) );
		}
		$title      = str_replace( "\n", '', will_seo_clean_text( will_seo_node_text( $h2 ) ) );
		$sections[] = [
			'title' => $title,
			'label' => $title . ' ' . $eyebrow,
			'root'  => $root,
		];
	}
	return $sections;
}

/**
 * 同じ形の要素が並んでいる箇所を探し、その要素を返す。
 * 「同じ形」＝ 同じタグ名で、class の先頭が同じ。条件を満たす要素がいちばん多い並びを採用する。
 *
 * @param callable $accept 項目として採用するか（DOMElement を受け取る）
 * @return DOMElement[]
 */
function will_seo_repeated_items( DOMElement $root, callable $accept ) {
	$best = [];
	$walk = function ( DOMElement $parent ) use ( &$walk, &$best, $accept ) {
		$groups = [];
		foreach ( $parent->childNodes as $child ) {
			if ( $child instanceof DOMElement ) {
				$class                   = preg_split( '/\s+/', trim( $child->getAttribute( 'class' ) ) )[0] ?? '';
				$groups[ $child->tagName . '.' . $class ][] = $child;
			}
		}
		foreach ( $groups as $members ) {
			if ( count( $members ) < 2 ) {
				continue;
			}
			$accepted = array_values( array_filter( $members, $accept ) );
			if ( count( $accepted ) >= 2 && count( $accepted ) > count( $best ) ) {
				$best = $accepted;
			}
		}
		foreach ( $parent->childNodes as $child ) {
			if ( $child instanceof DOMElement ) {
				$walk( $child );
			}
		}
	};
	$walk( $root );
	return $best;
}

/**
 * class の「要素名」の一覧（BEM の「block__element--modifier」の element 部分）。
 * 「service-ma-price__plan-name」のように接頭辞に price を含む class を、名前の要素として正しく判定するため
 */
function will_seo_class_parts( DOMElement $el ) {
	$parts = [];
	foreach ( preg_split( '/\s+/', trim( $el->getAttribute( 'class' ) ) ) as $token ) {
		if ( '' === $token ) {
			continue;
		}
		$token   = preg_replace( '/--.*$/', '', $token );
		$parts[] = false !== strpos( $token, '__' ) ? substr( $token, strrpos( $token, '__' ) + 2 ) : $token;
	}
	return $parts;
}

function will_seo_class_matches( DOMElement $el, $pattern ) {
	foreach ( will_seo_class_parts( $el ) as $part ) {
		if ( preg_match( $pattern, $part ) ) {
			return true;
		}
	}
	return false;
}

/**
 * 項目の名前。見出し（h3〜h5）→ 要素名が name → title → plan の順に探す
 */
function will_seo_item_name( DOMElement $item ) {
	$xpath      = new DOMXPath( $item->ownerDocument );
	$candidates = iterator_to_array( $xpath->query( './/*', $item ) );
	$skip       = '/(^|[-_])(num|number|price|tag|ribbon|badge|desc|sub|subcopy|text|lead|label|period|time|photo|thumb|wrapper|list)$/';
	$rules      = [
		function ( DOMElement $el ) {
			return (bool) preg_match( '/^h[3-5]$/i', $el->tagName );
		},
		function ( DOMElement $el ) {
			return will_seo_class_matches( $el, '/(^|[-_])name$/' );
		},
		function ( DOMElement $el ) {
			return will_seo_class_matches( $el, '/(^|[-_])title$/' );
		},
		function ( DOMElement $el ) {
			return will_seo_class_matches( $el, '/^plan$/' );
		},
	];
	$in_linkcard = function ( DOMElement $node ) use ( $item ) {
		// 記事同士のリンクカード（「あわせて読みたい」）の中の見出しは、項目名にしない
		for ( $el = $node; $el instanceof DOMElement && $el !== $item->parentNode; $el = $el->parentNode ) {
			if ( will_seo_class_matches( $el, '/linkcard/' ) ) {
				return true;
			}
		}
		return false;
	};
	foreach ( $rules as $rule ) {
		foreach ( $candidates as $node ) {
			if ( ! $rule( $node ) || will_seo_class_matches( $node, $skip ) || in_array( strtolower( $node->tagName ), [ 'ul', 'ol', 'img' ], true ) || $in_linkcard( $node ) ) {
				continue;
			}
			// 名前要素の中の補足（例：<h3>高橋 竜也<span>マーケティング戦略</span></h3>）は含めない
			$text = '';
			foreach ( $node->childNodes as $child ) {
				if ( $child instanceof DOMText ) {
					$text .= $child->nodeValue;
				}
			}
			$text = trim( preg_replace( '/\s+/u', ' ', $text ) );
			if ( '' === $text ) {
				$text = str_replace( "\n", '', will_seo_clean_text( will_seo_node_text( $node ) ) );
			}
			if ( '' !== $text ) {
				return $text;
			}
		}
	}
	return '';
}

function will_seo_unique_by( array $items, $key ) {
	$seen = [];
	foreach ( $items as $item ) {
		if ( ! empty( $item[ $key ] ) && ! isset( $seen[ $item[ $key ] ] ) ) {
			$seen[ $item[ $key ] ] = $item;
		}
	}
	return array_values( $seen );
}

/**
 * 箇条書きの各項目（チェックマーク等の装飾は除く）
 */
function will_seo_extract_list_items( DOMElement $root ) {
	$items = [];
	foreach ( ( new DOMXPath( $root->ownerDocument ) )->query( './/li', $root ) as $li ) {
		$text = str_replace( "\n", ' ', will_seo_clean_text( will_seo_node_text( $li ) ) );
		$text = trim( preg_replace( '/^[✓✔・\s]+/u', '', $text ) );
		if ( '' !== $text ) {
			$items[] = $text;
		}
	}
	return $items;
}

/* =========================================================================
 * サービス名
 * ========================================================================= */

/**
 * H1 からサービス名と種別を取り出す。
 *   画像の H1 … 代替テキストを「｜」で分け、前をサービス名、後ろを種別とする
 *   複数の子要素 … 最初の子要素をサービス名とする（例：ラベル＋キャッチコピー）
 */
function will_seo_extract_service_name( DOMElement $h1 ) {
	$xpath = new DOMXPath( $h1->ownerDocument );
	$full  = str_replace( "\n", '', will_seo_clean_text( will_seo_node_text( $h1 ) ) );
	$img   = $xpath->query( './/img[@alt != ""]', $h1 )->item( 0 );
	$name  = $full;

	if ( $img ) {
		$full = $img->getAttribute( 'alt' ) . $full;
		$name = $img->getAttribute( 'alt' );
	} else {
		$children = [];
		foreach ( $h1->childNodes as $child ) {
			if ( $child instanceof DOMElement && 'br' !== strtolower( $child->tagName ) ) {
				$children[] = $child;
			}
		}
		if ( count( $children ) >= 2 && ! preg_match( '/visually-hidden|vh\b|sr-only/', $children[1]->getAttribute( 'class' ) ) ) {
			$name = str_replace( "\n", '', will_seo_clean_text( will_seo_node_text( $children[0] ) ) );
		}
	}

	$parts = array_values( array_filter( array_map( 'trim', preg_split( '/[｜|]/u', $full ) ) ) );
	$name  = trim( preg_split( '/[｜|]/u', $name )[0] );
	return [
		'name' => $name,
		'type' => count( $parts ) >= 2 ? $parts[1] : '',
	];
}

/* =========================================================================
 * 料金
 * ========================================================================= */

/** 金額表記（例：月額30,000円（税抜） / 400,000円〜 / 回 / 70万円〜(税別) / 30 万円〜） */
const WILL_SEO_PRICE_PATTERN = '/(月額)?\s*[¥￥]?\s*([0-9０-９][0-9,，０-９]*)\s*(万)?\s*円?\s*(?:[（(](税抜|税別|税込)[）)])?\s*([〜～])?\s*(?:[（(](税抜|税別|税込)[）)])?\s*(?:[\/／]\s*(月|回|1通|通|件|本))?/u';

/**
 * 料金セクションからプランを読み取る
 *
 * @return array{name:string, offers:array, problem:string}
 */
function will_seo_extract_offers( DOMElement $root, $title ) {
	$has_price = function ( DOMElement $el ) {
		return (bool) will_seo_parse_price_lines( will_seo_lines( $el ) )['amount'];
	};
	$items = will_seo_repeated_items( $root, $has_price );
	$group = [ 'name' => $title, 'offers' => [], 'problem' => '' ];
	if ( ! $items ) {
		return $group;
	}

	// カードの外に書かれた初期費用・税の表記（例：料金ページの「初期費用 100,000円（税抜）」）はプラン共通とみなす
	$outside = will_seo_lines( $root );
	foreach ( $items as $item ) {
		$outside = array_values( array_diff( $outside, will_seo_lines( $item ) ) );
	}
	$common = will_seo_parse_price_lines( $outside, true );
	$tax    = will_seo_tax_included( implode( ' ', $outside ) );

	foreach ( $items as $item ) {
		$name  = will_seo_strip_number( will_seo_item_name( $item ) );
		$price = will_seo_parse_price_lines( will_seo_lines( $item ) );
		if ( '' === $name || ! $price['amount'] ) {
			$group['problem'] = sprintf( '「%s」の料金表に、プラン名または金額を読み取れない項目があります', $title );
			$group['offers']  = [];
			return $group;
		}
		if ( ! $price['setup'] && $common['setup'] ) {
			$price['setup'] = $common['setup'];
		}
		if ( null === $price['tax'] ) {
			$price['tax'] = $tax;
		}
		$price['name']     = $name;
		$group['offers'][] = $price;
	}
	return $group;
}

/**
 * 要素のテキストを行に分ける（段落・項目ごと）
 */
function will_seo_lines( DOMElement $el ) {
	$lines = explode( "\n", will_seo_clean_text( will_seo_node_text( $el ) ) );
	return array_values( array_filter( array_map( function ( $line ) {
		return trim( preg_replace( '/^・/u', '', $line ) ); // 箇条書きの記号
	}, $lines ) ) );
}

/**
 * 行から金額を読み取る。初期費用の行（「初期費用」の次の行も含む）は本体価格から除く
 *
 * @param bool $setup_only 初期費用だけを読む
 * @return array{amount:int, min:bool, unit:string, setup:int, tax:?bool}
 */
function will_seo_parse_price_lines( array $lines, $setup_only = false ) {
	$result = [ 'amount' => 0, 'min' => false, 'unit' => '', 'setup' => 0, 'tax' => null ];
	$count  = count( $lines );
	for ( $i = 0; $i < $count; $i++ ) {
		$line = $lines[ $i ];
		if ( preg_match( '/^初期費用/u', $line ) ) {
			$target = preg_match( '/[0-9０-９]/u', $line ) ? $line : ( $lines[ $i + 1 ] ?? '' );
			if ( ! preg_match( '/[0-9０-９]/u', $line ) ) {
				$i++;
			}
			$parsed = will_seo_match_price( preg_replace( '/^初期費用/u', '', $target ) );
			if ( $parsed ) {
				$result['setup'] = $parsed['amount'];
			} elseif ( preg_match( '/無料|0円|なし/u', $target ) ) {
				$result['setup'] = 0;
			}
			continue;
		}
		if ( $setup_only || $result['amount'] ) {
			continue;
		}
		$parsed = will_seo_match_price( $line );
		if ( $parsed ) {
			$result = array_merge( $result, $parsed );
		}
	}
	return $result;
}

/**
 * 1行の中の金額。「円」か「月額」を伴う数字だけを金額とみなす（「01」「6ページ」は対象外）
 */
function will_seo_match_price( $line ) {
	$line = mb_convert_kana( $line, 'n' );
	if ( ! preg_match_all( WILL_SEO_PRICE_PATTERN, $line, $matches, PREG_SET_ORDER ) ) {
		return null;
	}
	foreach ( $matches as $m ) {
		$has_yen = false !== mb_strpos( $m[0], '円' ) || false !== mb_strpos( $m[0], '¥' ) || '' !== $m[1];
		if ( ! $has_yen ) {
			continue;
		}
		$amount = (int) str_replace( [ ',', '，' ], '', $m[2] );
		if ( ! empty( $m[3] ) ) {
			$amount *= 10000;
		}
		$unit = $m[7] ?? '';
		if ( '' !== $m[1] ) {
			$unit = '月';
		}
		$tax = ( $m[4] ?? '' ) ?: ( $m[6] ?? '' );
		return [
			'amount' => $amount,
			'min'    => ! empty( $m[5] ?? '' ),
			'unit'   => $unit,
			'tax'    => $tax ? '税込' === $tax : will_seo_tax_included( $line ),
		];
	}
	return null;
}

/**
 * 税込か。税抜・税別の表記があれば false、税込なら true、どちらも無ければ null
 */
function will_seo_tax_included( $text ) {
	if ( preg_match( '/税抜|税別/u', $text ) ) {
		return false;
	}
	return preg_match( '/税込/u', $text ) ? true : null;
}

function will_seo_strip_number( $text ) {
	return trim( preg_replace( '/^(?:STEP|Step|step)?\s*[0-9０-９]{1,2}[.．:：\s]*/u', '', $text ) );
}

/* =========================================================================
 * 流れ・目次
 * ========================================================================= */

/**
 * @return array<int, array{name:string, text:string, label:string}>
 */
function will_seo_extract_steps( DOMElement $root ) {
	$items = will_seo_repeated_items( $root, function ( DOMElement $el ) {
		// 記事同士のリンクカード（ブログ記事内の「あわせて読みたい」）は手順ではない
		return ! will_seo_class_matches( $el, '/linkcard/' ) && '' !== will_seo_item_name( $el );
	} );
	$steps = [];
	foreach ( $items as $item ) {
		$name  = will_seo_item_name( $item );
		$lines = will_seo_lines( $item );
		$label = '';
		$text  = [];
		foreach ( $lines as $line ) {
			if ( $line === $name || preg_match( '/^(STEP|Step)?\s*[0-9０-９]{1,2}$/u', $line ) ) {
				continue;
			}
			// 「第1章」「1ヶ月目」のような短いラベル
			if ( '' === $label && ! $text && mb_strlen( $line ) <= 12 && preg_match( '/^第?[0-9０-９〜~]+|ヶ月|月次|約/u', $line ) ) {
				$label = $line;
				continue;
			}
			$text[] = $line;
		}
		$steps[] = [
			'name'  => $name,
			'label' => $label,
			'text'  => implode( "\n", $text ),
		];
	}
	return $steps;
}

/* =========================================================================
 * 実績・記事のカード
 * ========================================================================= */

/**
 * @param bool $posts ブログ記事のカードとして読む（日付・カテゴリも取る）
 */
function will_seo_extract_cards( DOMElement $root, $posts ) {
	$xpath = new DOMXPath( $root->ownerDocument );
	$items = will_seo_repeated_items( $root, function ( DOMElement $el ) use ( $xpath ) {
		return $xpath->query( 'descendant-or-self::a[@href] | .//img', $el )->length > 0 && '' !== will_seo_item_name( $el );
	} );
	$cards = [];
	foreach ( $items as $item ) {
		$link  = $xpath->query( 'descendant-or-self::a[@href]', $item )->item( 0 );
		$img   = $xpath->query( './/img', $item )->item( 0 );
		$tag   = $xpath->query( './/*[contains(@class, "tag") or contains(@class, "category")]', $item )->item( 0 );
		$date  = $xpath->query( './/*[contains(@class, "date")] | .//time', $item )->item( 0 );
		$card  = [
			'name'  => will_seo_item_name( $item ),
			'url'   => $link ? $link->getAttribute( 'href' ) : '',
			'image' => $img ? ( $img->getAttribute( 'src' ) ?: $img->getAttribute( 'data-src' ) ) : '',
			'alt'   => $img ? $img->getAttribute( 'alt' ) : '',
			'genre' => $tag ? str_replace( "\n", ' ', will_seo_clean_text( will_seo_node_text( $tag ) ) ) : '',
			'date'  => '',
		];
		if ( $date ) {
			$raw = $date->getAttribute( 'datetime' ) ?: will_seo_node_text( $date );
			if ( preg_match( '/(\d{4})[.\/年-](\d{1,2})[.\/月-](\d{1,2})/u', $raw, $m ) ) {
				$card['date'] = sprintf( '%04d-%02d-%02d', $m[1], $m[2], $m[3] );
			}
		}
		if ( $posts && ( ! $card['url'] || ! $card['date'] ) ) {
			continue;
		}
		$cards[] = $card;
	}
	return $cards;
}

/* =========================================================================
 * 会社情報・人物・SNS・動画
 * ========================================================================= */

/**
 * 会社概要の表（dt / dd に「会社名」「所在地」「設立」などが3つ以上ある dl）
 */
function will_seo_extract_company( DOMXPath $xpath ) {
	foreach ( $xpath->query( '//body//dl' ) as $dl ) {
		$pairs = [];
		foreach ( $xpath->query( './/dt', $dl ) as $dt ) {
			$dd = $xpath->query( 'following-sibling::dd[1]', $dt )->item( 0 );
			if ( $dd ) {
				$pairs[ will_seo_clean_text( will_seo_node_text( $dt ) ) ] = will_seo_clean_text( will_seo_node_text( $dd ) );
			}
		}
		// 会社名と所在地に加え、設立か代表者がある表だけを会社概要とみなす
		// （資料ページの「提供会社」のような簡易表は対象外）
		$has_name = isset( $pairs['会社名'] ) || isset( $pairs['社名'] );
		if ( $has_name && isset( $pairs['所在地'] ) && ( isset( $pairs['設立'] ) || isset( $pairs['代表者'] ) ) ) {
			return $pairs;
		}
	}
	return [];
}

/**
 * 特定商取引法に基づく表記の表（th / td に「電話番号」「メールアドレス」がある table）
 */
function will_seo_extract_contact( DOMXPath $xpath ) {
	foreach ( $xpath->query( '//body//table' ) as $table ) {
		$pairs = [];
		foreach ( $xpath->query( './/tr', $table ) as $tr ) {
			$th = $xpath->query( './th', $tr )->item( 0 );
			$td = $xpath->query( './td', $tr )->item( 0 );
			if ( $th && $td ) {
				$pairs[ str_replace( "\n", '', will_seo_clean_text( will_seo_node_text( $th ) ) ) ] = will_seo_clean_text( will_seo_node_text( $td ) );
			}
		}
		if ( isset( $pairs['電話番号'] ) || isset( $pairs['メールアドレス'] ) ) {
			return $pairs;
		}
	}
	return [];
}

/**
 * フッターにある自社SNSへのリンク
 */
function will_seo_extract_same_as( DOMXPath $xpath ) {
	$urls = [];
	foreach ( $xpath->query( '//footer//a[@href] | //*[contains(@class, "footer")]//a[@href]' ) as $a ) {
		$href = $a->getAttribute( 'href' );
		if ( preg_match( '#^https://(www\.)?(instagram\.com|youtube\.com|x\.com|twitter\.com|facebook\.com|linkedin\.com|note\.com|tiktok\.com)/#', $href ) ) {
			$urls[] = rtrim( $href, '/' );
		}
	}
	return array_values( array_unique( $urls ) );
}

/**
 * 表示されている YouTube 動画のID
 */
function will_seo_extract_videos( DOMXPath $xpath ) {
	$ids = [];
	foreach ( $xpath->query( '//body//*[@data-video-id]' ) as $el ) {
		$ids[] = $el->getAttribute( 'data-video-id' );
	}
	foreach ( $xpath->query( '//body//iframe[contains(@src, "youtube")]' ) as $el ) {
		if ( preg_match( '#/embed/([\w-]{11})#', $el->getAttribute( 'src' ), $m ) ) {
			$ids[] = $m[1];
		}
	}
	return array_values( array_unique( array_filter( $ids, function ( $id ) {
		return (bool) preg_match( '/^[\w-]{11}$/', $id );
	} ) ) );
}

/**
 * 人物。会社情報に載っている人名（代表者・運営統括責任者）を含む「名前」要素を探し、
 * 近くの紹介文・写真・肩書きを添える。
 */
function will_seo_extract_people( DOMXPath $xpath ) {
	$names = will_seo_known_person_names();
	if ( ! $names ) {
		return [];
	}
	$people = [];
	foreach ( $xpath->query( '//body//*[contains(@class, "name") and not(ancestor::header) and not(ancestor::nav) and not(ancestor::footer)]' ) as $el ) {
		$raw     = str_replace( "\n", ' ', will_seo_clean_text( will_seo_node_text( $el ) ) );
		$compact = preg_replace( '/\s+/u', '', $raw );
		foreach ( $names as $name ) {
			if ( isset( $people[ $name ] ) || false === mb_strpos( $compact, $name ) ) {
				continue;
			}
			// 紹介文を含む範囲まで広げる
			$block = $el;
			$text  = null;
			for ( $depth = 0; $depth < 4 && $block->parentNode instanceof DOMElement; $depth++ ) {
				$block = $block->parentNode;
				$text  = $xpath->query( './/*[(contains(@class, "text") or contains(@class, "profile") or contains(@class, "desc")) and not(contains(@class, "name"))]', $block )->item( 0 );
				if ( $text ) {
					break;
				}
			}
			$img = $xpath->query( './/img', $block )->item( 0 );

			// 肩書き：名前要素から社名と人名を除いた残り
			$job = preg_replace( '/合同会社ウィル|' . preg_quote( $name, '/' ) . '/u', '', $compact );
			$job = trim( preg_replace( '/^[・\s]+|[・\s]+$/u', '', $job ) );

			$people[ $name ] = [
				'name'        => $name,
				'jobTitle'    => $job,
				'description' => $text ? str_replace( "\n", '', will_seo_clean_text( will_seo_node_text( $text ) ) ) : '',
				'image'       => $img ? ( $img->getAttribute( 'src' ) ?: $img->getAttribute( 'data-src' ) ) : '',
			];
		}
	}
	return array_values( $people );
}

/* =========================================================================
 * FAQ
 * ========================================================================= */

/**
 * 表示中のHTMLから Q&A を取り出す。
 *
 *   A. <details><summary>質問</summary>回答</details>
 *   B. .accordion 内の <* class="question">質問</*><* class="answer">回答</*>
 *   C. <section id="faq"> 内の <article><h3>質問</h3>回答</article>（ブログ記事）
 *
 * メニュー（ヘッダー・ナビ・フッター・class に menu を含む要素）内の <details> は対象外。
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

	// C. ブログ記事：<section id="faq"> の中の <article><h3>質問</h3><p>回答</p></article>
	foreach ( $xpath->query( "//section[@id='faq']//article[h3] | //*[starts-with(@id, 'faq-')][h3]" ) as $article ) {
		$question = '';
		$answer   = [];
		foreach ( $article->childNodes as $child ) {
			if ( $child instanceof DOMElement && 'h3' === strtolower( $child->tagName ) && '' === $question ) {
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
		$question = trim( preg_replace( '/^Q\d*\s*[.．、:：]?\s*/u', '', str_replace( "\n", '', will_seo_clean_text( $pair[0] ) ) ) );
		$answer   = will_seo_clean_text( $pair[1] );
		if ( '' !== $question && '' !== $answer && ! isset( $result[ $question ] ) ) {
			$result[ $question ] = [ $question, $answer ];
		}
	}
	return array_values( $result );
}

/* =========================================================================
 * DOM・テキストの共通処理
 * ========================================================================= */

/**
 * HTML を DOM にする（同じリクエスト内では1回だけ解析する）。コメントアウトされた要素は含まれない
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
		return preg_replace( '/\s+/u', ' ', $node->nodeValue ); // ソースの改行は区切りではない
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
	if ( in_array( $tag, [ 'p', 'div', 'ul', 'ol', 'dl', 'dt', 'dd', 'h1', 'h2', 'h3', 'h4', 'h5', 'section', 'article', 'figure', 'figcaption', 'header', 'footer' ], true ) ) {
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

/**
 * 本文のテキスト（空白なし）。<head> 内の文字は含めない
 */
function will_seo_page_text( $html ) {
	$start = stripos( $html, '<body' );
	$body  = false === $start ? $html : substr( $html, $start );
	$body  = preg_replace( '#<(script|style|noscript|template)\b[^>]*>.*?</\1>#is', '', $body );
	$body  = preg_replace( '#<!--.*?-->#s', '', $body );
	return preg_replace( '/\s+/u', '', html_entity_decode( wp_strip_all_tags( $body ), ENT_QUOTES, 'UTF-8' ) );
}
