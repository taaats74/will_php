(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var header = document.querySelector('.sp-header-v5');
    var menu = document.getElementById('sp-menu-v5');
    var hamburger = document.querySelector('.sp-header-v5__hamburger');
    if (!header || !menu || !hamburger) return;

    function setMenuState(open) {
      menu.classList.toggle('is-open', open);
      hamburger.classList.toggle('is-active', open);
      hamburger.setAttribute('aria-expanded', open ? 'true' : 'false');
      hamburger.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
      menu.setAttribute('aria-hidden', open ? 'false' : 'true');
      document.body.classList.toggle('is-sp-menu-open', open);
    }

    hamburger.addEventListener('click', function () {
      setMenuState(!menu.classList.contains('is-open'));
    });

    var links = menu.querySelectorAll('a[href]');
    links.forEach(function (link) {
      var href = link.getAttribute('href');
      if (!href || href === '#') return;
      link.addEventListener('click', function () {
        setMenuState(false);
      });
    });

    // トップページ FV(.page-topv3-fv)を取得・FV の 3/4 を超えたら通過判定
    var fv = document.querySelector('.page-topv3-fv') || document.querySelector('.page-topv3-fv-sp');
    var FV_PASS_RATIO = 0.75;

    var ticking = false;
    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function () {
        header.classList.toggle('is-scrolled', window.scrollY > 100);

        // FV 通過判定:FV 高さの 75% 以上をスクロールしたら body.is-fv-passed
        // → PC ヘッダー (.header-child-v2--top-scroll) の slide-in トリガー
        if (fv) {
          var fvTop = fv.getBoundingClientRect().top;
          var passed = fvTop <= -fv.offsetHeight * FV_PASS_RATIO;
          document.body.classList.toggle('is-fv-passed', passed);
        }

        ticking = false;
      });
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  });
})();
