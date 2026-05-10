/**
 * YouTube Facade(クリックされるまで実プレイヤーを読み込まない軽量埋め込み)
 * 作成日: 2026-05-10
 *
 * 対応 HTML:
 *   <div class="yt-facade" data-video-id="..." data-title="...">
 *     <button class="yt-facade__play" aria-label="動画を再生">
 *       <img class="yt-facade__thumb" ...>
 *       <svg class="yt-facade__icon" ...></svg>
 *     </button>
 *   </div>
 * 対応 SCSS: scss/style-template/_page-top3.scss(末尾の YouTube Facade ブロック)
 * 読み込み: functions.php — is_page_template('page-topv3.php') 限定 enqueue
 *
 * 役割: ボタンクリック時に YouTube iframe(?autoplay=1)を生成して .yt-facade と差し替え
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.yt-facade').forEach(function (facade) {
      var button = facade.querySelector('.yt-facade__play');
      if (!button) return;
      button.addEventListener('click', function () {
        var videoId = facade.dataset.videoId;
        var title = facade.dataset.title || 'YouTube video player';
        var iframe = document.createElement('iframe');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/' + videoId + '?autoplay=1');
        iframe.setAttribute('title', title);
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
        iframe.setAttribute('referrerpolicy', 'strict-origin-when-cross-origin');
        iframe.setAttribute('allowfullscreen', '');
        iframe.style.width = '100%';
        iframe.style.height = '100%';
        iframe.style.border = '0';
        facade.replaceWith(iframe);
      }, { once: true });
    });
  });
})();
