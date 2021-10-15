<template>
    <div class="buying-scheme__row" >
        <HallPayBuyingSchemeSeat v-for="(seat, index) in $store.state.CurrentHallClient.seats" :key="index" :seat="seat" :row="row"></HallPayBuyingSchemeSeat>



    </div>
</template>

<script>
    import HallPayBuyingSchemeSeat from "./HallPayBuyingSchemeSeat";
    export default {
        name: "HallPayBuyingSchemeRow",
        components: {HallPayBuyingSchemeSeat},
        props: ['row']
    }
</script>

<style scoped>

</style>
