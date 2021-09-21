<template>
    <span class="conf-step__chair" :class="seatStatus[statusId]" @click="changeStatus"></span>
</template>

<script>
    export default {
        name: "HallSeat",
        data () {
          return {
              seatStatus: [
                  'conf-step__chair_disabled',
                  'conf-step__chair_standart',
                  'conf-step__chair_vip'
              ],
              statusId: 1
          }
        },

        props: ['seat', 'row', 'hallId'],
        methods: {
            changeStatus () {
                if(this.statusId == 2) {
                    this.statusId = 0
                } else {
                    this.statusId++
                }

                this.$store.state.CurrentHall.seatsStatus.push({
                    row: this.row,
                    seat: this.seat,
                    status: this.statusId
                })

            },

        },


        created() {
            this.statusId = 0
            let seatItem = this.$store.state.CurrentHall.allSeats.find(el => el.row_number === this.row && el.seat_number === this.seat && el.hall_id === this.hallId)

                if(seatItem) {
                    this.statusId = seatItem.status;

                }

        }

    }
</script>

<style scoped>

</style>
