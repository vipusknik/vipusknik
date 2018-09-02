import 'babel-polyfill'
import './bootstrap'

window.Vue = require('vue')

Vue.component('institution-promo-carousel', require('./components/InstitutionPromoCarousel.vue'))
Vue.component('ss-select', require('./components/SSSelect.vue'))
Vue.component('jump-up-button', require('./components/JumpUpButton.vue'))
Vue.component('infinite-institution-list', require('./components/InfiniteInstitutionList.vue'))
Vue.component('institution', require('./components/Institution.vue'))
Vue.component('one-open-accordion', require('./components/OneOpenAccordion.vue'))
Vue.component('tabs', require('./components/Tabs.vue'))
Vue.component('tab', require('./components/Tab.vue'))
Vue.component('carousel', require('./components/Carousel.vue'))
Vue.component('typeahead', require('./components/Typeahead.vue'))

window.events = new Vue()

new Vue({
    el: '#app',
    data() {
        return {
            showNavMenu: false,
            showSearchMenu: false
        }
    }
})

Vue.prototype.$http = axios
