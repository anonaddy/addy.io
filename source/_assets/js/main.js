import hljs from 'highlight.js/lib/highlight'

// Syntax highlighting
hljs.registerLanguage('bash', require('highlight.js/lib/languages/bash'))
hljs.registerLanguage('sql', require('highlight.js/lib/languages/sql'))

document.querySelectorAll('pre code').forEach(block => {
  hljs.highlightBlock(block)
})
