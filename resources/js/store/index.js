// Lib imports

import { createStore } from 'vuex'
//import VuexPersistence from 'vuex-persist'
//import localforage from 'localforage'

// Store functionality

import movements from "./modules/movements"
import obstacles from "./modules/obstacles"
import planets from "./modules/planets"
import rovers from "./modules/rovers"
//Vue.use(Vuex)


// Create a new store
const store = createStore({
    modules: {
        movements,
        obstacles,
        planets,
        rovers,
    },
    mutations: {
        //RESTORE_MUTATION: vuexLocal.RESTORE_MUTATION,
    },
    plugins: [
        //vuexLocal.plugin,
    ],
})
export default store
