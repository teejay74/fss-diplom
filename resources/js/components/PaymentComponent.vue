<template>
    <main>
        <section class="ticket">

            <header class="tichet__check">
                <h2 class="ticket__check-title">Вы выбрали билеты:</h2>
            </header>

            <div class="ticket__info-wrapper">
                <p class="ticket__info">На фильм: <span class="ticket__details ticket__title">{{ $store.state.MoviesList.find(el => el.id == movieId).name }}</span></p>
                <p class="ticket__info">Места: <PaymentInfoSeats v-for="seat in seats" :key="seat.id" :seat="seat"></PaymentInfoSeats></p>
                <p class="ticket__info">В зале: <span class="ticket__details ticket__hall">{{ $store.state.HallList.find(el => hallId ).name}}</span></p>
                <p class="ticket__info">Начало сеанса: <span class="ticket__details ticket__start">{{ time }}</span></p>
                <p class="ticket__info">Стоимость: <span class="ticket__details ticket__cost">{{ $store.state.TotalPrice }}</span> рублей</p>
                {{ $store.state.MovieShowToday }}
                <button class="acceptin-button" @click.prevent="getTicket" >Получить код бронирования</button>

                <p class="ticket__hint">После оплаты билет будет доступен в этом окне, а также придёт вам на почту. Покажите QR-код нашему контроллёру у входа в зал.</p>
                <p class="ticket__hint">Приятного просмотра!</p>

            </div>
        </section>
    </main>
</template>

<script>
    import PaymentInfoSeats from "./PaymentInfoSeats";
    export default {
        name: "PaymentComponent",
        components: {PaymentInfoSeats},
        props: ['time', 'movieId', 'hallId'],
        data() {
            return {
                seats: this.$store.state.selectedSeats

            }
        },
        methods: {
            getTicket() {
                console.log('ok')
            }
        }

    }
</script>

<style scoped>

</style>
