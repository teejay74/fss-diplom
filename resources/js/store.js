import { createStore } from 'vuex'
import axios from "axios";
import state from "./store/state";
import actions from "./store/actions";
import getters from "./store/getters"
import mutations from "./store/mutations";

export default createStore({
    state() {
        return state
    },
    mutations,
    actions,
    getters
})
