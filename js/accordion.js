"use strict"

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
