// Light build: no eval-based expression engine (not used by addy-hero.json)
import lottie from 'lottie-web/build/player/lottie_light'

const container = document.getElementById('hero-lottie')
if (!container) return

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches

container.classList.add('hero-lottie--enhanced')

if (reducedMotion) {
  return
}

container.querySelector('.hero-lottie-fallback')?.remove()

const anim = lottie.loadAnimation({
  container,
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: '/assets/img/hero/addy-hero.json',
  rendererSettings: {
    preserveAspectRatio: 'xMinYMid meet',
    progressiveLoad: true,
  },
})

const resize = () => anim.resize?.()
window.addEventListener('resize', resize)
anim.addEventListener('DOMLoaded', resize)
