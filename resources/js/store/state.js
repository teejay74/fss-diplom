export default {
    // apiArray: [],
    Auth: {
        login: false,
        user_id: null,
        api_token: null,
        name: null
    },
    LoadingHall: false,
    MoviesList: [],
    HallList: [],
    CurrentHall: [],
    ShowTimeList: [],
    ShowTimeBuffer: {},

    Seats: [],
    Modals: {
        addMovie: { opened: false },
        addHall: { opened: false },
        addShowTime: { opened: false },
        removeShowTime: { opened: false }
    }
}


