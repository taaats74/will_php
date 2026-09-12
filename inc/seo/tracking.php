<?php
/**
 * 計測タグ：Google Tag Manager / HubSpot
 *
 * テンプレートは <body> の直後で wp_body_open() を呼ぶこと（GTM の noscript 用）。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', function () {
	if ( is_feed() || is_robots() || is_trackback() ) {
		return;
	}
	?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo esc_js( WILL_SEO_GTM_ID ); ?>');</script>
<!-- End Google Tag Manager -->
<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js-na2.hs-scripts.com/<?php echo esc_attr( WILL_SEO_HUBSPOT_PORTAL ); ?>.js"></script>
<!-- End of HubSpot Embed Code -->
	<?php
}, 1 );

add_action( 'wp_body_open', function () {
	?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr( WILL_SEO_GTM_ID ); ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php
} );
