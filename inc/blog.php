<?php
/**
 * ブログ（/blog/）
 *
 * 2026-09 に別WordPress（SWELL）で運用していたブログを本体へ統合した。
 * 検索評価を引き継ぐため、統合前と同じURLを再現する。
 *
 *   ブログのトップ … /blog/                 固定ページ「blog」を投稿ページに設定
 *   記事           … /blog/記事スラッグ/
 *   カテゴリ       … /blog/カテゴリスラッグ/   （「category」を挟まない）
 *   ページ送り     … /blog/page/2/、/blog/カテゴリスラッグ/page/2/（1ページ18件）
 *   フィード       … /blog/feed/
 *
 * 画像は統合前の場所（/blog/wp-content/uploads/）に置いたまま使う。
 * 本体と同じ uploads に移さないのは、本文中の画像URLと Google 画像検索の評価を変えないため。
 *
 * テンプレート：home.php（トップ）/ single.php（記事）/ category.php（カテゴリ）
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

/** 1ページあたりの記事数（統合前のブログと同じ） */
const WILL_BLOG_PER_PAGE = 18;

/** リライトルールを変えたら上げる */
const WILL_BLOG_REWRITE_VERSION = '1';

/* =========================================================================
 * URL
 * ========================================================================= */

add_action( 'init', function () {
	add_rewrite_rule( '^blog/feed/?$', 'index.php?feed=rss2', 'top' );
	add_rewrite_rule( '^blog/([^/]+)/page/?([0-9]{1,})/?$', 'index.php?will_blog_slug=$matches[1]&paged=$matches[2]', 'top' );
	add_rewrite_rule( '^blog/(?!page/|feed/)([^/]+)/?$', 'index.php?will_blog_slug=$matches[1]', 'top' );

	if ( get_option( 'will_blog_rewrite_version' ) !== WILL_BLOG_REWRITE_VERSION || get_option( 'will_rewrite_flush_needed' ) ) {
		flush_rewrite_rules( false );
		update_option( 'will_blog_rewrite_version', WILL_BLOG_REWRITE_VERSION );
		delete_option( 'will_rewrite_flush_needed' );
	}
}, 30 );

add_filter( 'query_vars', function ( $vars ) {
	$vars[] = 'will_blog_slug';
	return $vars;
} );

/**
 * /blog/◯◯/ がカテゴリか記事かを判定する（どちらも同じ形のURLのため）
 */
add_filter( 'request', function ( $vars ) {
	if ( empty( $vars['will_blog_slug'] ) ) {
		return $vars;
	}
	$slug = sanitize_title( urldecode( $vars['will_blog_slug'] ) );
	unset( $vars['will_blog_slug'] );

	$term = get_term_by( 'slug', $slug, 'category' );
	if ( $term ) {
		$vars['category_name'] = $term->slug;
	} else {
		$vars['name']      = $slug;
		$vars['post_type'] = 'post';
	}
	return $vars;
} );

add_filter( 'post_link', function ( $link, $post ) {
	return in_array( $post->post_status, [ 'publish', 'private', 'future' ], true ) && $post->post_name
		? home_url( '/blog/' . $post->post_name . '/' )
		: $link;
}, 10, 2 );

add_filter( 'term_link', function ( $link, $term, $taxonomy ) {
	return 'category' === $taxonomy ? home_url( '/blog/' . $term->slug . '/' ) : $link;
}, 10, 3 );

// 1ページあたりの件数
add_action( 'pre_get_posts', function ( WP_Query $query ) {
	if ( ! is_admin() && $query->is_main_query() && ( $query->is_home() || $query->is_category() ) ) {
		$query->set( 'posts_per_page', WILL_BLOG_PER_PAGE );
	}
} );

/* =========================================================================
 * リダイレクト（統合前のブログで設定していたもの。option「will_redirects」：旧パス → 新パス）
 * ========================================================================= */

add_action( 'template_redirect', function () {
	$redirects = get_option( 'will_redirects', [] );
	if ( ! is_array( $redirects ) || ! $redirects ) {
		return;
	}
	$home_path = untrailingslashit( (string) wp_parse_url( home_url(), PHP_URL_PATH ) );
	$path      = (string) wp_parse_url( rawurldecode( $_SERVER['REQUEST_URI'] ?? '' ), PHP_URL_PATH ); // phpcs:ignore
	$path      = trailingslashit( '/' . ltrim( substr( $path, strlen( $home_path ) ), '/' ) );
	if ( isset( $redirects[ $path ] ) ) {
		$to = $redirects[ $path ];
		wp_safe_redirect( preg_match( '#^https?://#', $to ) ? $to : home_url( $to ), 301 );
		exit;
	}
}, 1 );

