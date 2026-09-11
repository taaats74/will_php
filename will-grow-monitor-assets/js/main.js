/*!
 * ウィルグロー 先行導入企業募集ページ（wgm-）
 * ヘッダーのハンバーガー（1024px 未満）とドロワーの開閉。
 * 追従CTA：FV の CTA が画面外に出たら表示し、最終CTA（11）が画面内に入ったら非表示。
 *          IntersectionObserver のみで判定する（スクロールイベントは使わない）。
 *          PC の右下カードは × で閉じられる。閉じたあとは再表示しない。
 * FAQ：ウィルグローLP v2 と同じ挙動（1つ開いたら他を閉じる。開閉自体は <details> のネイティブ）。
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    /* --- ヘッダーのハンバーガー（1024px 未満） --- */
    var burger = document.getElementById('wgmBurger');
    var drawer = document.getElementById('wgmDrawer');

    if (burger && drawer) {
      var setMenu = function (open) {
        drawer.classList.toggle('is-open', open);
        burger.classList.toggle('is-open', open);
        burger.setAttribute('aria-expanded', open ? 'true' : 'false');
        burger.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
      };

      burger.addEventListener('click', function () {
        setMenu(!drawer.classList.contains('is-open'));
      });

      Array.prototype.forEach.call(drawer.querySelectorAll('a'), function (a) {
        a.addEventListener('click', function () { setMenu(false); });
      });

      document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') { setMenu(false); }
      });
    }

    /* --- 追従CTA --- */
    var sticky = document.getElementById('wgmSticky');
    var stickyClose = document.getElementById('wgmStickyClose');
    var fvCta = document.getElementById('wgmFvCta');
    var finalSection = document.getElementById('wgm-cta');

    if (!sticky || !fvCta || !('IntersectionObserver' in window)) { return; }

    var fvPassed = false; // FV の CTA が画面外に出たか
    var atFinal = false;  // 最終CTA が画面内にあるか
    var closed = false;   // 閉じるボタンで消したか（以後スクロールしても出さない）

    var render = function () {
      if (closed) { return; }
      sticky.classList.toggle('is-visible', fvPassed && !atFinal);
    };

    // 閉じるボタン：以後このページを読み込み直すまで表示しない
    if (stickyClose) {
      stickyClose.addEventListener('click', function () {
        closed = true;
        sticky.classList.add('is-closed');
        sticky.classList.remove('is-visible');
      });
    }

    new IntersectionObserver(function (entries) {
      var e = entries[0];
      // 「画面外」は上に流れた場合だけ。まだ下にある（初期表示で折り返しの下）ときは出さない
      fvPassed = !e.isIntersecting && e.boundingClientRect.top < 0;
      render();
    }, { threshold: 0 }).observe(fvCta);

    if (finalSection) {
      new IntersectionObserver(function (entries) {
        atFinal = entries[0].isIntersecting;
        render();
      }, { threshold: 0 }).observe(finalSection);
    }
  });

  /* --- FAQ アコーディオン ---------------------------------------------
     開閉は <details> のまま、高さを 300ms でアニメーションさせる
     （ウィルサポ LP の .wsv2-faq__item と同じ方式）。
     加えて、v2 と同じく「1つ開いたら他を閉じる」。閉じる側もアニメーションする。
     Web Animations API が使えない環境では、ネイティブの開閉にフォールバックする。
     -------------------------------------------------------------------- */
  document.addEventListener('DOMContentLoaded', function () {
    var items = Array.prototype.slice.call(document.querySelectorAll('.wg2-faq__item'));
    if (!items.length) { return; }

    var DURATION = 300;
    var EASING = 'ease';

    // WAAPI が無い環境：ネイティブ開閉のまま、他を閉じるだけにする
    if (typeof items[0].animate !== 'function') {
      items.forEach(function (item) {
        item.addEventListener('toggle', function () {
          if (!item.open) { return; }
          items.forEach(function (other) {
            if (other !== item) { other.open = false; }
          });
        });
      });
      return;
    }

    var controllers = [];

    items.forEach(function (item) {
      var summary = item.querySelector('summary');
      var answer = item.querySelector('.wg2-faq__a');
      if (!summary || !answer) { return; }

      var animation = null;
      var isClosing = false;
      var isExpanding = false;

      var finish = function (open) {
        item.open = open;
        animation = null;
        isClosing = false;
        isExpanding = false;
        item.style.height = '';
        item.style.overflow = '';
      };

      var animate = function (startHeight, endHeight, openState) {
        if (animation) { animation.cancel(); }

        var current = item.animate(
          { height: [ startHeight, endHeight ] },
          { duration: DURATION, easing: EASING }
        );
        var settled = false;

        animation = current;

        var settle = function () {
          if (settled || animation !== current) { return; }
          settled = true;
          finish(openState);
        };

        current.onfinish = settle;
        current.oncancel = function () {
          settled = true;
          isClosing = false;
          isExpanding = false;
        };

        // onfinish が届かない環境でも高さと open 状態を確定させる保険
        window.setTimeout(settle, DURATION + 80);
      };

      var shrink = function () {
        if (!item.open || isClosing) { return; }
        isClosing = true;
        item.style.overflow = 'hidden';
        animate(item.offsetHeight + 'px', summary.offsetHeight + 'px', false);
      };

      var expand = function () {
        isExpanding = true;
        animate(item.offsetHeight + 'px', (summary.offsetHeight + answer.offsetHeight) + 'px', true);
      };

      var open = function () {
        item.style.overflow = 'hidden';
        item.style.height = item.offsetHeight + 'px';
        item.open = true;

        // 次フレームで展開する。rAF が来ない環境（バックグラウンドタブ等）でも
        // 開いたまま畳まれた状態にならないよう、タイマーでも保険をかける
        var started = false;
        var start = function () {
          if (started) { return; }
          started = true;
          expand();
        };
        window.requestAnimationFrame(start);
        window.setTimeout(start, 60);
      };

      summary.addEventListener('click', function (e) {
        e.preventDefault();

        if (isClosing || !item.open) {
          // 先に他を閉じてから開く
          controllers.forEach(function (other) {
            if (other.item !== item) { other.shrink(); }
          });
          open();
        } else {
          shrink();
        }
      });

      controllers.push({ item: item, shrink: shrink });
    });
  });

})();
