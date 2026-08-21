/* =========================================================
   BtoBマーケティング無料相談LP
   1. FAQアコーディオンの開閉アニメーション
   2. スクロール連動フェードイン

   ※ フェードインの初期状態（.is-fade）はこのJSが付与する。
      CSSだけで opacity:0 にすると、JSが失敗したとき本文が
      すべて消えてしまうため（01_design-spec.md §7）。
========================================================= */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------------------------------------------------------
     1. FAQアコーディオン
     details/summary で組んでいるため、JSが動かない環境でも
     開閉は成立し、回答テキストは常にDOMに存在する。
  --------------------------------------------------------- */
  function initAccordion() {
    var items = document.querySelectorAll('.faq-item');

    Array.prototype.forEach.call(items, function (details) {
      var body = details.querySelector('.faq-body');
      var summary = details.querySelector('summary');
      if (!body || !summary || reduceMotion || !body.animate) return;

      var animation = null;

      summary.addEventListener('click', function (event) {
        event.preventDefault();

        if (animation) {
          animation.cancel();
          animation = null;
        }

        if (details.open) {
          animation = body.animate(
            { height: [body.offsetHeight + 'px', '0px'], opacity: [1, 0] },
            { duration: 260, easing: 'ease' }
          );
          animation.onfinish = function () {
            details.open = false;
            animation = null;
          };
        } else {
          details.open = true;
          animation = body.animate(
            { height: ['0px', body.offsetHeight + 'px'], opacity: [0, 1] },
            { duration: 260, easing: 'ease' }
          );
          animation.onfinish = function () {
            animation = null;
          };
        }
      });
    });
  }

  /* ---------------------------------------------------------
     2. スクロール連動フェードイン（閾値 0.15）
  --------------------------------------------------------- */
  function initFadeIn() {
    if (reduceMotion || !('IntersectionObserver' in window)) return;

    var targets = document.querySelectorAll('[data-fade]');
    if (!targets.length) return;

    // ここで初めて非表示状態にする
    Array.prototype.forEach.call(targets, function (el) {
      el.classList.add('is-fade');
    });

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    }, {
      threshold: 0.15,
      // 画面下ぎりぎりの要素も少し早めに表示させる
      rootMargin: '0px 0px 10% 0px'
    });

    Array.prototype.forEach.call(targets, function (el) {
      observer.observe(el);
    });
  }

  /* ---------------------------------------------------------
     3. スマホの追従CTA
     FVが見えている間と、⑨診断CTA／⑩フォームに到達したあとは隠す。
     （同じ導線がすぐそこにあるため）
     CSSの初期状態は「表示」なので、JSが動かなくても出たままになる。
  --------------------------------------------------------- */
  function initStickyCta() {
    var cta = document.querySelector('[data-sticky-cta]');
    if (!cta || !('IntersectionObserver' in window)) return;

    var zones = ['#fv', '#diagnosis', '#consultation-form']
      .map(function (sel) { return document.querySelector(sel); })
      .filter(Boolean);
    if (!zones.length) return;

    var visible = {};

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        visible[entry.target.id] = entry.isIntersecting;
      });

      var overlapping = zones.some(function (el) { return visible[el.id]; });
      cta.classList.toggle('is-hidden', overlapping);
    }, { threshold: 0 });

    zones.forEach(function (el) { observer.observe(el); });
  }

  /* ---------------------------------------------------------
     4. ドロワーメニュー（900px未満）
     [hidden] を外してから .is-open を付ける二段構えにして、
     JSが動かない環境ではメニューが出ないだけの状態にする。
  --------------------------------------------------------- */
  function initNav() {
    var toggle = document.querySelector('.l-header__toggle');
    var nav = document.querySelector('[data-nav]');
    var overlay = document.querySelector('[data-nav-overlay]');
    if (!toggle || !nav || !overlay) return;

    var isOpen = false;
    var closeTimer = null;

    function open() {
      if (isOpen) return;
      isOpen = true;
      clearTimeout(closeTimer);

      nav.hidden = false;
      overlay.hidden = false;
      // 表示を確定させてからクラスを付け、transitionを効かせる
      void nav.offsetWidth;
      nav.classList.add('is-open');
      overlay.classList.add('is-open');

      toggle.setAttribute('aria-expanded', 'true');
      toggle.setAttribute('aria-label', 'メニューを閉じる');
      document.documentElement.classList.add('is-nav-open');
    }

    function close() {
      if (!isOpen) return;
      isOpen = false;

      nav.classList.remove('is-open');
      overlay.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'メニューを開く');
      document.documentElement.classList.remove('is-nav-open');

      // アニメーションが終わってから hidden に戻す
      closeTimer = setTimeout(function () {
        nav.hidden = true;
        overlay.hidden = true;
      }, 320);
    }

    toggle.addEventListener('click', function () {
      isOpen ? close() : open();
    });

    overlay.addEventListener('click', close);

    var closeBtn = nav.querySelector('[data-nav-close]');
    if (closeBtn) closeBtn.addEventListener('click', close);

    // メニュー内のリンクを押したら閉じる
    nav.addEventListener('click', function (event) {
      if (event.target.closest('a')) close();
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && isOpen) {
        close();
        toggle.focus();
      }
    });

    // PCナビが出る幅（1100px以上）に戻したときは開いた状態を解除する
    var mq = window.matchMedia('(min-width: 1100px)');
    var onChange = function (e) { if (e.matches) close(); };
    mq.addEventListener ? mq.addEventListener('change', onChange)
                        : mq.addListener(onChange);
  }

  /* ---------------------------------------------------------
     5. 無料診断バナー（900px以上）
     FVを通り過ぎたら表示し、⑨診断CTA・⑩フォームが画面に
     入っているあいだは引っ込める。×で閉じたらそのページでは出さない。
  --------------------------------------------------------- */
  function initDiagBanner() {
    var banner = document.querySelector('[data-diag-banner]');
    if (!banner) return;

    var closeBtn = banner.querySelector('[data-diag-close]');
    var fv = document.querySelector('#fv');
    var zones = ['#diagnosis', '#consultation-form']
      .map(function (sel) { return document.querySelector(sel); })
      .filter(Boolean);
    var mq = window.matchMedia('(min-width: 900px)');

    var dismissed = false;
    var shown = false;
    var hideTimer = null;

    function inView(el) {
      var r = el.getBoundingClientRect();
      return r.top < window.innerHeight && r.bottom > 0;
    }

    function shouldShow() {
      if (dismissed || !mq.matches) return false;
      if (fv && inView(fv)) return false;          // FVを見ているあいだは出さない
      return !zones.some(inView);                  // ⑨⑩が画面内なら引っ込める
    }

    function show() {
      if (shown) return;
      shown = true;
      clearTimeout(hideTimer);
      banner.hidden = false;
      // hidden を外した状態を一度確定させてから遷移させる
      void banner.offsetWidth;
      banner.classList.add('is-visible');
    }

    function hide() {
      if (!shown) return;
      shown = false;
      banner.classList.remove('is-visible');
      hideTimer = setTimeout(function () { banner.hidden = true; }, 320);
    }

    function update() {
      shouldShow() ? show() : hide();
    }

    // 読み取りだけの軽い処理なので、スクロールごとにそのまま判定する
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);

    closeBtn.addEventListener('click', function () {
      dismissed = true;
      hide();
    });

    update();
  }

  initAccordion();
  initFadeIn();
  initStickyCta();
  initNav();
  initDiagBanner();
})();
