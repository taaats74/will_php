/**
 * Loading v2(新ローディングアニメーション制御)
 * 作成日: 2026-05-01
 *
 * 全体タイムライン(対応 SCSS: _loading-v2.scss):
 *   0.0 - 1.3s : --logo はロゴふわっと、--line は線が左→右へ伸びる
 *   1.3 - 1.6s : 全体フェードアウト(CSS)
 *   1.6 - 2.4s : ヘッダー & コンテンツが 0.8 秒で同時フェードイン
 *
 * このスクリプトの役割:
 *   1. 1.6 秒後に body へ `appear` クラスを付与
 *      → .loading-container / .header-child-v2 / .sp-header-v5 のフェードインを起動
 *   2. 1.9 秒後に #splash-v2 に display: none を設定
 *      → z-index: 9999999 のスプラッシュ残骸が操作を妨げないように
 *
 * 注意:
 * - #splash-v2 が存在しないページでは早期 return(no-op)
 * - 既存 loading.js (#splash) / loading-child.js (#splash-child) とは
 *   ID が異なるため共存しても干渉しない
 * - vanilla JS(jQuery 非依存)。既存 2 本は jQuery だが新スクリプトは
 *   依存を増やさず将来的な脱 jQuery を見据えた書き方に統一
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var splash = document.getElementById('splash-v2');
    if (!splash) return;

    // 1.6 秒後:CSS フェードアウト完了タイミングで body.appear を付与
    // (CSS の splashV2Hide アニメーションは 1.3s から 0.3s かけて実行される)
    setTimeout(function () {
      document.body.classList.add('appear');
    }, 1600);

    // 1.9 秒後:CSS フェードアウト完了 + 余裕 0.3 秒のあと
    // 完全に DOM フローから外す(visibility: hidden では一部ブラウザで
    // クリックを拾うケースがあるため display: none で確実に消す)
    setTimeout(function () {
      splash.style.display = 'none';
    }, 1900);
  });
})();
