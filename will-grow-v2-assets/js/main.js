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

  /* --- ヘッダー：スクロールで影を付与 --- */
  var header = document.getElementById('wg2Header');
  if (header) {
    var onHeaderScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 24);
    };
    window.addEventListener('scroll', onHeaderScroll, { passive: true });
    onHeaderScroll();
  }

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
