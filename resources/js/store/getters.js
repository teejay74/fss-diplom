export default {
    counter(state) {
        return state.counter
    },
    doubleCounter(state, getters) {
        return getters.counter * 2
    },
    // apiData(state) {
    //     return state.apiArray
    // }
}
