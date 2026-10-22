// Individual / Duo & Family switch. Without JavaScript both sets of plans are shown
const tabs = [...document.querySelectorAll('.plan-switch [role="tab"]')]

const select = (tab, focus = false) => {
  tabs.forEach((t) => {
    const selected = t === tab
    t.setAttribute('aria-selected', String(selected))
    t.tabIndex = selected ? 0 : -1
    document.getElementById(t.getAttribute('aria-controls')).hidden = !selected
  })
  if (focus) tab.focus()
}

if (tabs.length) {
  const fromHash = tabs.find((t) => `#${t.getAttribute('aria-controls')}` === window.location.hash)
  select(fromHash || tabs[0])

  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => select(tab))
    tab.addEventListener('keydown', (e) => {
      if (e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') return
      const next = tabs[(i + (e.key === 'ArrowRight' ? 1 : tabs.length - 1)) % tabs.length]
      select(next, true)
    })
  })

  // Links such as "See shared plans" on the homepage land on /pricing/#shared-plans
  window.addEventListener('hashchange', () => {
    const tab = tabs.find((t) => `#${t.getAttribute('aria-controls')}` === window.location.hash)
    if (tab) select(tab)
  })
}
