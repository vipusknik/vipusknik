import 'babel-polyfill'
import './bootstrap'

window.Vue = require('vue')

Vue.component('institution-promo-carousel', require('./components/InstitutionPromoCarousel.vue'))
Vue.component('cool-select', require('./components/CoolSelect.vue'))
Vue.component('jump-up-button', require('./components/JumpUpButton.vue'))

new Vue({
    el: '#app',
    data() {
        return {
            showNavMenu: false,
            showSearchMenu: false
        }
    }
})
