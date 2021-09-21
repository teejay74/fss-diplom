import store from "../store";

export default {
    init() {
        store.commit("changeLoginState");
        if (store.state.Auth.api_token) {
            axios.defaults.headers.common["Authorization"] =
                "Bearer " + store.state.Auth.api_token;        }
    },

    login(data) {
        console.log(data)
        localStorage.setItem("user_id", data.user_id);
        localStorage.setItem("api_token", data.api_token);
        localStorage.setItem("name", data.name);
        this.init();
        },

    logout() {
        localStorage.removeItem("user_id");
        localStorage.removeItem("api_token");
        localStorage.removeItem("name");

    },

    check() {
        // if (!store.state.Auth.login) {
        //     router.push("/login");
        // }
    }
};