/* =========================================================================
 * 画像（統合前の /blog/wp-content/uploads/ を使う）
 * ========================================================================= */

function will_blog_is_legacy_upload( $attachment_id ) {
	return (bool) get_post_meta( $attachment_id, '_will_blog_upload', true );
}

add_filter( 'wp_get_attachment_url', function ( $url, $attachment_id ) {
	if ( ! will_blog_is_legacy_upload( $attachment_id ) ) {
		return $url;
	}
	$file = get_post_meta( $attachment_id, '_wp_attached_file', true );
	return $file ? home_url( '/blog/wp-content/uploads/' . $file ) : $url;
}, 10, 2 );

add_filter( 'get_attached_file', function ( $file, $attachment_id ) {
	if ( ! will_blog_is_legacy_upload( $attachment_id ) ) {
		return $file;
	}
	$relative = get_post_meta( $attachment_id, '_wp_attached_file', true );
	return $relative ? ABSPATH . 'blog/wp-content/uploads/' . $relative : $file;
}, 10, 2 );

// srcset は本体の uploads を基準に作られるため、統合前の場所に置き換える
add_filter( 'wp_calculate_image_srcset', function ( $sources, $size_array, $image_src, $image_meta, $attachment_id ) {
	if ( ! will_blog_is_legacy_upload( $attachment_id ) || ! is_array( $sources ) ) {
		return $sources;
	}
	$from = trailingslashit( wp_get_upload_dir()['baseurl'] );
	$to   = home_url( '/blog/wp-content/uploads/' );
	foreach ( $sources as &$source ) {
		$source['url'] = str_replace( $from, $to, $source['url'] );
	}
	return $sources;
}, 10, 5 );

// 記事本文に手書きされた構造化データは出さない（FAQ などは本文から自動生成しており、二重になるため）
add_filter( 'the_content', function ( $content ) {
	return 'post' === get_post_type() ? preg_replace( '#<script type=["\']application/ld\+json["\']>.*?</script>#is', '', $content ) : $content;
}, 5 );

/* =========================================================================
 * 記事内のリンクカード [post_link id="…"]
 * 統合前のブログ（SWELL）のショートコード。id は統合前の記事ID（移行時の対応表で引き当てる）。
 * 段落の中に書かれているため、HTMLとして正しくなるよう span で組む。
 * ========================================================================= */

add_shortcode( 'post_link', function ( $atts ) {
	$atts      = shortcode_atts( [ 'id' => 0 ], $atts, 'post_link' );
	$map       = get_option( 'will_blog_migration', [] );
	$target_id = (int) ( $map['posts'][ (int) $atts['id'] ] ?? 0 );
	$target    = $target_id ? get_post( $target_id ) : null;
	if ( ! $target || 'publish' !== $target->post_status ) {
		return '';
	}

	// 転送設定のある旧記事を指している場合は、転送先に直接リンクする
	$url       = get_permalink( $target );
	$redirects = get_option( 'will_redirects', [] );
	$path      = (string) wp_parse_url( $url, PHP_URL_PATH );
	$home_path = untrailingslashit( (string) wp_parse_url( home_url(), PHP_URL_PATH ) );
	$relative  = substr( $path, strlen( $home_path ) );
	if ( is_array( $redirects ) && isset( $redirects[ $relative ] ) ) {
		$redirected = url_to_postid( home_url( $redirects[ $relative ] ) );
		if ( $redirected ) {
			$target = get_post( $redirected );
			$url    = get_permalink( $target );
		}
	}

	$excerpt = will_seo_post_description( $target->ID );
	$excerpt = mb_strlen( $excerpt ) > 70 ? mb_substr( $excerpt, 0, 70 ) . '…' : $excerpt;
	$thumb   = get_the_post_thumbnail( $target, 'medium', [ 'loading' => 'lazy', 'decoding' => 'async', 'alt' => '' ] );

	return sprintf(
		'<span class="blog-linkcard"><a class="blog-linkcard__link" href="%s">%s<span class="blog-linkcard__body"><span class="blog-linkcard__caption">あわせて読みたい</span><span class="blog-linkcard__title">%s</span><span class="blog-linkcard__excerpt">%s</span></span></a></span>',
		esc_url( $url ),
		$thumb ? '<span class="blog-linkcard__thumb">' . $thumb . '</span>' : '',
		esc_html( get_the_title( $target ) ),
		esc_html( $excerpt )
	);
} );

/* =========================================================================
 * 表示用の部品
 * ========================================================================= */

add_action( 'wp_enqueue_scripts', function () {
	if ( is_home() || is_category() || is_singular( 'post' ) ) {
		$path = get_template_directory() . '/blog-assets/blog.css';
		wp_enqueue_style( 'will-blog', get_template_directory_uri() . '/blog-assets/blog.css', [ 'style_css' ], filemtime( $path ) );
	}
} );

