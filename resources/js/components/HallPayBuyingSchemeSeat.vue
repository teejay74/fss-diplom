<template>
    <span class="buying-scheme__chair" :class="getClass" @click="chooseSeat"></span>
</template>

<script>
    export default {
        name: "HallPayBuyingSchemeSeat",
        props: ['seat', 'row'],
        data() {
            return {
                seatStatus: '',
                selectedSeat: {}
            }
        },
        methods: {
            changeClass (statusId) {
                if(statusId === 0) {
                    this.seatStatus = 0
                    return 'buying-scheme__chair_disabled'
                }
                if(statusId === 1) {
                    this.seatStatus = 1
                    return 'buying-scheme__chair_standart'
                }
                if(statusId === 2) {
                    this.seatStatus = 2
                    return 'buying-scheme__chair_vip'
                }
                if(statusId === 3) {
                    return 'buying-scheme__chair_taken'
                }

            },
            chooseSeat(event) {
                if(event.target.classList.contains('buying-scheme__chair_selected')) {
                    event.target.classList.remove('buying-scheme__chair_selected')
                    const index =  this.$store.state.selectedSeats.findIndex(n => n.id === this.selectedSeat.id )
                    if (index !== -1) {
                        this.$store.state.selectedSeats.splice(index, 1);
                    }
                    this.selectedSeat = {}

                } else {
                    if(this.seatStatus !== 3) {
                        event.target.classList.add('buying-scheme__chair_selected')
                        this.selectedSeat.id = Math.random()
                        this.selectedSeat.status = this.seatStatus
                        this.selectedSeat.row = this.row
                        this.selectedSeat.seat = this.seat
                        this.selectedSeat.price = this.seatStatus === 1 ? this.$store.state.CurrentHallClient.price:this.$store.state.CurrentHallClient.vip_price
                        this.$store.state.selectedSeats.push(this.selectedSeat)
                    }
                }
            }
        },

        computed: {
            getClass: function () {
                const seatItem = this.$store.state.CurrentHallClient.allSeats.find(el => el.row_number == this.row && el.seat_number === this.seat )
                if(this.$store.state.Orders.length > 0 && this.$store.state.Orders.find(el => el.row === this.row && el.seat === this.seat)) {
                    this.seatStatus = 3
                    return this.changeClass('3')

                } else {
                    return this.changeClass(seatItem.status)
                }

            }
        },

    }
</script>

<style scoped>

</style>
