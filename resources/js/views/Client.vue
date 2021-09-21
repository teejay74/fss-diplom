<template>
    <HeaderComponent></HeaderComponent>
    <NavComponent></NavComponent>
    <MovieComponent></MovieComponent>
   <h1>Client</h1>

</template>

<script>
    import HeaderComponent from '../components/HeaderComponent'
    import NavComponent from '../components/NavComponent'
    import MovieComponent from "../components/MovieComponent";
    export default {
        name: 'Client',
        components: {
            HeaderComponent,
            NavComponent,
            MovieComponent
        },
        methods: {
            add() {
                this.$store.commit('increment')
            },
            incrementAsync() {
                this.$store.dispatch('incrementAsync')
            },
            testApi() {
               this.$store.dispatch('asyncApiArrayAdd')
            }

        }
    }
</script>

<style scoped>

</style>
