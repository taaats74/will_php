"use strict"

{
  const spMenuIcon = document.querySelector(".sp-menu-icon");
  const spMenu = document.querySelector(".sp-menu");
  const spMenuLists = document.querySelectorAll(".sp-menu li");

  spMenuIcon.addEventListener("click", () => {
    spMenuIcon.classList.toggle("active");
    spMenu.classList.toggle("active");
  });

  spMenuLists.forEach((list) => {
    list.addEventListener("click", () => {
      spMenu.classList.toggle("active");
      spMenuIcon.classList.toggle("active");
    });
  });
}
