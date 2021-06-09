import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    namespaced: true,
    state: {
        //     days: [
        //         { id: 0, name: "Sun" },
        //         { id: 1, name: "Mon" },
        //         { id: 2, name: "Tue" },
        //         { id: 3, name: "Wed" },
        //         { id: 4, name: "Thu" },
        //         { id: 5, name: "Fri" },
        //         { id: 6, name: "Sat" },
        //     ],
        //     events: [],
    },
    mutations: {
        // updateCalendar(state, events) {
        //     state.events = events;
        // }
    },
    actions: {
        // getEvent({ commit }) {
        //     //fetch the product and their attached categories from the api
        //     axios.get('/api/get-events')
        //         .then((response) => {
        //             commit('updateCalendar', response.data);
        //         })
        //         .catch((error) => console.log(error));
        // },

    },
})