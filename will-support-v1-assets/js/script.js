"use strict";

{
  const accordionItemHeader = document.querySelectorAll('.accordion .question');
   console.log(accordionItemHeader);

   accordionItemHeader.forEach((accordionItemHeader) => {
     accordionItemHeader.addEventListener('click', () => {
       const accordionActive = document.querySelector('.accordion .question.active');
       if (accordionActive && accordionActive !== accordionItemHeader) {
         accordionActive.classList.toggle('active');
         accordionActive.nextElementSibling.style.maxHeight = 0;
       }
       accordionItemHeader.classList.toggle('active');
       const accordionItemBody = accordionItemHeader.nextElementSibling;
       if (accordionItemHeader.classList.contains('active')) {
         accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + 'px';
       }else{
         accordionItemBody.style.maxHeight = 0;
       }
     });
   });
}

{
  const spMenuIcon = document.querySelector(".menu-icon");
  const spMenu = document.querySelector(".sp-menu");
  const spMenuLists = document.querySelectorAll(".sp-menu ul li a");

  spMenuIcon.addEventListener("click", () => {
    spMenuIcon.classList.toggle("active");
    spMenu.classList.toggle("active");
  });

  spMenuLists.forEach((list) => {
    list.addEventListener("click", () => {
      console.log(list);
      spMenu.classList.toggle("active");
      spMenuIcon.classList.toggle("active");
    });
  });
}

{
  // ヘッダーとフッターのスムーススクロール
  $(function () {
    let pcMenu = $('header a');
  pcMenu.click(function(){
    let speed = 700;
    let href= $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top - 70;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
    });
  });

  $(function () {
    let pcMenuFooter = $('footer a');
  pcMenuFooter.click(function(){
    let speed = 700;
    let href= $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top - 70;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
    });
  });

  $(function () {
    let banner = $('.banner-tag');
  banner.click(function(){
    let speed = 700;
    let href= $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top - 70;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
    });
  });
}
