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

    var ticking = false;
    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function () {
        header.classList.toggle('is-scrolled', window.scrollY > 100);
        ticking = false;
      });
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  });
})();
