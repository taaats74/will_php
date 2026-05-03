<?php
/**
 * Page Hero(下層ページ共通ヒーロー)
 * 作成日: 2026-05-01
 * 対応SCSS: scss/style-template/_page-hero.scss
 *
 * 使い方:
 *   get_template_part( 'template-parts/page-hero', null, [
 *     'en'    => 'ABOUT',                                    // 英語ラベル(必須)
 *     'title' => 'ウィルについて',                            // 日本語タイトル(必須)
 *     'lead'  => '福岡から、BtoB中小企業の営業基盤を設計する。', // リード(任意・<br> 可)
 *     'badge' => '',                                         // バッジ(任意・Phase 1 では未使用)
 *   ] );
 *
 * 出力 HTML:
 *   <section class="page-hero">
 *     <div class="page-hero__inner">
 *       <p class="page-hero__en">…</p>
 *       <h1 class="page-hero__title">…</h1>
 *       <p class="page-hero__lead">…</p>
 *       <p class="page-hero__badge">…</p>  <!-- 引数指定時のみ -->
 *     </div>
 *   </section>
 *
 * セキュリティ:
 * - en:esc_html(プレーンテキストのみ)
 * - title:wp_kses で <br class> のみ許可(SP/PC 切替の改行用)
 * - lead:wp_kses で <br class> のみ許可(SP/PC 切替の改行用)
 * - badge:wp_kses で <strong> / <br> 許可(件数強調用)
 */

$ph_en    = isset( $args['en'] )    ? (string) $args['en']    : '';
$ph_title = isset( $args['title'] ) ? (string) $args['title'] : '';
$ph_lead  = isset( $args['lead'] )  ? (string) $args['lead']  : '';
$ph_badge = isset( $args['badge'] ) ? (string) $args['badge'] : '';
?>
<section class="page-hero">
  <div class="page-hero__inner">

    <?php if ( $ph_en ) : ?>
      <p class="page-hero__en"><?php echo esc_html( $ph_en ); ?></p>
    <?php endif; ?>

    <?php if ( $ph_title ) : ?>
      <h1 class="page-hero__title"><?php echo wp_kses( $ph_title, [ 'br' => [ 'class' => true ] ] ); ?></h1>
    <?php endif; ?>

    <?php if ( $ph_lead ) : ?>
      <p class="page-hero__lead"><?php echo wp_kses( $ph_lead, [ 'br' => [ 'class' => true ] ] ); ?></p>
    <?php endif; ?>

    <?php if ( $ph_badge ) : ?>
      <p class="page-hero__badge"><?php echo wp_kses( $ph_badge, [ 'strong' => [], 'br' => [] ] ); ?></p>
    <?php endif; ?>

  </div>
</section>
