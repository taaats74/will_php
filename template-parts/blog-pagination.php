<?php
/**
 * ブログ一覧のページ送り
 *
 * @package will-corp
 */

$will_links = paginate_links( [
	'type'      => 'array',
	'prev_text' => '前へ',
	'next_text' => '次へ',
	'mid_size'  => 1,
] );
if ( ! $will_links ) {
	return;
}
?>
<nav class="blog-pagination" aria-label="ページ送り">
	<ul>
		<?php foreach ( $will_links as $will_link ) : ?>
			<li><?php echo $will_link; // phpcs:ignore WordPress.Security.EscapeOutput -- paginate_links() の出力 ?></li>
		<?php endforeach; ?>
	</ul>
</nav>
