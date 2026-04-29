"use strict"

{
  // Rellaxの設定をオブジェクトで管理
  const rellaxSettings = [
    { selector: '.rellax-up', options: { speed: 1, center: true } },
    { selector: '.rellax-up2', options: { speed: .5, center: true } },
    { selector: '.rellax-down', options: { speed: -3, center: true } },
];

// 各設定に対してRellaxインスタンスを作成
  rellaxSettings.forEach(setting => {
    new Rellax(setting.selector, setting.options);
  });
}
{
  // 旧 .tab タブ切り替え (page-topv3-service 用、現在コメントアウト中のため空のときは何もしない)
  const tabButtons = document.querySelectorAll(".tab > li");
  if (tabButtons.length > 0) {
    const tabContents = document.querySelectorAll(".service-wrapper > .service");

    tabButtons[0].classList.add("active");
    tabButtons.forEach(button => {
      button.addEventListener("click", () => {
        // Remove active class from all tab contents
        tabContents.forEach(content => {
            content.classList.remove("is-active");
        });
        // Remove active class from all tab buttons
        tabButtons.forEach(btn => {
          btn.classList.remove("active");
        });
        // Add active class to the clicked tab's content
        const tabId = button.getAttribute("data-tab");
        document.getElementById(tabId).classList.add("is-active");
        // Add active class to the clicked tab button
        button.classList.add("active");
      });
    });
  }
}

{
  // .page-topv3-mainproduct タブ切り替え (data-mp-tab)
  const mpTabs = document.querySelectorAll(".mainproduct-tab > li");
  if (mpTabs.length > 0) {
    const mpItems = document.querySelectorAll(".mainproduct-wrapper > .mainproduct-item");

    mpTabs.forEach(tab => {
      tab.addEventListener("click", (e) => {
        e.preventDefault();
        const targetId = tab.getAttribute("data-mp-tab");

        mpTabs.forEach(t => t.classList.remove("active"));
        tab.classList.add("active");

        mpItems.forEach(item => item.classList.remove("is-active"));
        const target = document.getElementById(targetId);
        if (target) target.classList.add("is-active");
      });
    });
  }
}

{
  // 旧 .carousel slick (page-topv3-works v2構造で利用) - v3 では .works-carousel に切替
  $(document).ready(function(){
    if ($('.carousel').length > 0) {
      $('.carousel').slick({
        autoplay: true,
        speed: 1500,
        autplaySpeed: 3000,
        dots: true,
        slidesToShow: 5,
        arrows: false,
        pauseOnFocus: false,
        pauseOnHover: true,
        centerMode: true,
        responsive: [
          {
            breakpoint: 1600,
            settings: {
              slidesToShow: 4,
            }
          },
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 3,
            }
          },
          {
            breakpoint: 1050,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 770,
            settings: {
              slidesToShow: 1,
            }
          },
        ]
      });
    }
  });
}

// .works-carousel は v3 ではグリッド表示に変更されたため slick 初期化不要

{
  const targetElement = document.querySelectorAll('.animation-target');

  console.log(targetElement);

  window.addEventListener('scroll', () => {
    for (let i = 0; i < targetElement.length; i++){
      const getElementDistance = targetElement[i].getBoundingClientRect().top + targetElement[i].clientHeight * .3;
      console.log(getElementDistance);
      if (window.innerHeight > getElementDistance) {
        targetElement[i].classList.add('show');
      }
    }
  });
}
