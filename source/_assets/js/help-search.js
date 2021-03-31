window.axios = require('axios')
window.fuse = require('fuse.js')
import Vue from 'vue'

const search = require('./components/HelpSearch.vue').default

Vue.config.productionTip = false

new Vue({
  el: '#vue-help-search',
  render: (createElement) => createElement(search),
})
