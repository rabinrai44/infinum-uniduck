// get menu and navbar
const menuIcon = document.getElementById('menu_icon');
const navbar = document.getElementById('navbar_nav');
// Toggle Menu Icon
menuIcon.addEventListener('click', () => {
  menuIcon.classList.toggle('menu-icon-close-x');
  navbar.classList.toggle('show-navbar-nav');
});
