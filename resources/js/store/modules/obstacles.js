//import Vue from 'vue'
import axios from 'axios';

const actions = {
    getAllObstacles: async function ({
        commit,
        state,
    }, planet_id) {
        try {
            //return await Vue.http.get('obstacles').then(response => {
            //    return response.json()
            //})
            return await axios.get(`http://localhost:8000/api/planet/${planet_id}/obstacle`).then(response => response)
            //console.log(planet_id)
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
