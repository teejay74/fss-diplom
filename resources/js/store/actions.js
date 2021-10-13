import Auth from "../helpers/Auth"


export default {
    login({commit}, payload) {
        axios.post('/api/login', payload).then(response => {
            if(response.data.success) {
                Auth.login(response.data.user);
               }
        }).catch(error => {
            this.errors = error.response.data.errors;
        });
    },
    register({commit}, payload) {
        axios.post('/api/register', payload).then(response => {
            commit('registerFromAction', response.data)
        })
    },
    movieSave({commit}, payload) {
        axios.post('api/movie-save', payload).then(response => {
            commit('getMovie', response.data)

        }).catch(error => console.error(error));
    },
    getMovie({commit}, payload) {
        axios.get('/api/get-movie', payload).then(response => {
            commit('getMovie', response.data)
        }).catch(error => console.error(error));
    },
    hallSave({commit}, payload) {
        axios.post('api/hall-save', payload).then(response => {
            commit('getHall', response.data)
        }).catch(error => console.error(error));
    },
    getHall({commit}, payload) {
        axios.get('/api/get-hall', payload).then(response => {
            commit('getHall', response.data)
        }).catch(error => console.error(error));
    },
    deleteHall({commit}, payload) {
        axios.post('/api/hall-delete', payload).then(response => {
           commit('getHall', response.data)
        }).catch(error => console.error(error));
    },
    getCurrentHall({commit}, payload) {        axios.post('/api/get-current-hall', payload).then(response => {
            commit('showCurrentHall', response.data)
        }).catch(error => console.error(error));
    },
    updateHall({commit}, payload) {
        axios.post('/api/update-hall', payload).then(response => {
            //commit('showCurrentHall', response.data)
        }).catch(error => console.error(error));
    },
    updatePrice({commit}, payload) {
        axios.post('/api/update-price', payload).then(response => {

            //commit('showCurrentHall', response.data)
        }).catch(error => console.error(error));
    },
    getSeat({commit}, payload) {
        axios.post('/api/get-seat', payload).then(response => {
            commit('showSeats', response.data)
        }).catch(error => console.error(error));
    },
    saveSessions({commit}, payload) {
        axios.post('/api/save-sessions', payload).then(response => {
            commit('showSessions', response.data)
        }).catch(error => console.error(error));
    },
    getSessions({commit}, payload) {
        axios.post('/api/get-sessions', payload).then(response => {
            commit('showSessions', response.data)
        }).catch(error => console.error(error));
    },
    getMovieToDay({commit}, payload) {
        axios.post('/api/get-movie-today', payload).then(response => {

            commit('showSessionsToday', response.data)
        }).catch(error => console.error(error));
    },
}
