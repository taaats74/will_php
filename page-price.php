<?php
  /*
  Template Name: Price
  Template Post Type: page
  */
?>

<?php
/* ============================================================
   料金改定 自動切替（/price/ ウィルサポ サブスクHP のみ）
   - 本文はDB（ページID21）にあるため the_content フィルタで変換
   - 2026-08-01 00:00 JST 以降：スタート削除・30,000/40,000/50,000・初期費用100,000円・税抜注記
   - 他サービス（集客サポート等）や 9,800円〜（別サービス）は変更しない
   ============================================================ */
if ( ! function_exists( 'will_price_revised_content' ) ) {
  function will_price_revised_content( $content ) {
    if ( get_the_ID() !== 21 ) { return $content; }
    // プレビュー用：?ws_preview=after で改定後、?ws_preview=before で現行を強制表示（確認用・後で削除可）
    $ws_revised = ( current_time( 'timestamp' ) >= strtotime( '2026-08-01 00:00:00' ) );
    if ( isset( $_GET['ws_preview'] ) ) { $ws_revised = ( $_GET['ws_preview'] === 'after' ); }
    if ( ! $ws_revised ) { return $content; }
    $pattern = '/(<h2 class="price-header"><span>ウ<\/span>ィルサポ サブスクHP<\/h2>.*?)(<div class="service double">)/s';
    return preg_replace_callback( $pattern, function ( $m ) {
      $block = $m[1];
      // スタートプラン（box-wrapper web の最初の box）を削除
      $block = preg_replace( '/(<div class="box-wrapper web">\s*)<div class="box">.*?(?=<div class="box">)/s', '$1', $block, 1 );
      // 残プラン価格を改定（「円/月」はウィルサポ節に固有）
      $block = str_replace( '<span>19,800</span>円/月', '<span>30,000</span>円/月', $block );
      $block = str_replace( '<span>29,800</span>円/月', '<span>40,000</span>円/月', $block );
      $block = str_replace( '<span>39,800</span>円/月', '<span>50,000</span>円/月', $block );
      // 番号 02→01, 03→02, 04→03
      $block = preg_replace( '/<p>02<\/p>/', '<p>01</p>', $block, 1 );
      $block = preg_replace( '/<p>03<\/p>/', '<p>02</p>', $block, 1 );
      $block = preg_replace( '/<p>04<\/p>/', '<p>03</p>', $block, 1 );
      // 初期費用・税抜注記を「費用例」直後に挿入
      $note = '<p class="ex">費用例</p>'
            . "\n" . '            <p class="price-initial">初期費用 <span>100,000</span>円（税抜）</p>'
            . "\n" . '            <p class="price-taxnote">※表示価格はすべて税抜です。別途、消費税を申し受けます。</p>';
      $block = preg_replace( '/<p class="ex">費用例<\/p>/', $note, $block, 1 );
      return $block . $m[2];
    }, $content );
  }
  add_filter( 'the_content', 'will_price_revised_content', 9 );
}
?>

<?php get_header(); ?>

<?php
get_template_part( 'template-parts/page-hero', null, [
  'en'    => 'PRICE',
  'title' => '料金プラン',
  'lead'  => '事業フェーズに合わせた、無理のない料金体系。',
] );
?>

  <?php
    if(have_posts()):
    while(have_posts()): the_post();
  ?>
  <?php the_content(); ?>
  <?php
    endwhile;
  endif;
  ?>


<?php get_footer(); ?>
