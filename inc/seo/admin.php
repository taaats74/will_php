<?php
/**
 * 編集画面の「SEO設定」
 *
 * 入力値は投稿メタ WILL_SEO_META_KEY（Slim SEO 時代と同じキー）に配列で保存する。
 * 未入力の項目は自動で決まる（title：ページ名 ｜ サイト名、description：抜粋→本文、画像：アイキャッチ→既定画像）。
 *
 * @package will-corp
 */

defined( 'ABSPATH' ) || exit;

function will_seo_admin_post_types() {
	return array_values( array_diff( get_post_types( [ 'public' => true ] ), [ 'attachment' ] ) );
}

add_action( 'add_meta_boxes', function () {
	add_meta_box( 'will-seo', 'SEO設定', 'will_seo_render_meta_box', will_seo_admin_post_types(), 'normal', 'high' );
} );

function will_seo_render_meta_box( WP_Post $post ) {
	$meta = will_seo_meta( $post->ID );
	$val  = function ( $key ) use ( $meta ) {
		return isset( $meta[ $key ] ) ? (string) $meta[ $key ] : '';
	};
	$default_title = get_the_title( $post ) . ' ' . WILL_SEO_TITLE_SEPARATOR . ' ' . get_bloginfo( 'name' );
	$auto_desc     = empty( $meta['description'] ) ? will_seo_post_description( $post->ID ) : '';
	wp_nonce_field( 'will_seo_save', 'will_seo_nonce' );
	?>
	<style>
		.will-seo-field { margin: 0 0 16px; }
		.will-seo-field label { display: block; font-weight: 600; margin-bottom: 4px; }
		.will-seo-field input[type=text], .will-seo-field input[type=url], .will-seo-field textarea { width: 100%; }
		.will-seo-count { color: #646970; font-size: 12px; }
		.will-seo-count.is-over { color: #d63638; }
		.will-seo-image { display: flex; gap: 8px; }
	</style>
	<div class="will-seo-field">
		<label for="will-seo-title">タイトル</label>
		<input type="text" id="will-seo-title" name="will_seo[title]" value="<?php echo esc_attr( $val( 'title' ) ); ?>" placeholder="<?php echo esc_attr( $default_title ); ?>" data-limit="40">
		<p class="will-seo-count" data-for="will-seo-title"></p>
	</div>
	<div class="will-seo-field">
		<label for="will-seo-description">ディスクリプション</label>
		<textarea id="will-seo-description" name="will_seo[description]" rows="4" placeholder="<?php echo esc_attr( $auto_desc ? '未入力のため自動生成：' . $auto_desc : '' ); ?>" data-limit="160"><?php echo esc_textarea( $val( 'description' ) ); ?></textarea>
		<p class="will-seo-count" data-for="will-seo-description"></p>
		<p class="description">検索結果・SNSの説明文に加え、構造化データ（サービス・資料の説明）と llms.txt にも使われます。</p>
	</div>
	<div class="will-seo-field">
		<label for="will-seo-image">OGP画像（1200×630 推奨）</label>
		<div class="will-seo-image">
			<input type="url" id="will-seo-image" name="will_seo[facebook_image]" value="<?php echo esc_attr( $val( 'facebook_image' ) ); ?>" placeholder="未設定時はアイキャッチ画像 → サイト既定の画像">
			<button type="button" class="button" id="will-seo-image-select">画像を選択</button>
		</div>
	</div>
	<div class="will-seo-field">
		<label for="will-seo-canonical">正規URL（canonical）</label>
		<input type="url" id="will-seo-canonical" name="will_seo[canonical]" value="<?php echo esc_attr( $val( 'canonical' ) ); ?>" placeholder="<?php echo esc_attr( get_permalink( $post ) ); ?>">
		<p class="description">内容が重複する別ページを正とする場合のみ入力します。</p>
	</div>
	<div class="will-seo-field">
		<label><input type="checkbox" name="will_seo[noindex]" value="1" <?php checked( ! empty( $meta['noindex'] ) ); ?>> 検索エンジンに表示しない（noindex）</label>
	</div>
	<script>
	(function () {
		document.querySelectorAll('.will-seo-count').forEach(function (out) {
			var input = document.getElementById(out.dataset.for);
			var limit = +input.dataset.limit;
			var update = function () {
				var n = input.value.length;
				out.textContent = n + ' 文字（目安 ' + limit + ' 文字以内）';
				out.classList.toggle('is-over', n > limit);
			};
			input.addEventListener('input', update);
			update();
		});
		var button = document.getElementById('will-seo-image-select');
		button && button.addEventListener('click', function () {
			var frame = wp.media({ title: 'OGP画像を選択', library: { type: 'image' }, multiple: false });
			frame.on('select', function () {
				document.getElementById('will-seo-image').value = frame.state().get('selection').first().toJSON().url;
			});
			frame.open();
		});
	})();
	</script>
	<?php
}

add_action( 'admin_enqueue_scripts', function ( $hook ) {
	if ( in_array( $hook, [ 'post.php', 'post-new.php' ], true ) ) {
		wp_enqueue_media();
	}
} );

add_action( 'save_post', function ( $post_id, $post ) {
	if ( ! isset( $_POST['will_seo_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['will_seo_nonce'] ), 'will_seo_save' ) ) {
		return;
	}
	if ( wp_is_post_revision( $post_id ) || wp_is_post_autosave( $post_id ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( ! in_array( $post->post_type, will_seo_admin_post_types(), true ) ) {
		return;
	}

	$input = isset( $_POST['will_seo'] ) ? wp_unslash( (array) $_POST['will_seo'] ) : [];
	$meta  = will_seo_meta( $post_id );

	$meta['title']          = sanitize_text_field( $input['title'] ?? '' );
	$meta['description']    = sanitize_textarea_field( $input['description'] ?? '' );
	$meta['facebook_image'] = esc_url_raw( $input['facebook_image'] ?? '' );
	$meta['canonical']      = esc_url_raw( $input['canonical'] ?? '' );
	$meta['noindex']        = empty( $input['noindex'] ) ? 0 : 1;
	// X 用の画像は OGP 画像に一本化する（X は og:image を読む）
	unset( $meta['twitter_image'] );

	$meta = array_filter( $meta );
	if ( $meta ) {
		update_post_meta( $post_id, WILL_SEO_META_KEY, $meta );
	} else {
		delete_post_meta( $post_id, WILL_SEO_META_KEY );
	}
}, 10, 2 );
