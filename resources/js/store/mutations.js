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
        state.LoadingHall = true

    },
    showCurrentHall(state, payload) {
        state.CurrentHall = payload
        state.CurrentHall.seatsStatus = []
    },
    showSeats(state, payload) {
        state.Seats = payload
    },
    showSessions(state, payload) {
        state.ShowTimeList = payload
    },
    showSessionsToday(state, payload) {
        const moviesId = [...new Set(payload.map(el => el.movie_id))]
        console.log(moviesId)
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

                let timesArr = []
                const timesSession = payload.filter(el => el.movie_id === movieId && el.hall_id === hallId)

                timesSession.forEach(el => timesArr.push(el.start_time))
                hallObj.times = timesArr.sort()
                hallsArr.push(hallObj)
            })
            movieSection.halls = hallsArr


            arr.push(movieSection)
        })




        state.MovieShowToday = arr

    }
}
