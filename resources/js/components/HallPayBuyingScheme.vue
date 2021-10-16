<template>
    <div class="buying-scheme">
        <div class="buying-scheme__wrapper">
            <HallPayBuyingSchemeRow v-for="(row, index) in $store.state.CurrentHallClient.row" :key="index" :row="row"></HallPayBuyingSchemeRow>
        </div>
        <div class="buying-scheme__legend">
            <div class="col">
                <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_standart"></span> Свободно (<span class="buying-scheme__legend-value">{{ $store.state.CurrentHallClient.price }}</span> руб)</p>
                <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_vip"></span> Свободно VIP (<span class="buying-scheme__legend-value">{{ $store.state.CurrentHallClient.vip_price }}</span> руб)</p>
            </div>
            <div class="col">
                <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_taken"></span> Занято</p>
                <p class="buying-scheme__legend-price"><span class="buying-scheme__chair buying-scheme__chair_selected"></span> Выбрано {{ getPriceTicket }}</p>
            </div>
        </div>
    </div>


    <router-link tag="button" class="acceptin-button" v-if="$store.state.selectedSeats.length > 0" :to="{ name: 'payment', params: {time, hallId, movieId, sessionId} }" > Забронировать</router-link>



</template>

<script>
    import HallPayBuyingSchemeRow from "./HallPayBuyingSchemeRow";
    export default {
        name: "HallPayBuyingScheme",
        components: {HallPayBuyingSchemeRow},
        data() {
            return {
                sessionId: this.$route.query.sessionId,
                time: this.$route.query.startTime,
                movieId: this.$route.query.movieId,
                hallId: this.$route.query.hallId,
                item: {
                    id: this.$route.query.hallId
                },

            }
        },
        computed: {
            getPriceTicket () {
                let chooseCount = this.$store.state.selectedSeats.length
                this.$store.state.TotalPrice = this.$store.state.selectedSeats.reduce(function(prev, curr) { return prev + curr.price }, 0);
                return chooseCount + " на сумму: " +  this.$store.state.TotalPrice;
            }
        },
        created() {
           this.$store.state.Ticket = {},
           this.$store.dispatch('getCurrentHallClient', this.item)
            this.$store.state.Orders = {}
            this.$store.dispatch('getOrders', {id: this.sessionId})

        }
    }
</script>

<style scoped>

</style>
