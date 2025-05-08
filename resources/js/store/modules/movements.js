import axios from 'axios';
//import Vue from 'vue'

const actions = {
    getMovements: async function ({
        commit,
        state,
    }, { planet_id, rover_id }) {
        try {
            return await axios.get(`${import.meta.env.VITE_APP_API_URL}planet/${planet_id}/rover/${rover_id}/movement`).then(response => response.data)

        } catch (e) {
            console.log(e)
        } finally {

        }
    },
    sendCommand: async function ({
        commit,
        state,
    }, { planet_id, rover_id, command }) {
        try {
            return await axios.post(`${import.meta.env.VITE_APP_API_URL}planet/${planet_id}/rover/${rover_id}/movement`, { command }).then(response => response.data)

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
