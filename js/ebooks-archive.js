/**
 * archive-ebooks.php タブ切替
 * - クリック / キーボード操作でタブ切替
 * - URL ハッシュ(#useful / #service)同期
 * - GA4 イベント送出(タブ切替・カードクリック)
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var tablist = document.querySelector('.ebooks-tabs[role="tablist"]');
    if (!tablist) return;

    var tabs = Array.prototype.slice.call(tablist.querySelectorAll('[role="tab"]'));
    var panels = Array.prototype.slice.call(document.querySelectorAll('.ebooks-tab-panel[role="tabpanel"]'));
    if (tabs.length === 0 || panels.length === 0) return;

    function activateTab(tab, focusTab) {
      var targetId = tab.getAttribute('aria-controls');
      var targetPanel = document.getElementById(targetId);
      if (!targetPanel) return;

      tabs.forEach(function (t) {
        var active = t === tab;
        t.classList.toggle('is-active', active);
        t.setAttribute('aria-selected', active ? 'true' : 'false');
        t.setAttribute('tabindex', active ? '0' : '-1');
      });

      panels.forEach(function (p) {
        var active = p === targetPanel;
        p.classList.toggle('is-active', active);
        if (active) {
          p.removeAttribute('hidden');
        } else {
          p.setAttribute('hidden', '');
        }
      });

      var slug = tab.getAttribute('data-tab') || '';
      if (slug) {
        try {
          history.replaceState(null, '', '#' + slug);
        } catch (e) { /* noop */ }
      }

      if (focusTab) tab.focus();

      if (typeof window.gtag === 'function') {
        window.gtag('event', 'ebooks_tab_change', {
          event_category: 'ebooks_archive',
          event_label: slug
        });
      }
    }

    tabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        activateTab(tab, false);
      });

      tab.addEventListener('keydown', function (e) {
        var idx = tabs.indexOf(tab);
        var next = null;
        switch (e.key) {
          case 'ArrowRight':
            next = tabs[(idx + 1) % tabs.length];
            break;
          case 'ArrowLeft':
            next = tabs[(idx - 1 + tabs.length) % tabs.length];
            break;
          case 'Home':
            next = tabs[0];
            break;
          case 'End':
            next = tabs[tabs.length - 1];
            break;
        }
        if (next) {
          e.preventDefault();
          activateTab(next, true);
        }
      });
    });

    function applyHash() {
      var hash = (window.location.hash || '').replace('#', '');
      if (!hash) return;
      var matched = tabs.find(function (t) {
        return t.getAttribute('data-tab') === hash;
      });
      if (matched) activateTab(matched, false);
    }

    applyHash();
    window.addEventListener('hashchange', applyHash);

    // カードクリック計測
    var cards = document.querySelectorAll('.ebooks-card__link');
    cards.forEach(function (link) {
      link.addEventListener('click', function () {
        if (typeof window.gtag !== 'function') return;
        var card = link.closest('.ebooks-card');
        var titleEl = card ? card.querySelector('.ebooks-card__title') : null;
        var label = titleEl ? titleEl.textContent.trim() : link.href;
        window.gtag('event', 'ebooks_card_click', {
          event_category: 'ebooks_archive',
          event_label: label
        });
      });
    });
  });
})();
