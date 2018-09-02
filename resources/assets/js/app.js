import 'babel-polyfill'
import './bootstrap'
import VModal from 'vue-js-modal'

window.Vue = require('vue')
Vue.use(VModal)

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
            showSearchMenu: false,

            feedback: {
                sender_name: '',
                sender_mail_or_phone: '',
                body: ''
            },

            sendingFeedback: false
        }
    },

    methods: {
        onFeedbackSubmit() {
            this.sendingFeedback = true
            axios.post('/feedback', this.feedback)
              .then(response => {
                    this.sendingFeedback = false
                    this.$modal.hide('feedback-modal')

                    if (response.data.status == 'ok') {
                        return alert('Ваше сообщение отправлено!')
                    }

                    return alert('Ошибка. Сообщение не отправлено!')
              })
              .catch(() => {
                  this.sendingFeedback = false
                  this.$modal.hide('feedback-modal')
                  alert('Ошибка при обработке данных!')
              })
        }
    }
})

Vue.prototype.$http = axios
