<template>
    <main>
        <section class="ticket">

            <header class="tichet__check">
                <h2 class="ticket__check-title">{{ getTitle }}</h2>
            </header>

            <div class="ticket__info-wrapper">

                <p class="ticket__info">На фильм: <span class="ticket__details ticket__title">{{ $store.state.MoviesList.find(el => el.id == movieId).name }}</span></p>
                <p class="ticket__info">Места: <PaymentInfoSeats v-for="seat in $store.state.selectedSeats" :key="seat.id" :seat="seat"></PaymentInfoSeats></p>
                <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $store.state.HallList.find(el => el.id == hallId ).name}}</span></p>
                <p class="ticket__info">Начало сеанса: <span class="ticket__details ticket__start">{{ time }}</span></p>
                <p class="ticket__info">Стоимость: <span class="ticket__details ticket__cost">{{ $store.state.TotalPrice }}</span> рублей</p>
                <button class="acceptin-button" @click.prevent="getTicket" v-if="!$store.state.Ticket.loaded">Получить код бронирования</button>
                <TicketComponent  v-if="$store.state.Ticket.loaded"></TicketComponent>

                <p class="ticket__hint">{{ getTicketHint }}</p>
                <p class="ticket__hint">Приятного просмотра!</p>

            </div>
        </section>
    </main>
</template>

<script>
    import PaymentInfoSeats from "./PaymentInfoSeats";
    import TicketComponent from "./TicketComponent";
    export default {
        name: "PaymentComponent",
        components: {PaymentInfoSeats, TicketComponent},
        props: ['time', 'movieId', 'hallId', 'sessionId'],
        data() {
            return {
                ticket: {
                    sessionId: this.sessionId,
                    movieId: this.movieId,
                    hallId: this.hallId,
                    seats: JSON.stringify(this.$store.state.selectedSeats),
                    price: this.$store.state.TotalPrice
                },
            }
        },
        methods: {
            getTicket() {
                this.$store.dispatch('saveTicket', this.ticket)
            }
        },
        computed: {
            getTitle: function () {
                if(!this.$store.state.Ticket.loaded) {
                    return 'Вы выбрали билеты: '
                } else {
                    return 'Электронный билет: '
                }
             },
            getTicketHint: function () {
                if(!this.$store.state.Ticket.loaded) {
                    return 'После оплаты билет будет доступен в этом окне, а также придёт вам на почту. Покажите QR-код нашему контроллёру у входа в зал.'
                } else {
                    return 'Покажите QR-код нашему контроллеру для подтверждения бронирования.'
                }
            }
        }

    }
</script>

<style scoped>

</style>
