export default {
    // apiArrayAdd(state, payload) {
    //     state.apiArray = payload
    // },
    changeLoginState(state) {

        state.Auth.user_id = localStorage.getItem("user_id");
        state.Auth.api_token = localStorage.getItem("api_token");
        state.Auth.name = localStorage.getItem("name");
        state.Auth.login =
            state.Auth.user_id !== null &&
            state.Auth.api_token !== null &&
            state.Auth.name !== null;
    },
    registerFromAction(state, payload) {
        console.log(payload.success)
    },

    getMovie(state, payload) {
        state.MoviesList = payload

    },
    getHall(state, payload) {

        state.HallList = payload

    },
    showCurrentHall(state, payload) {
        state.CurrentHall = payload
        state.CurrentHall.seatsStatus = []


    },
    showSeats(state, payload) {

        state.Seats = payload


    }
}
