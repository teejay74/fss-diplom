<template>
    <main>
    <section class="buying">

        <HallPayBuyingInfo v-if="$store.state.LoadingHall && $store.state.LoadingMovies"></HallPayBuyingInfo>
        <HallPayBuyingScheme v-if="$store.state.LoadingHall && $store.state.LoadingMovies"></HallPayBuyingScheme>
    </section>
        </main>
</template>

<script>

    import HallPayBuyingInfo from "./HallPayBuyingInfo";
    import HallPayBuyingScheme from "./HallPayBuyingScheme";
    export default {
        name: "HallPay",
        components: {HallPayBuyingInfo, HallPayBuyingScheme},
        created() {
            this.$store.state.selectedSeats = []
            this.$store.dispatch('getHall')
            this.$store.dispatch('getMovie')


        },
    }
</script>

<style scoped>

</style>
