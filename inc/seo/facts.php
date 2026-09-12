<?php
/**
 * サイト共通の事実（会社情報・代表者・連絡先・SNS）
 *
 * 会社概要（About）・特定商取引法に基づく表記・フッターは、それぞれ1ページにしか載っていないが、
 * Organization は全ページで使う。そこで、それらのページが表示されたときに読み取った内容を保存し、
 * 他のページではその保存値を使う。ページの記載を直せば、次に表示されたときに自動で更新される。
 *
 * 保存先：option「will_seo_site_facts」
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

const WILL_SEO_FACTS_OPTION = 'will_seo_site_facts';

function will_seo_facts() {
	$facts = get_option( WILL_SEO_FACTS_OPTION, [] );
	return is_array( $facts ) ? $facts : [];
}

/**
 * ページの解析結果から事実を更新する（変わったときだけ保存する）
 */
function will_seo_update_facts( array $analysis, array $state ) {
	$facts = will_seo_facts();
	$new   = $facts;

	$company = $analysis['company'];
	if ( $company ) {
		$new['company'] = [
			'name'         => $company['会社名'] ?? ( $company['社名'] ?? '' ),
			'founders'     => will_seo_split_names( $company['代表者'] ?? '' ),
			'address'      => will_seo_parse_address( $company['所在地'] ?? '' ),
			'foundingDate' => will_seo_parse_year_month( $company['設立'] ?? '' ),
			'knowsAbout'   => will_seo_split_list( $company['業務内容'] ?? ( $company['事業内容'] ?? '' ) ),
		];
	}
	// トップページの説明文を、組織の説明として使う
	if ( $state['is_front'] && $state['description'] ) {
		$new['description'] = $state['description'];
	}

	$contact = $analysis['contact'];
	if ( $contact ) {
		$new['contact'] = [
			'telephone' => will_seo_parse_telephone( $contact['電話番号'] ?? '' ),
			'email'     => sanitize_email( $contact['メールアドレス'] ?? '' ),
			'manager'   => will_seo_split_names( $contact['運営統括責任者'] ?? '' ),
			'address'   => will_seo_parse_address( $contact['所在地'] ?? '' ),
		];
	}

	if ( $analysis['same_as'] ) {
		$new['same_as'] = $analysis['same_as'];
	}

	if ( $new !== $facts ) {
		update_option( WILL_SEO_FACTS_OPTION, $new, false );
	}
	return $new;
}

/**
 * ページの主題の種類を記録する（llms.txt で「サービス」「資料」などに分類するため）。
 * 構造化データを組み立てたときに、そのページの判定結果を保存する。
 */
function will_seo_record_page_kind( $url, $type ) {
	$kinds = get_option( 'will_seo_page_kinds', [] );
	$kinds = is_array( $kinds ) ? $kinds : [];
	$key   = untrailingslashit( $url );
	if ( ( $kinds[ $key ] ?? null ) !== $type ) {
		$kinds[ $key ] = $type;
		update_option( 'will_seo_page_kinds', $kinds, false );
	}
}

function will_seo_page_kind( $url ) {
	$kinds = get_option( 'will_seo_page_kinds', [] );
	return is_array( $kinds ) ? ( $kinds[ untrailingslashit( $url ) ] ?? '' ) : '';
}

/**
 * 人名の一覧（会社概要の代表者 ＋ 特商法の運営統括責任者）。空白は詰める
 */
function will_seo_known_person_names() {
	$facts = will_seo_facts();
	return array_values( array_unique( array_merge(
		$facts['company']['founders'] ?? [],
		$facts['contact']['manager'] ?? []
	) ) );
}

/**
 * 人物の @id。ブログ（別WordPress）の Article.author と同じ @id を使うため、
 * 既知の人物は config.php の対応表を使う
 */
function will_seo_person_id( $name ) {
	$slugs = will_seo_person_slugs();
	$slug  = $slugs[ $name ] ?? 'person-' . substr( md5( $name ), 0, 8 );
	return home_url( '/' ) . '#' . $slug;
}

/**
 * Organization ノード
 *
 * @param bool $full 詳細（住所・連絡先・代表者など）を含める
 */
