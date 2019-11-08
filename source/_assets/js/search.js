window.axios = require('axios')
window.fuse = require('fuse.js')
window.Vue = require('vue')

Vue.component('search', require('./components/Search.vue').default)

Vue.config.productionTip = false

new Vue({
  el: '#vue-search',
})
