<template>
<div class="conf-step__row">

        <HallSeat v-for="(seat, id) in +$store.state.CurrentHall.seats"
         :key="id + Math.random()"
         :row="row"
         :seat="seat"
         :hallId="hallId"
         v-if="loading"

        ></HallSeat>
</div>
</template>

<script>
    import HallSeat from "./HallSeat";
    export default {
        name: "HallRow",
        props: ['row', 'hallId', 'loading'],
        components: {HallSeat},

    }
</script>

<style scoped>

</style>
