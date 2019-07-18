window.axios = require('axios')
window.fuse = require('fuse.js')
window.Vue = require('vue')

import Search from './components/Search.vue'

Vue.config.productionTip = false

new Vue({
  components: {
    Search,
  },
}).$mount('#vue-search')
