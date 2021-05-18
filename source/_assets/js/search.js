window.axios = require('axios')
import Vue from 'vue'

const search = require('./components/Search.vue').default

Vue.config.productionTip = false

new Vue({
  el: '#vue-search',
  render: (createElement) => createElement(search),
})
