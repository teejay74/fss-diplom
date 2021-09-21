<template>

    <MovieAddPopupComponent></MovieAddPopupComponent>
    <HallAddPopupComponent></HallAddPopupComponent>
    <ShowTimePopupAdd></ShowTimePopupAdd>
    <ShowTimePopupRemove></ShowTimePopupRemove>

    <header class="page-header">
        <h1 class="page-header__title">Идём<span>в</span>кино</h1>
        <span class="page-header__subtitle">Администраторррская</span>
    </header>

    <main class="conf-steps">
        <HallControlComponent></HallControlComponent>
        <HallConfigComponent></HallConfigComponent>
        <SessionGridComponent></SessionGridComponent>
        <PriceConfigComponent></PriceConfigComponent>
        <SalesManagementComponent></SalesManagementComponent>
    </main>

</template>

<script>
     import Auth from "../helpers/Auth";
     import SessionGridComponent from "../components/SessionGridComponent";
     import MovieAddPopupComponent from "../components/MovieAddPopupComponent";
     import HallAddPopupComponent from "../components/HallAddPopupComponent";
     import HallControlComponent from "../components/HallControlComponent";
     import HallConfigComponent from "../components/HallConfigComponent";
     import PriceConfigComponent from "../components/PriceConfigComponent";
     import SalesManagementComponent from "../components/SalesManagementComponent";
     import ShowTimePopupAdd from "../components/ShowTimePopupAdd";
     import ShowTimePopupRemove from "../components/ShowTimePopupRemove";

     export default {
        name: "Admin",
        components: {
            SessionGridComponent,
            MovieAddPopupComponent,
            HallAddPopupComponent,
            HallControlComponent,
            HallConfigComponent,
            PriceConfigComponent,
            SalesManagementComponent,
            ShowTimePopupAdd,
            ShowTimePopupRemove
        },

         created() {
            Auth.init();

            if(!this.$store.state.Auth.login) {
               this.$router.push('/login')
            }
        }
    }
</script>

<style scoped>

</style>