/**
 * 記事の主カテゴリ（最初のカテゴリ）
 */
function will_blog_primary_category( $post = null ) {
	$cats = get_the_category( $post );
	return $cats ? $cats[0] : null;
}

/**
 * 目次。h2・h3 に id を付け（無いものだけ）、目次の HTML と書き換えた本文を返す
 *
 * @return array{toc:string, content:string}
 */
function will_blog_toc( $content ) {
	$items = [];
	$used  = [];
	$index = 0;
	$content = preg_replace_callback( '#<(h[23])([^>]*)>(.*?)</\1>#is', function ( $m ) use ( &$items, &$used, &$index ) {
		$text = trim( wp_strip_all_tags( $m[3] ) );
		if ( '' === $text ) {
			return $m[0];
		}
		$attrs = $m[2];
		if ( preg_match( '/\sid=["\']([^"\']+)["\']/', $attrs, $id ) ) {
			$anchor = $id[1];
		} else {
			$anchor = 'toc-' . ( ++$index );
			$attrs .= ' id="' . $anchor . '"';
		}
		$used[]  = $anchor;
		$items[] = [ strtolower( $m[1] ), $anchor, $text ];
		return '<' . $m[1] . $attrs . '>' . $m[3] . '</' . $m[1] . '>';
	}, $content );

	if ( count( array_filter( $items, function ( $item ) {
		return 'h2' === $item[0];
	} ) ) < 2 ) {
		return [ 'toc' => '', 'content' => $content ];
	}

	$html  = '<nav class="blog-toc" aria-label="目次"><p class="blog-toc__title">目次</p><ol class="blog-toc__list">';
	$open  = false;
	foreach ( $items as $i => $item ) {
		if ( 'h2' === $item[0] ) {
			if ( $open ) {
				$html .= '</ol>';
				$open  = false;
			}
			$html .= ( $i ? '</li>' : '' ) . '<li><a href="#' . esc_attr( $item[1] ) . '">' . esc_html( $item[2] ) . '</a>';
		} else {
			if ( ! $open ) {
				$html .= '<ol>';
				$open  = true;
			}
			$html .= '<li><a href="#' . esc_attr( $item[1] ) . '">' . esc_html( $item[2] ) . '</a></li>';
		}
	}
	$html .= ( $open ? '</ol>' : '' ) . '</li></ol></nav>';
	return [ 'toc' => $html, 'content' => $content ];
}

/**
 * 関連記事（同じカテゴリの新しい記事）
 *
 * @return WP_Post[]
 */
function will_blog_related_posts( $post, $count = 3 ) {
	$cat = will_blog_primary_category( $post );
	if ( ! $cat ) {
		return [];
	}
	return get_posts( [
		'category__in'   => [ $cat->term_id ],
		'post__not_in'   => [ $post->ID ],
		'posts_per_page' => $count,
		'no_found_rows'  => true,
	] );
}

/**
 * 記事下のCTA。本文にCTA（<section id="cta-…">）が無い記事にだけ出す。
 * 無料診断への導線は本文冒頭と追従バナーにあるため、ここでは無料相談とカテゴリに合うサービスを案内する。
 * （キーはカテゴリのスラッグを decode した文字列）
 */
function will_blog_cta( $post ) {
	if ( preg_match( '/<section[^>]+id=["\']cta-/i', $post->post_content ) ) {
		return '';
	}
	$services = [
		'website'       => [ 'ウィルサポ｜BtoB企業のためのサブスク型ホームページ制作', '/willsupport/' ],
		'ecサイト'      => [ 'ウィルサポEC｜月額制のECサイト構築・運用', '/will-support-ec/' ],
		'sns'           => [ 'Instagram構築・運用支援', '/service/instagram-support/' ],
		'web-marketing' => [ 'ウィルグロー｜BtoBマーケティングの伴走支援', '/willgrow/' ],
		'btob戦略設計'  => [ 'ウィルグロー｜BtoBマーケティングの伴走支援', '/willgrow/' ],
	];
	$cat     = will_blog_primary_category( $post );
	$service = $cat ? ( $services[ urldecode( $cat->slug ) ] ?? null ) : null;

	ob_start();
	?>
	<aside class="blog-cta" aria-label="ご相談の案内">
		<p class="blog-cta__title">記事の内容を、貴社に当てはめて整理しませんか</p>
		<p class="blog-cta__text">ホームページとBtoBマーケティングについて、何から手をつけるべきかをオンラインの無料相談で一緒に整理します。</p>
		<div class="blog-cta__buttons">
			<a class="blog-cta__button blog-cta__button--primary" href="<?php echo esc_url( home_url( '/btob-marketing-consultation/' ) ); ?>">無料相談の詳細を見る</a>
			<?php if ( $service ) : ?>
				<a class="blog-cta__button" href="<?php echo esc_url( home_url( $service[1] ) ); ?>"><?php echo esc_html( $service[0] ); ?></a>
			<?php endif; ?>
		</div>
	</aside>
	<?php
	return ob_get_clean();
}

