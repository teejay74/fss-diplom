export default {
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
        state.LoadingMovies = true

    },
    getHall(state, payload) {
        state.HallList = payload
        state.LoadingHall = true

    },
    showCurrentHall(state, payload) {
        state.CurrentHall = payload
        state.CurrentHall.seatsStatus = []
        state.LoadingCurrentHall = true
    },
    showCurrentHallClient(state, payload){
        state.CurrentHallClient = payload
        state.CurrentHallClient.seatsStatus = []
        state.LoadingCurrentHallClient = true
    },
    showSeats(state, payload) {
        state.Seats = payload
    },
    showSessions(state, payload) {
        state.ShowTimeList = payload
    },
    ticketLoaded(state, payload) {
        state.Ticket.loaded = true
        state.Ticket.svg = payload
    },
    setOrders(state, payload) {
        state.LoadingOrders = true
        state.Orders = payload;

    },
    showSessionsToday(state, payload) {
        const moviesId = [...new Set(payload.map(el => el.movie_id))]
        let arr = []
        moviesId.forEach(function (movieId) {
            let movieSection = {}
            movieSection.movie_id = movieId
            let movieInfo = payload.filter(el => el.movie_id === movieId)
            movieSection.movie_name = movieInfo[0].movie_name
            movieSection.movie_description = movieInfo[0].movie_description
            movieSection.movie_poster = movieInfo[0].movie_poster
            movieSection.movie_show_duration = movieInfo[0].movie_show_duration
            const hallsId = [...new Set(movieInfo.map(el => el.hall_id))]
            let hallsArr = []
            hallsId.forEach(function (hallId) {
                let hallObj = {}
                hallObj.hallId = hallId
                let sessionArr = []
                const timesSession = payload.filter(el => el.movie_id === movieId && el.hall_id === hallId)
                timesSession.forEach(function (el) {
                    const sessionObj = {}
                    sessionObj.id = el.id
                    sessionObj.startTime = el.start_time
                    sessionArr.push(sessionObj)
                })
                hallObj.sessions = sessionArr.sort((prev, next) => prev.startTime - next.startTime)
                hallsArr.push(hallObj)
            })
            movieSection.halls = hallsArr
            arr.push(movieSection)
        })
        state.MovieShowToday = arr

    }
}
