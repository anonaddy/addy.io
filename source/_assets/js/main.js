const menu = document.getElementById('mobile-menu')
const menuButtons = [...document.getElementsByClassName('mobile-menu-button')]

const mobileMenu = () => {
  menu.classList.toggle('hidden')
}

menuButtons.forEach((button) => button.addEventListener('click', mobileMenu))

// App Store mode (?ref=appstore, set by the inline script in the layout). Apple rejects app builds
// that link to pages showing prices, so remove everything marked data-pricing and any link to
// /pricing/, and keep the flag on internal links so it survives navigation.
if (document.documentElement.classList.contains('appstore')) {
  document.querySelectorAll('[data-pricing]').forEach((el) => el.remove())
  document.querySelectorAll('a[href^="/pricing"]').forEach((a) => a.replaceWith(...a.childNodes))

  document.querySelectorAll('a[href]').forEach((a) => {
    const samePageAnchor = a.pathname === window.location.pathname && a.hash
    if (a.host !== window.location.host || samePageAnchor) return
    const url = new URL(a.href)
    url.searchParams.set('ref', 'appstore')
    a.href = url.pathname + url.search + url.hash
  })
}

;(() => {
  // Colour theme: 'light', 'dark' or 'system'. The inline script in the layout applies it before paint
  const root = document.documentElement
  const media = window.matchMedia('(prefers-color-scheme: dark)')
  const select = document.getElementById('theme-select')

  const getChoice = () => root.getAttribute('data-theme-choice') || 'system'

  const apply = (choice) => {
    root.classList.toggle('dark', choice === 'dark' || (choice === 'system' && media.matches))
    root.setAttribute('data-theme-choice', choice)
    if (select) select.value = choice
  }

  const save = (choice) => {
    try {
      if (choice === 'system') {
        localStorage.removeItem('theme')
      } else {
        localStorage.setItem('theme', choice)
      }
    } catch (e) {
      // Storage can be blocked, the theme still applies for this page view
    }
    apply(choice)
  }

  apply(getChoice())
  media.addEventListener('change', () => getChoice() === 'system' && apply('system'))
  select?.addEventListener('change', () => save(select.value))
  document
    .querySelectorAll('.theme-toggle')
    .forEach((button) =>
      button.addEventListener('click', () =>
        save(root.classList.contains('dark') ? 'light' : 'dark')
      )
    )
})()

;(() => {
  // Load Turnstile for the footer newsletter form only when someone starts to use it
  const email = document.getElementById('footer-newsletter-email')
  const container = document.querySelector('.footer-turnstile')
  if (!email || !container) return

  let started = false
  const render = () =>
    window.turnstile.render(container, {
      sitekey: container.dataset.sitekey,
      action: 'newsletter',
      appearance: 'interaction-only',
      theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light',
      size: 'flexible',
    })

  email.addEventListener('focus', () => {
    if (started) return
    started = true
    if (window.turnstile) return render()
    window.addyFooterTurnstile = render
    const script = document.createElement('script')
    script.src = 'https://challenges.cloudflare.com/turnstile/v0/api.js?onload=addyFooterTurnstile'
    script.async = true
    document.head.appendChild(script)
  })
})()

;(() => {
  const name = 'outbound-link-click'
  document.querySelectorAll('a').forEach((a) => {
    if (a.host !== window.location.host && !a.getAttribute('data-umami-event')) {
      a.setAttribute('data-umami-event', name)
      a.setAttribute('data-umami-event-url', a.href)
    }
  })
})()