/**
 * 追従バナー（無料相談LPへの案内）。内容はコーポレートサイトのトップの追従バナーと同じ。
 * PC：画面右下のカード／SP：画面下のバー。× で閉じるとそのタブを開いている間は出さない。
 */
add_action( 'wp_footer', function () {
	if ( ! ( is_home() || is_category() || is_singular( 'post' ) ) ) {
		return;
	}
	$url = home_url( '/btob-marketing-consultation/' );
	?>
	<aside class="blog-float" id="blog-float" aria-label="無料診断のご案内" hidden>
		<button type="button" class="blog-float__close" aria-label="バナーを閉じる">
			<svg viewBox="0 0 14 14" fill="none" aria-hidden="true" focusable="false"><path d="M1.5 1.5l11 11M12.5 1.5l-11 11" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
		</button>
		<p class="blog-float__title">10問に答えるだけ。<br>無料でレポートをお送りします</p>
		<p class="blog-float__text">所要時間は約1分です。ホームページへの集客、サイト内の導線、問い合わせの受け皿という3点を見て、どこに手をつけるべきかをまとめます。</p>
		<ul class="blog-float__features">
			<li>全10問</li>
			<li>約1分</li>
			<li>費用なし</li>
		</ul>
		<a href="<?php echo esc_url( $url ); ?>" class="blog-float__btn">無料診断を試す（約1分）</a>
	</aside>
	<script>
	(function () {
		var banner = document.getElementById('blog-float');
		if (!banner) return;
		try { if (sessionStorage.getItem('willBlogFloatClosed')) return; } catch (e) {}
		// 記事の見出しを読み終えるまでは出さない（少しスクロールしたら表示）
		var show = function () {
			if (window.scrollY > 400) {
				banner.hidden = false;
				window.removeEventListener('scroll', show);
			}
		};
		window.addEventListener('scroll', show, { passive: true });
		show();
		banner.querySelector('.blog-float__close').addEventListener('click', function () {
			banner.hidden = true;
			try { sessionStorage.setItem('willBlogFloatClosed', '1'); } catch (e) {}
		});
	})();
	</script>
	<?php
} );

/**
 * 記事カード（一覧・関連記事で共通）
 */
function will_blog_card( $post ) {
	$cat = will_blog_primary_category( $post );
	?>
	<article class="blog-card">
		<a class="blog-card__link" href="<?php echo esc_url( get_permalink( $post ) ); ?>">
			<div class="blog-card__thumb">
				<?php
				if ( has_post_thumbnail( $post ) ) {
					echo get_the_post_thumbnail( $post, 'medium_large', [
						'loading'  => 'lazy',
						'decoding' => 'async',
						'sizes'    => '(max-width: 768px) 90vw, 33vw',
						'alt'      => '',
					] );
				}
				?>
			</div>
			<div class="blog-card__body">
				<p class="blog-card__meta">
					<?php if ( $cat ) : ?>
						<span class="blog-card__cat"><?php echo esc_html( $cat->name ); ?></span>
					<?php endif; ?>
					<time datetime="<?php echo esc_attr( get_the_date( 'c', $post ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d', $post ) ); ?></time>
				</p>
				<h3 class="blog-card__title"><?php echo esc_html( get_the_title( $post ) ); ?></h3>
			</div>
		</a>
	</article>
	<?php
}

/**
 * カテゴリの切り替えリンク
 */
function will_blog_category_nav( $current_id = 0 ) {
	$cats = get_categories( [ 'hide_empty' => true, 'exclude' => [ (int) get_option( 'default_category' ) ] ] );
	if ( ! $cats ) {
		return;
	}
	echo '<nav class="blog-cats" aria-label="カテゴリ"><ul>';
	printf( '<li><a href="%s"%s>すべて</a></li>', esc_url( get_permalink( get_option( 'page_for_posts' ) ) ), $current_id ? '' : ' aria-current="page"' );
	foreach ( $cats as $cat ) {
		printf(
			'<li><a href="%s"%s>%s<span>%d</span></a></li>',
			esc_url( get_term_link( $cat ) ),
			$current_id === $cat->term_id ? ' aria-current="page"' : '',
			esc_html( $cat->name ),
			(int) $cat->count
		);
	}
	echo '</ul></nav>';
}
