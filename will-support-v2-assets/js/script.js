'use strict';

/* ============================================
   Loader制御 (毎回表示)
   ============================================ */
(function() {
  'use strict';

  const loader = document.getElementById('wsv2-loader');
  if (!loader) return;

  const FADE_OUT_TRIGGER = 1500;  // 1.5s後にフェードアウト開始
  const FADE_OUT_DURATION = 900;  // 親のtransition時間と一致
  const FALLBACK_TIMEOUT = 3500;

  // 表示中はbodyスクロールを防止
  document.body.classList.add('wsv2-loading');

  // 次のフレームで .is-shown を付与してロゴをフェードイン
  requestAnimationFrame(function() {
    requestAnimationFrame(function() {
      loader.classList.add('is-shown');
    });
  });

  // ローダーを非表示にする共通処理
  let hidden = false;
  function hideLoader() {
    if (hidden) return;
    hidden = true;
    loader.classList.add('is-hidden');
    document.body.classList.remove('wsv2-loading');

    // フェードアウト完了後にDOM自体を削除
    setTimeout(function() {
      if (loader && loader.parentNode) {
        loader.parentNode.removeChild(loader);
      }
    }, FADE_OUT_DURATION + 150);
  }

  // ロゴ静止後、ロゴ移動 + 背景フェードアウトを同時開始
  setTimeout(hideLoader, FADE_OUT_TRIGGER);

  // フェールセーフ:何らかの理由で消えない場合の保険
  setTimeout(hideLoader, FALLBACK_TIMEOUT);
})();

document.addEventListener('DOMContentLoaded', function () {

  // ============================================
  // FAB メニュー開閉
  // ============================================

  var fabBtn     = document.querySelector('.wsv2-fab-menu');
  var fabOverlay = document.querySelector('.wsv2-fab-overlay');
  var fabNav     = document.querySelector('.wsv2-fab-nav');
  var fabLinks   = document.querySelectorAll('.wsv2-fab-nav__link');

  if (!fabBtn) return;

  /** メニューを開く */
  function openFabMenu() {
    document.body.classList.add('fab-menu-open', 'no-scroll');
    fabBtn.setAttribute('aria-expanded', 'true');
    fabOverlay.removeAttribute('aria-hidden');
  }

  /** メニューを閉じる */
  function closeFabMenu() {
    document.body.classList.remove('fab-menu-open', 'no-scroll');
    fabBtn.setAttribute('aria-expanded', 'false');
    fabOverlay.setAttribute('aria-hidden', 'true');
  }

  /** 開閉トグル */
  fabBtn.addEventListener('click', function () {
    var isOpen = document.body.classList.contains('fab-menu-open');
    if (isOpen) {
      closeFabMenu();
    } else {
      openFabMenu();
    }
  });

  // オーバーレイクリックで閉じる
  fabOverlay.addEventListener('click', closeFabMenu);

  // ナビリンククリックでも閉じる（アンカースクロール後にメニューが消えるように）
  fabLinks.forEach(function (link) {
    link.addEventListener('click', closeFabMenu);
  });

  // ============================================
  // Escape キーで閉じる
  // ============================================

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && document.body.classList.contains('fab-menu-open')) {
      closeFabMenu();
      fabBtn.focus();
    }
  });

  // ============================================
  // スクロール連動：FV通過後に has-fab-menu を付与
  // スクロール位置が 100px を超えたら付与、0 に戻ったら外す
  // ============================================

  var fvSection = document.querySelector('.wsv2-fv');

  function getScrollThreshold() {
    return fvSection ? fvSection.offsetHeight : 100;
  }

  function onScroll() {
    if (window.scrollY > getScrollThreshold()) {
      document.body.classList.add('has-fab-menu');
    } else {
      document.body.classList.remove('has-fab-menu');
    }
  }

  // 初期チェック（ページ読み込み時点ですでにスクロール済みの場合に対応）
  onScroll();

  window.addEventListener('scroll', onScroll, { passive: true });

  // ============================================
  // スクロールフェードイン（Intersection Observer）
  // ============================================

  var fadeEls = document.querySelectorAll('.wsv2-fade');

  if (fadeEls.length > 0 && 'IntersectionObserver' in window) {
    var fadeObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          fadeObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    fadeEls.forEach(function (el) {
      fadeObserver.observe(el);
    });
  } else {
    // Intersection Observer 非対応環境ではすべて表示
    fadeEls.forEach(function (el) {
      el.classList.add('is-visible');
    });
  }

  // ============================================
  // FAQ アコーディオン スムーズ開閉
  // ============================================

  var faqItems = document.querySelectorAll('.wsv2-faq__item');

  faqItems.forEach(function (item) {
    var summary = item.querySelector('.wsv2-faq__question');
    var answer  = item.querySelector('.wsv2-faq__answer');
    if (!summary || !answer) return;

    var animation = null;
    var isClosing = false;
    var isExpanding = false;

    summary.addEventListener('click', function (e) {
      e.preventDefault();
      item.style.overflow = 'hidden';

      if (isClosing || !item.open) {
        open();
      } else if (isExpanding || item.open) {
        shrink();
      }
    });

    function shrink() {
      isClosing = true;
      var startHeight = item.offsetHeight + 'px';
      var endHeight   = summary.offsetHeight + 'px';

      if (animation) animation.cancel();

      animation = item.animate(
        { height: [startHeight, endHeight] },
        { duration: 300, easing: 'ease' }
      );

      animation.onfinish = function () { onAnimationFinish(false); };
      animation.oncancel = function () { isClosing = false; };
    }

    function open() {
      item.style.height = item.offsetHeight + 'px';
      item.open = true;
      window.requestAnimationFrame(expand);
    }

    function expand() {
      isExpanding = true;
      var startHeight = item.offsetHeight + 'px';
      var endHeight   = (summary.offsetHeight + answer.offsetHeight) + 'px';

      if (animation) animation.cancel();

      animation = item.animate(
        { height: [startHeight, endHeight] },
        { duration: 300, easing: 'ease' }
      );

      animation.onfinish = function () { onAnimationFinish(true); };
      animation.oncancel = function () { isExpanding = false; };
    }

    function onAnimationFinish(open) {
      item.open = open;
      animation = null;
      isClosing = false;
      isExpanding = false;
      item.style.height = item.style.overflow = '';
    }
  });

  // ============================================
  // works タブ切り替え
  // ============================================

  var worksTabs   = document.querySelectorAll('.wsv2-works__tab');
  var worksPanels = document.querySelectorAll('.wsv2-works__panel');

  if (worksTabs.length > 0) {
    worksTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        worksTabs.forEach(function (t) {
          t.classList.remove('is-active');
          t.setAttribute('aria-selected', 'false');
        });
        worksPanels.forEach(function (p) {
          p.hidden = true;
        });
        tab.classList.add('is-active');
        tab.setAttribute('aria-selected', 'true');
        var panel = document.getElementById(tab.getAttribute('aria-controls'));
        if (panel) {
          panel.hidden = false;
        }
      });
    });
  }

});
