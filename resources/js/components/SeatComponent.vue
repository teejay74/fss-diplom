<template>
    <div>{{ $store.state.CurrentHall.allSeats.find(el => el.row_number === item) }}</div>
</template>

<script>
    export default {
        name: "SeatComponent",
        props: ["item", "id"],
    }
</script>

<style scoped>

</style>