function will_seo_organization_node( $full ) {
	$facts   = will_seo_facts();
	$home    = home_url( '/' );
	$company = $facts['company'] ?? [];
	$contact = $facts['contact'] ?? [];

	$org = [
		'@type' => 'Organization',
		'@id'   => $home . '#organization',
		'name'  => get_bloginfo( 'name' ),
		'url'   => $home,
	];
	if ( has_site_icon() ) {
		$org['logo'] = get_site_icon_url( 512 );
	}
	$logo = will_seo_logo_url();
	if ( $logo ) {
		$org['logo'] = $logo;
	}
	if ( ! $full ) {
		return $org;
	}

	if ( ! empty( $company['name'] ) ) {
		$org['legalName'] = $company['name'];
	}
	if ( ! empty( $facts['description'] ) ) {
		$org['description'] = $facts['description'];
	}
	$address = ! empty( $company['address'] ) ? $company['address'] : ( $contact['address'] ?? [] );
	if ( $address ) {
		$org['address'] = array_merge( [ '@type' => 'PostalAddress' ], $address, [ 'addressCountry' => 'JP' ] );
	}
	if ( ! empty( $company['foundingDate'] ) ) {
		$org['foundingDate'] = $company['foundingDate'];
	}
	if ( ! empty( $contact['telephone'] ) ) {
		$org['telephone'] = $contact['telephone'];
	}
	if ( ! empty( $contact['email'] ) ) {
		$org['email'] = $contact['email'];
	}
	if ( ! empty( $contact['telephone'] ) || ! empty( $contact['email'] ) ) {
		$point = [
			'@type'             => 'ContactPoint',
			'contactType'       => 'customer support',
			'availableLanguage' => [ 'Japanese' ],
		];
		foreach ( [ 'telephone', 'email' ] as $key ) {
			if ( ! empty( $contact[ $key ] ) ) {
				$point[ $key ] = $contact[ $key ];
			}
		}
		$contact_page = get_page_by_path( 'contact' );
		if ( $contact_page && 'publish' === $contact_page->post_status ) {
			$point['url'] = get_permalink( $contact_page );
		}
		$org['contactPoint'] = [ $point ];
	}
	if ( ! empty( $company['founders'] ) ) {
		$org['founder'] = array_map( function ( $name ) {
			return [ '@id' => will_seo_person_id( $name ) ];
		}, $company['founders'] );
	}
	if ( ! empty( $company['knowsAbout'] ) ) {
		$org['knowsAbout'] = $company['knowsAbout'];
	}
	if ( ! empty( $facts['same_as'] ) ) {
		$org['sameAs'] = $facts['same_as'];
	}
	return $org;
}

/**
 * ロゴ画像（テーマの img/ にあるロゴ）
 */
function will_seo_logo_url() {
	foreach ( [ 'img/logo_black.webp', 'img/logo_black.png' ] as $file ) {
		if ( file_exists( get_template_directory() . '/' . $file ) ) {
			return get_template_directory_uri() . '/' . $file;
		}
	}
	return '';
}

/* ---------- 表記の正規化 ---------- */

function will_seo_split_names( $text ) {
	$names = preg_split( '/[・、,，\/／\n]+/u', (string) $text );
	return array_values( array_filter( array_map( function ( $name ) {
		return preg_replace( '/\s+/u', '', $name );
	}, $names ) ) );
}

function will_seo_split_list( $text ) {
	return array_values( array_filter( array_map( 'trim', preg_split( '/[／\/、\n]+/u', (string) $text ) ) ) );
}

/**
 * 「2023年11月」→「2023-11」
 */
function will_seo_parse_year_month( $text ) {
	if ( preg_match( '/(\d{4})年(?:(\d{1,2})月)?(?:(\d{1,2})日)?/u', mb_convert_kana( (string) $text, 'n' ), $m ) ) {
		return $m[1] . ( ! empty( $m[2] ) ? sprintf( '-%02d', $m[2] ) : '' ) . ( ! empty( $m[3] ) ? sprintf( '-%02d', $m[3] ) : '' );
	}
	return '';
}

/**
 * 「070-4131-3250」→「+81-70-4131-3250」
 */
function will_seo_parse_telephone( $text ) {
	$tel = preg_replace( '/[^\d-]/', '', mb_convert_kana( (string) $text, 'n' ) );
	return preg_match( '/^0(\d[\d-]+)$/', $tel, $m ) ? '+81-' . $m[1] : $tel;
}

/**
 * 日本の住所を PostalAddress の項目に分ける
 */
function will_seo_parse_address( $text ) {
	$text = trim( preg_replace( '/\s+/u', ' ', str_replace( "\n", ' ', mb_convert_kana( (string) $text, 'n' ) ) ) );
	if ( '' === $text ) {
		return [];
	}
	$address = [];
	if ( preg_match( '/〒?\s*(\d{3}-\d{4})/u', $text, $m ) ) {
		$address['postalCode'] = $m[1];
		$text                  = trim( str_replace( $m[0], '', $text ) );
	}
	if ( preg_match( '/^(東京都|北海道|(?:京都|大阪)府|.{2,3}県)/u', $text, $m ) ) {
		$address['addressRegion'] = $m[1];
		$text                     = mb_substr( $text, mb_strlen( $m[1] ) );
	}
	if ( preg_match( '/^(.+?[市郡](?:.+?区)?|.+?区|.+?[町村])/u', $text, $m ) ) {
		$address['addressLocality'] = $m[1];
		$text                       = mb_substr( $text, mb_strlen( $m[1] ) );
	}
	$address['streetAddress'] = trim( $text );
	return $address;
}
