// get menu and navbar
const menuIcon = document.getElementById('menu_icon');
const navbar = document.getElementById('navbar_nav');
// Toggle Menu Icon
menuIcon.addEventListener('click', () => {
  menuIcon.classList.toggle('menu-icon-close-x');
  navbar.classList.toggle('show-navbar-nav');
});

// Function being called
addButtonClass();

function addButtonClass() {
  // Add a special class name for the nav link if condition is true
  const navItemIos = document.querySelector('.apply-button-ios');
  const navItemUnicorn = document.querySelector('.apply-button-unicorn');

  // .btn-primary-ios
  const navItemA = navItemIos.getElementsByTagName('a')[0];
  navItemA.className += 'btn btn-primary icon-ios';

  // .btn-secondary-unicorn
  const navItemU = navItemUnicorn.getElementsByTagName('a')[0];
  navItemU.className += 'btn btn-secondary icon-unicorn';
}
