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
  const tabButtons = document.querySelectorAll(".tab > li");
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

{
  $(document).ready(function(){
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
  });
}

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
