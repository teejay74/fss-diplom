export default {
    Auth: {
        login: false,
        user_id: null,
        api_token: null,
        name: null
    },
    LoadingHall: false,
    LoadingMovies: false,
    LoadingCurrentHall: false,
    LoadingCurrentHallClient: false,
    LoadingOrders: false,
    MoviesList: [],
    HallList: [],
    CurrentHall: [],
    CurrentHallForPrice: [],
    CurrentHallClient: [],
    ShowTimeList: [],
    ShowTimeBuffer: {},
    MovieShowToday: [],
    selectedSeats: [],
    TotalPrice: 0,
    Ticket: {},
    Orders: {},

    Seats: [],
    Modals: {
        addMovie: { opened: false },
        addHall: { opened: false },
        addShowTime: { opened: false },
        removeShowTime: { opened: false }
    }
}


