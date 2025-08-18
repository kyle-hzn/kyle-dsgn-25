const menuBtn = document.querySelector(".header__mobile-btn button");
const drawer = document.querySelector(".mobile-drawer");
menuBtn.addEventListener("click", () => {
  const open = menuBtn.getAttribute("aria-expanded") === "true";
  menuBtn.setAttribute("aria-expanded", String(!open));
  drawer.classList.toggle("translate-x-full");
  if (!open) {
    document.body.classList.add("no-scroll");
  } else {
    document.body.classList.remove("no-scroll");
  }
});
//# sourceMappingURL=main.js.map
