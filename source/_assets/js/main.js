const menu = document.getElementById('mobile-menu')
const menuButtons = [...document.getElementsByClassName('mobile-menu-button')]

const mobileMenu = () => {
  menu.classList.toggle('hidden')
}

menuButtons.forEach((button) => button.addEventListener('click', mobileMenu))
document.getElementById('pricing-menu-item').addEventListener('click', mobileMenu)

const params = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
})

if (params.ref === 'appstore') {
  document.getElementById('pricing-nav-link').remove()
  document.getElementById('pricing-menu-item').remove()
}
