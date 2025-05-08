import axios from 'axios';
//import Vue from 'vue'

const actions = {
    getRover: async function ({
        commit,
        state,
    }, planet_id) {
        try {
            return await axios.get(`${import.meta.env.VITE_APP_API_URL}planet/${planet_id}/rover`).then(response => response.data)

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
