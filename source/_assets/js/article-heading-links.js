document.addEventListener('DOMContentLoaded', () => {
  const article = document.querySelector('article.article-with-heading-links')
  if (!article) return

  const headings = article.querySelectorAll('h2[id], h3[id]')
  if (headings.length === 0) return

  const copyIcon =
    '<svg class="w-4 h-4" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>'
  const checkIcon =
    '<svg class="w-4 h-4 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" /></svg>'

  headings.forEach((heading) => {
    heading.classList.add('flex', 'items-center', 'gap-2', 'flex-wrap')

    const btn = document.createElement('button')
    btn.type = 'button'
    btn.className =
      'copy-link-btn inline-flex items-center justify-center p-1 rounded text-grey-400 hover:text-indigo-600 hover:bg-indigo-50 transition-colors focus:outline-none shrink-0 cursor-pointer'
    btn.innerHTML = copyIcon
    btn.title = 'Copy link to this section'
    btn.setAttribute('aria-label', 'Copy link to this section')

    btn.addEventListener('click', () => {
      const url = `${window.location.href.split('#')[0]}#${heading.id}`
      navigator.clipboard.writeText(url).then(() => {
        btn.innerHTML = checkIcon
        btn.title = 'Copied!'
        setTimeout(() => {
          btn.innerHTML = copyIcon
          btn.title = 'Copy link to this section'
        }, 2000)
      })
    })

    heading.appendChild(btn)
  })
})
