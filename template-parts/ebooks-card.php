<?php
/**
 * 資料(ebooks)カード共通パーツ
 *
 * archive-ebooks.php / single-ebooks.php 関連資料セクションから利用する。
 *
 * 呼び出し例:
 *   get_template_part( 'template-parts/ebooks-card', null, [ 'post_id' => $rid ] );
 *
 * 受け取る args:
 *   - post_id (int 必須):描画対象の ebooks 投稿 ID
 *
 * 出力:
 *   .ebooks-card > .ebooks-card__link
 *     - .ebooks-card__thumb(srcset付き画像 or プレースホルダ + 任意のページ数バッジ)
 *     - .ebooks-card__body(テーマタクソノミー / タイトル / サブタイトル / CTA)
 *
 * @package will-corp
 */

$post_id = isset( $args['post_id'] ) ? (int) $args['post_id'] : 0;
if ( ! $post_id ) {
  return;
}

$title     = get_the_title( $post_id );
$permalink = get_permalink( $post_id );
$thumb_id  = get_post_thumbnail_id( $post_id );
$subtitle  = get_post_meta( $post_id, 'dl_subtitle', true );
$pages     = get_post_meta( $post_id, 'dl_page_count', true );
$themes    = get_the_terms( $post_id, 'ebook_theme' );
?>
<article class="ebooks-card">
  <a href="<?php echo esc_url( $permalink ); ?>" class="ebooks-card__link">
    <div class="ebooks-card__thumb">
      <?php if ( $thumb_id ) : ?>
        <?php
          // srcset 自動付与:WP が登録済みの全サイズ(300/768/1024/1536/2048w)から
          // ブラウザが DPR / 表示サイズに最適なものを選択する。
          // sizes:SP(≤768)はカードがほぼ全幅 → 90vw、PC は 3カラムで ≈ 33vw。
          echo wp_get_attachment_image( $thumb_id, 'large', false, [
            'alt'      => $title,
            'loading'  => 'lazy',
            'decoding' => 'async',
            'sizes'    => '(max-width: 768px) 90vw, 33vw',
          ] );
        ?>
      <?php else : ?>
        <div class="ebooks-card__thumb-placeholder">
          <span>EBOOK</span>
        </div>
      <?php endif; ?>
      <?php if ( $pages ) : ?>
        <span class="ebooks-card__pages"><?php echo esc_html( $pages ); ?>P</span>
      <?php endif; ?>
    </div>
    <div class="ebooks-card__body">
      <?php if ( ! empty( $themes ) && ! is_wp_error( $themes ) ) : ?>
        <ul class="ebooks-card__themes">
          <?php foreach ( $themes as $theme ) : ?>
            <li><?php echo esc_html( $theme->name ); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <h3 class="ebooks-card__title"><?php echo esc_html( $title ); ?></h3>
      <?php if ( $subtitle ) : ?>
        <p class="ebooks-card__subtitle"><?php echo esc_html( $subtitle ); ?></p>
      <?php endif; ?>
      <span class="ebooks-card__cta">
        資料をダウンロード
        <span class="ebooks-card__cta-arrow" aria-hidden="true">→</span>
      </span>
    </div>
  </a>
</article>
