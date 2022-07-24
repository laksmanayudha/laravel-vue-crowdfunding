import Vue from 'vue'
import Vuex from 'vuex'
import router from './router.js'
import App from './App.vue'
import vuetify from './plugins/vuetify.js'
import './bootstrap.js'

Vue.use(Vuex)

const store = new Vuex.Store({
    state: {
        donationCount: 0
    },
    mutations: {
        addDonationCount(state){
            state.donationCount++
        }
    }
})

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    store,
    components: {
        App,
    },
})