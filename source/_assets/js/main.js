const menu = document.getElementById('mobile-menu')
const menuButtons = [...document.getElementsByClassName('mobile-menu-button')]

const mobileMenu = () => {
  menu.classList.toggle('hidden')
}

menuButtons.forEach((button) => button.addEventListener('click', mobileMenu))
document.getElementById('pricing-menu-item').addEventListener('click', mobileMenu)
