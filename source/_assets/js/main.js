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

  document.getElementById('help-nav-link').href = '/help/?ref=appstore'
  document.getElementById('help-menu-item').href = '/help/?ref=appstore'
  document.getElementById('faq-nav-link').href = '/faq/?ref=appstore'
  document.getElementById('faq-menu-item').href = '/faq/?ref=appstore'
  document.getElementById('blog-nav-link').href = '/blog/?ref=appstore'
  document.getElementById('blog-menu-item').href = '/blog/?ref=appstore'
}
