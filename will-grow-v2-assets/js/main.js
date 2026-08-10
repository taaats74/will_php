/* ============================================
   ローディング制御（ウィルサポ LP の script.js と同仕様・毎回表示）
   ロゴをふわっと出し、1.5秒後に背景ごとフェードアウトして DOM から削除する
   ============================================ */
(function () {
  'use strict';

  var loader = document.getElementById('wg2Loader');
  if (!loader) { return; }

  var FADE_OUT_TRIGGER = 1500;  // フェードアウト開始
  var FADE_OUT_DURATION = 900;  // CSS の transition と一致させる
  var FALLBACK_TIMEOUT = 3500;  // 保険

  document.body.classList.add('wg2-loading');

  // 次フレームで .is-shown を付けてロゴをフェードイン
  requestAnimationFrame(function () {
    requestAnimationFrame(function () {
      loader.classList.add('is-shown');
    });
  });

  var hidden = false;
  function hideLoader() {
    if (hidden) { return; }
    hidden = true;
    loader.classList.add('is-hidden');
    document.body.classList.remove('wg2-loading');

    setTimeout(function () {
      if (loader && loader.parentNode) {
        loader.parentNode.removeChild(loader);
      }
    }, FADE_OUT_DURATION + 150);
  }

  setTimeout(hideLoader, FADE_OUT_TRIGGER);
  setTimeout(hideLoader, FALLBACK_TIMEOUT);
})();

/* =========================================
   ウィルグロー LP v2 - 軽量スクリプト
   計測: cta_diagnosis_click / cta_consult_click / form_submit / scroll_depth
        すべてに page_version: "v2" を付与する（v1とのCV比較用）
   ========================================= */
