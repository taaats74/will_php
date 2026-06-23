/* =========================================
   ウィルグロー LP - 軽量スクリプト
   ========================================= */
(function () {
  'use strict';

  /* --- GA4 / GTM 計測ユーティリティ --- */
  function pushEvent(name, params) {
    if (window.dataLayer) {
      window.dataLayer.push(Object.assign({ event: name }, params || {}));
    }
    if (typeof window.gtag === 'function') {
      window.gtag('event', name, params || {});
    }
  }

  /* --- ヘッダー：FVから常時表示。スクロールで背景を付与 --- */
  var header = document.getElementById('wgHeader');
  if (header) {
    var onHeaderScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 24);
    };
    window.addEventListener('scroll', onHeaderScroll, { passive: true });
    onHeaderScroll();
  }

  /* --- 追従CTA（モバイル）：FVを過ぎたら表示 --- */
  var stickyCta = document.getElementById('wgStickyCta');
  if (stickyCta) {
    var onStickyScroll = function () {
      stickyCta.classList.toggle('is-visible', window.scrollY > 520);
    };
    window.addEventListener('scroll', onStickyScroll, { passive: true });
    onStickyScroll();
  }

  /* --- 無料診断 追従バナー（右下・PC）：FVを過ぎたら表示、×で閉じる --- */
  var floatCta = document.getElementById('wgFloatCta');
  var floatCtaClose = document.getElementById('wgFloatCtaClose');
  if (floatCta) {
    var floatClosed = false;
    var onFloatScroll = function () {
      if (floatClosed) return;
      floatCta.classList.toggle('is-visible', window.scrollY > 600);
    };
    window.addEventListener('scroll', onFloatScroll, { passive: true });
    onFloatScroll();

    if (floatCtaClose) {
      floatCtaClose.addEventListener('click', function () {
        floatClosed = true;
        floatCta.classList.add('is-closed');
      });
    }
  }

  /* --- スクロール連動フェードイン --- */
  var revealTargets = document.querySelectorAll(
    '.wg-section__title, .wg-issue-card, .wg-cause__item, .wg-broken, ' +
    '.wg-funnel-fig, .wg-reason, .wg-practice__item, .wg-compare, .wg-steps__item, ' +
    '.wg-plan, .wg-option, .wg-planfit__card, .wg-whofor-card, .wg-process__step, ' +
    '.wg-faq__item, .wg-form-box'
  );

  if ('IntersectionObserver' in window) {
    revealTargets.forEach(function (el) { el.classList.add('wg-reveal'); });

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
  var faqItems = document.querySelectorAll('.wg-faq__item');
  faqItems.forEach(function (item) {
    item.addEventListener('toggle', function () {
      if (item.open) {
        faqItems.forEach(function (other) {
          if (other !== item) { other.open = false; }
        });
      }
    });
  });

  /* --- CTAクリック計測（GA4/GTM想定） --- */
  document.querySelectorAll('[data-cta]').forEach(function (el) {
    el.addEventListener('click', function () {
      pushEvent('cta_click', { cta_position: el.getAttribute('data-cta') });
    });
  });

  /* --- HubSpotフォーム送信完了で generate_lead を発火（HubSpotコールバック）--- */
  window.addEventListener('message', function (e) {
    if (e.data && e.data.type === 'hsFormCallback' &&
        e.data.eventName === 'onFormSubmitted') {
      pushEvent('generate_lead', { form_type: 'soudan' });
    }
  });
})();
