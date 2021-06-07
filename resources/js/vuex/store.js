import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    namespaced: true,
    state: {
        days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    },
    actions: {
        createEvent() {

        }
    },
    mutations: {
        createEvent(state, event) {
            console.log('nice');
        }
    },
})