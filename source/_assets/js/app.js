;(function () {
  var ps = document.createElement('script')
  ps.defer = 1
  ps.dataset.api = '/api/event'
  ps.dataset.domain = 'anonaddy.com'
  ps.src = '/js/script.js'

  var tag = document.getElementsByTagName('script')[0]
  tag.parentNode.insertBefore(ps, tag)

  window.plausible =
    window.plausible ||
    function () {
      ;(window.plausible.q = window.plausible.q || []).push(arguments)
    }
})()