(function () {
  'use strict';

  var PAGE_VERSION = 'v2';

  /* --- GTM(dataLayer) / GA4 共通プッシュ --- */
  function pushEvent(name, params) {
    var payload = Object.assign({ page_version: PAGE_VERSION }, params || {});
    if (window.dataLayer) {
      window.dataLayer.push(Object.assign({ event: name }, payload));
    }
    if (typeof window.gtag === 'function') {
      window.gtag('event', name, payload);
    }
  }

  /* ヘッダーは追従しないため、スクロール連動の影付与は廃止 */

  /* --- ハンバーガーメニュー --- */
  var burger = document.getElementById('wg2Burger');
  var drawer = document.getElementById('wg2Drawer');
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
    drawer.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () { setMenu(false); });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') { setMenu(false); }
    });
  }

  /* --- 追従CTA：FVを過ぎたら表示、×（PC）で閉じる --- */
  var sticky = document.getElementById('wg2Sticky');
  var stickyClose = document.getElementById('wg2StickyClose');
  if (sticky) {
    var stickyClosed = false;
    var onStickyScroll = function () {
      if (stickyClosed) { return; }
      sticky.classList.toggle('is-visible', window.scrollY > 560);
    };
    window.addEventListener('scroll', onStickyScroll, { passive: true });
    onStickyScroll();

    if (stickyClose) {
      stickyClose.addEventListener('click', function () {
        stickyClosed = true;
        sticky.classList.add('is-closed');
      });
    }
  }

  /* --- スクロール連動フェードイン --- */
  var revealTargets = document.querySelectorAll(
    '.wg2-head, .wg2-checklist li, .wg2-solution__item, .wg2-diagram, ' +
    '.wg2-why__card, .wg2-plan, .wg2-choose__card, .wg2-flow__item, ' +
    '.wg2-member, .wg2-facts, .wg2-faq__item, .wg2-cta, .wg2-form'
  );

  if ('IntersectionObserver' in window) {
    revealTargets.forEach(function (el) { el.classList.add('wg2-reveal'); });

    var revealObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-in');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });

    revealTargets.forEach(function (el) { revealObserver.observe(el); });
  }

  /* --- FAQ：1つ開いたら他を閉じる --- */
  var faqItems = document.querySelectorAll('.wg2-faq__item');
  faqItems.forEach(function (item) {
    item.addEventListener('toggle', function () {
      if (item.open) {
        faqItems.forEach(function (other) {
          if (other !== item) { other.open = false; }
        });
      }
    });
  });

  /* --- CTAクリック計測 ---
     data-cta-type="diagnosis" → cta_diagnosis_click
     data-cta-type="consult"   → cta_consult_click
     data-cta-position="sec02" 等で設置位置を識別する            */
  document.querySelectorAll('[data-cta-type]').forEach(function (el) {
    el.addEventListener('click', function () {
      var type = el.getAttribute('data-cta-type');
      var eventName = type === 'diagnosis' ? 'cta_diagnosis_click'
        : type === 'consult' ? 'cta_consult_click'
        : 'cta_click';
      pushEvent(eventName, {
        cta_type: type,
        cta_position: el.getAttribute('data-cta-position') || ''
      });
    });
  });

  /* --- HubSpotフォーム送信完了 → form_submit --- */
  window.addEventListener('message', function (e) {
    if (e.data && e.data.type === 'hsFormCallback' &&
        e.data.eventName === 'onFormSubmitted') {
      pushEvent('form_submit', { form_type: 'consult' });
    }
  });

  /* --- モーダル（活用例の詳細）--------------------------------------
     <dialog> の showModal() を使用。Esc・フォーカストラップ・backdrop は
     ブラウザ標準の挙動に任せ、ここでは開閉と背面スクロール固定だけを行う。 */
  (function () {
    var openers = document.querySelectorAll('[data-wg2-modal-open]');
    if (!openers.length) { return; }

    var lastOpener = null;

    function close(dialog) {
      if (!dialog || !dialog.open) { return; }
      dialog.close();
    }

    openers.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var dialog = document.getElementById(btn.getAttribute('data-wg2-modal-open'));
        if (!dialog) { return; }
        lastOpener = btn;
        if (typeof dialog.showModal === 'function') {
          dialog.showModal();
        } else {
          // <dialog> 未対応ブラウザ向けのフォールバック
          dialog.setAttribute('open', '');
        }
        document.body.classList.add('wg2-modal-open');
        pushEvent('modal_open', { modal_id: dialog.id });
      });
    });

    document.querySelectorAll('.wg2-modal').forEach(function (dialog) {
      dialog.querySelectorAll('[data-wg2-modal-close]').forEach(function (btn) {
        btn.addEventListener('click', function () { close(dialog); });
      });

      // 背景（::backdrop）クリックで閉じる。
      // dialog 自身が全画面判定になるため、中身の矩形外かどうかで判定する
      dialog.addEventListener('click', function (e) {
        var inner = dialog.querySelector('.wg2-modal__inner');
        if (!inner) { return; }
        var r = inner.getBoundingClientRect();
        var outside = e.clientX < r.left || e.clientX > r.right ||
                      e.clientY < r.top || e.clientY > r.bottom;
        if (outside) { close(dialog); }
      });

      dialog.addEventListener('close', function () {
        document.body.classList.remove('wg2-modal-open');
        if (lastOpener) { lastOpener.focus(); }
      });
    });
  })();

  /* --- スライダー（活用例 / 6ヶ月の流れ）------------------------------
     1画面1スライド。prev/next ボタンとドットナビで切り替える。
     JS がここまで到達したときだけ .is-ready を付け、CSS 側で
     transform 制御に切り替える（未実行時は素の横スクロールとして残る）。 */
  document.querySelectorAll('[data-wg2-slider]').forEach(function (root) {
    var track = root.querySelector('.wg2-slider__track');
    if (!track) { return; }

    var slides = Array.prototype.slice.call(track.children);
    if (slides.length < 2) { return; }

    var prev = root.querySelector('.wg2-slider__btn--prev');
    var next = root.querySelector('.wg2-slider__btn--next');
    var dotsWrap = root.querySelector('.wg2-slider__dots');
    var index = 0;

    var dots = slides.map(function (_, i) {
      var b = document.createElement('button');
      b.type = 'button';
      b.className = 'wg2-slider__dot';
      b.setAttribute('role', 'tab');
      b.setAttribute('aria-label', (i + 1) + '枚目を表示');
      b.addEventListener('click', function () { go(i); });
      if (dotsWrap) { dotsWrap.appendChild(b); }
      return b;
    });

    function render() {
      track.style.transform = 'translateX(' + (-100 * index) + '%)';
      dots.forEach(function (d, i) {
        d.classList.toggle('is-current', i === index);
        d.setAttribute('aria-selected', i === index ? 'true' : 'false');
      });
      slides.forEach(function (s, i) {
        // 表示外のスライドはタブ移動・読み上げの対象から外す
        s.setAttribute('aria-hidden', i === index ? 'false' : 'true');
      });
      if (prev) { prev.disabled = index === 0; }
      if (next) { next.disabled = index === slides.length - 1; }
    }

    function go(i) {
      index = Math.max(0, Math.min(slides.length - 1, i));
      render();
    }

    if (prev) { prev.addEventListener('click', function () { go(index - 1); }); }
    if (next) { next.addEventListener('click', function () { go(index + 1); }); }

    // スワイプ（横方向のみ。縦スクロールは邪魔しない）
    var startX = null;
    var startY = null;
    root.addEventListener('touchstart', function (e) {
      startX = e.touches[0].clientX;
      startY = e.touches[0].clientY;
    }, { passive: true });
    root.addEventListener('touchend', function (e) {
      if (startX === null) { return; }
      var dx = e.changedTouches[0].clientX - startX;
      var dy = e.changedTouches[0].clientY - startY;
      if (Math.abs(dx) > 50 && Math.abs(dx) > Math.abs(dy)) {
        go(index + (dx < 0 ? 1 : -1));
      }
      startX = null;
      startY = null;
    }, { passive: true });

    root.classList.add('is-ready');
    render();
  });

  /* --- スクロール深度（25 / 50 / 75 / 100%）--- */
  var depths = [25, 50, 75, 100];
  var fired = {};
  var onDepthScroll = function () {
    var doc = document.documentElement;
    var scrollable = doc.scrollHeight - window.innerHeight;
    if (scrollable <= 0) { return; }
    var percent = (window.scrollY / scrollable) * 100;

    depths.forEach(function (d) {
      if (!fired[d] && percent >= d) {
        fired[d] = true;
        pushEvent('scroll_depth', { percent_scrolled: d });
      }
    });

    if (fired[100]) {
      window.removeEventListener('scroll', onDepthScroll);
    }
  };
  window.addEventListener('scroll', onDepthScroll, { passive: true });
  onDepthScroll();
})();
