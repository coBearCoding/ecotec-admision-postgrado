const menuBtn = document.getElementById("menuBtn");
const mainNavbar = document.querySelector(".main-navbar");

menuBtn?.addEventListener("click", function() {
  mainNavbar.classList.toggle("showMenu");
});
