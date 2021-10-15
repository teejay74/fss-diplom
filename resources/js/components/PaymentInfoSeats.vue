<template>
    <span class="ticket__details ticket__chairs"> Ряд {{ seat.row }} Место {{ seat.seat }}</span>
</template>

<script>
    export default {
        name: "PaymentInfoSeats",
        props: ['seat']
    }
</script>

<style scoped>

</style>
