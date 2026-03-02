document.addEventListener("DOMContentLoaded", () => {
  const smoothScrollToSelector = (targetSelector) => {
    if (!targetSelector || targetSelector === "#") return false;
    const target = document.querySelector(targetSelector);
    if (!target) return false;

    const header = document.querySelector(".ws-ec-header");
    const headerHeight = header ? header.offsetHeight : 0;
    const targetTop =
      target.getBoundingClientRect().top + window.pageYOffset - headerHeight - 8;

    window.scrollTo({
      top: Math.max(0, targetTop),
      behavior: "smooth",
    });

    return true;
  };

  const fadeTargets = document.querySelectorAll(".ws-ec-fade");
  if ("IntersectionObserver" in window && fadeTargets.length) {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-visible");
          obs.unobserve(entry.target);
        });
      },
      { threshold: 0.2 }
    );
    fadeTargets.forEach((target) => observer.observe(target));
  } else {
    fadeTargets.forEach((target) => target.classList.add("is-visible"));
  }

  const ctaButton = document.querySelector(".ws-ec-fv__cta[data-scroll-target]");
  if (ctaButton) {
    ctaButton.addEventListener("click", () => {
      const targetSelector = ctaButton.getAttribute("data-scroll-target");
      smoothScrollToSelector(targetSelector);
    });
  }

  const navLinks = document.querySelectorAll(
    '.ws-ec-header__link[href^="#"], .ws-ec-footer__link[href^="#"], .ws-ec-fab-nav__link[href^="#"], .ws-ec-cta__btn[href^="#"]'
  );
  navLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      const targetSelector = link.getAttribute("href");
      if (!smoothScrollToSelector(targetSelector)) return;

      event.preventDefault();

      document.body.classList.remove("fab-menu-open");
      const fabMenuButton = document.querySelector(".ws-ec-fab-menu");
      if (fabMenuButton) fabMenuButton.setAttribute("aria-expanded", "false");
    });
  });

  const conceptSection = document.querySelector("#concept");
  const fabMenuButton = document.querySelector(".ws-ec-fab-menu");
  const fabOverlay = document.querySelector(".ws-ec-fab-overlay");
  const body = document.body;
  const desktopMq = window.matchMedia("(min-width: 768px)");

  const syncFabMenuVisibility = () => {
    const isDesktop = desktopMq.matches;
    if (!isDesktop) {
      body.classList.add("has-fab-menu");
      return;
    }

    if (!conceptSection) {
      body.classList.remove("has-fab-menu");
      body.classList.remove("fab-menu-open");
      if (fabMenuButton) fabMenuButton.setAttribute("aria-expanded", "false");
      return;
    }

    const conceptTop = conceptSection.getBoundingClientRect().top + window.pageYOffset;
    const shouldShow = window.pageYOffset >= conceptTop - 40;
    body.classList.toggle("has-fab-menu", shouldShow);

    if (!shouldShow) {
      body.classList.remove("fab-menu-open");
      if (fabMenuButton) fabMenuButton.setAttribute("aria-expanded", "false");
    }
  };

  syncFabMenuVisibility();
  window.addEventListener("scroll", syncFabMenuVisibility, { passive: true });
  window.addEventListener("resize", syncFabMenuVisibility);
  if ("addEventListener" in desktopMq) {
    desktopMq.addEventListener("change", syncFabMenuVisibility);
  } else if ("addListener" in desktopMq) {
    desktopMq.addListener(syncFabMenuVisibility);
  }

  if (fabMenuButton) {
    fabMenuButton.addEventListener("click", () => {
      const isOpen = body.classList.toggle("fab-menu-open");
      fabMenuButton.setAttribute("aria-expanded", String(isOpen));
    });
  }

  if (fabOverlay) {
    fabOverlay.addEventListener("click", () => {
      body.classList.remove("fab-menu-open");
      if (fabMenuButton) fabMenuButton.setAttribute("aria-expanded", "false");
    });
  }

  const faqItems = document.querySelectorAll(".ws-ec-faq__item");
  faqItems.forEach((item) => {
    const summary = item.querySelector(".ws-ec-faq__question");
    const answer = item.querySelector(".ws-ec-faq__answer");
    if (!summary || !answer) return;

    let animation = null;
    let isClosing = false;
    let isExpanding = false;

    const finishAnimation = (open) => {
      if (open) {
        item.open = true;
        item.style.height = "";
        item.style.overflow = "";
      } else {
        const closedHeight = `${summary.offsetHeight}px`;
        item.style.height = closedHeight;
        item.open = false;
        requestAnimationFrame(() => {
          item.style.height = "";
          item.style.overflow = "";
        });
      }

      animation = null;
      isClosing = false;
      isExpanding = false;
    };

    const shrink = () => {
      isClosing = true;
      const startHeight = `${item.offsetHeight}px`;
      const endHeight = `${summary.offsetHeight}px`;

      if (animation) animation.cancel();
      item.style.overflow = "hidden";
      animation = item.animate(
        { height: [startHeight, endHeight] },
        { duration: 360, easing: "cubic-bezier(0.22, 1, 0.36, 1)" }
      );

      animation.onfinish = () => finishAnimation(false);
      animation.oncancel = () => {
        isClosing = false;
      };
    };

    const expand = () => {
      isExpanding = true;
      const startHeight = `${item.offsetHeight}px`;
      const endHeight = `${summary.offsetHeight + answer.offsetHeight}px`;

      if (animation) animation.cancel();
      item.style.overflow = "hidden";
      animation = item.animate(
        { height: [startHeight, endHeight] },
        { duration: 360, easing: "cubic-bezier(0.22, 1, 0.36, 1)" }
      );

      animation.onfinish = () => finishAnimation(true);
      animation.oncancel = () => {
        isExpanding = false;
      };
    };

    const openItem = () => {
      item.style.height = `${item.offsetHeight}px`;
      item.open = true;
      requestAnimationFrame(expand);
    };

    summary.addEventListener("click", (event) => {
      event.preventDefault();

      if (isClosing || !item.open) {
        openItem();
      } else if (isExpanding || item.open) {
        shrink();
      }
    });
  });
});
