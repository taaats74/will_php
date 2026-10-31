<?php
/**
 * リダイレクト（301）の一覧。サイト全体（コーポレート・ブログ）で使う。
 *
 * このファイルは will-site-system の scripts/redirects/build.py が docs/redirects/redirects.tsv から作る。直接編集しない。
 * 既存の転送処理（inc/blog.php の template_redirect・関連記事リンク、inc/seo/context.php のサイトマップ判定）は
 * 設定値 will_redirects を読む。ここではその設定値に一覧の転送を足す。同じ転送元があれば、この一覧を優先する。
 */

function will_redirects_file_map() {
	return array(
		'/blog/small-business-website-no-inquiries-causes-solutions/' => '/blog/corporate-brochure-website-limitations-and-fixes/', // blog
		'/blog/exhibition-growth-strategy/' => '/blog/exhibition-mail-web-3steps/', // blog
		'/blog/5-structural-problems-common-to-smes-with-underperforming-ec-sites/' => '/blog/common-cause-ec-monthly-sales-plateau/', // blog
		'/blog/webmarketing-comparison/' => '/blog/btob-sme-web-lead-generation-guide/', // blog
		'/blog/webmarketing/' => '/blog/btob-sme-web-lead-generation-guide/', // blog
		'/blog/website-marketing/' => '/blog/btob-sme-web-lead-generation-guide/', // blog
		'/blog/webmarketing-mistake/' => '/blog/btob-sme-web-lead-generation-guide/', // blog
		'/blog/lead-kakutoku-nurturing/' => '/blog/b2b-lead-nurturing-web-marketing-steps/', // blog
		'/blog/subscription-melit-demelit/' => '/blog/service-comparison/', // blog
		'/blog/website-8steps/' => '/blog/sme-homepage-production-guide/', // blog
		'/blog/website-perfect-guide/' => '/blog/sme-homepage-production-guide/', // blog
		'/blog/data-driven-sales-growth-5-core-frameworks/' => '/blog/leads-not-converting-to-opportunities-web-design-3-issues/', // blog
		'/blog/btob-web-sales-structure-5-elements/' => '/blog/leads-not-converting-to-opportunities-web-design-3-issues/', // blog
		'/blog/website-lead-nurturing/' => '/blog/sales-stuck-in-consideration/', // blog
		'/blog/exchange-meeting-website/' => '/blog/trust-website-3points/', // blog
		'/blog/appointment-website/' => '/blog/trust-website-3points/', // blog
		'/blog/btob-web-marketing-basics/' => '/blog/btob-web-marketing-lead-to-deal/', // blog
		'/blog/lead-kakutoku-methods/' => '/blog/btob-lead-kakutoku-guide/', // blog
		'/blog/ec-investment-3-principles-to-shift-revenue-mix-in-3-years/' => '/blog/3-ways-to-turn-ec-into-a-revenue-pillar-for-store-based-businesses/', // blog
		'/blog/3-core-strategies-for-sustainable-ec-growth/' => '/blog/ec-site-vs-ec-business-five-key-differences/', // blog
		'/blog/sp-responsive/' => '/blog/website-price/', // blog
		'/blog/webusite-8points/' => '/blog/website-7checkpoints/', // blog
		'/blog/website-building-wp/' => '/blog/wordpress-6stps/', // blog
		'/blog/choosing-webcorp/' => '/blog/homepage-agency-selection-guide/', // blog
		'/blog/characteristics-of-companies-that-should-consider-ma-implementation/' => '/blog/ma-3points/', // blog
		'/blog/marketing-mail-5points/' => '/blog/marketing-mail-ma/', // blog
		'/blog/website-3steps/' => '/blog/website-inquiry-increase-btob/', // blog
	);
}

add_filter( 'option_will_redirects', function ( $value ) {
	return array_merge( is_array( $value ) ? $value : array(), will_redirects_file_map() );
} );

add_filter( 'default_option_will_redirects', function ( $value ) {
	return array_merge( is_array( $value ) ? $value : array(), will_redirects_file_map() );
} );
