//import Vue from 'vue'

const actions = {
    getPlanet: async function ({
        commit,
        state,
    }, planet_id) {
        try {
            //return await Vue.http.get('obstacles').then(response => {
            //    return response.json()
            //})
            console.log(planet_id)
        } catch (e) {
            console.log(e)
        } finally {

        }
    },
}

const store = {};
const mutations = {};
const getters = {};

export default {
    namespaced: true,
    actions,
    store,
    mutations,
    getters
}
