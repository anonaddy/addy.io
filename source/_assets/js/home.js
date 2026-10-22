// Hero username field: keep it to letters and numbers, and show what aliases will look like
const form = document.getElementById('hero-form')
const input = document.getElementById('hero-username')
const echo = document.getElementById('hero-username-echo')

if (form && input && echo) {
  // Firefox and Safari don't support field-sizing yet, so size the field to its text here.
  // The field uses a monospace font, so one character is exactly 1ch.
  const fitWidth = CSS.supports('field-sizing', 'content')
    ? () => {}
    : () =>
        (input.style.width = `${Math.max(input.value.length, input.placeholder.length) + 0.5}ch`)

  fitWidth()

  input.addEventListener('input', () => {
    const clean = input.value.replace(/[^a-zA-Z0-9]/g, '').slice(0, 20)
    if (clean !== input.value) input.value = clean
    echo.textContent = clean.toLowerCase() || 'johndoe'
    fitWidth()
  })

  // Don't send an empty ?username= to the sign-up page
  form.addEventListener('submit', () => {
    input.value = input.value.toLowerCase()
    input.disabled = input.value === ''
  })

  // Re-enable the field if the visitor comes back with the browser's back button
  window.addEventListener('pageshow', () => (input.disabled = false))
}

// Reviews: previous and next buttons scroll the row by one card
const reviews = document.getElementById('reviews')
const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

const step = (direction) => {
  const card = reviews.querySelector('.review')
  reviews.scrollBy({
    left: direction * (card.offsetWidth + 16),
    behavior: reducedMotion ? 'auto' : 'smooth',
  })
}

if (reviews) {
  document.getElementById('rev-prev')?.addEventListener('click', () => step(-1))
  document.getElementById('rev-next')?.addEventListener('click', () => step(1))
}
