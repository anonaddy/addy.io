import hljs from 'highlight.js/lib/core'
import 'highlight.js/styles/dracula.css'

// Syntax highlighting
hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'))
hljs.registerLanguage('sql', require('highlight.js/lib/languages/sql'))

document.querySelectorAll('pre code').forEach((element) => {
  hljs.highlightElement(element)
})
