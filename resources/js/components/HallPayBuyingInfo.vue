<template>
    <div class="buying__info">
        <div class="buying__info-description">
            <h2 class="buying__info-title">{{ $store.state.MoviesList.find(el => el.id == $route.query.movieId).name }}</h2>
            <p class="buying__info-start">Начало сеанса: {{ $route.query.time }}</p>
            <p class="buying__info-hall">{{ $store.state.HallList.find(el => el.id == $route.query.hallId ).name}}</p>
        </div>
        <div class="buying__info-hint">
            <p>Тапните дважды,<br>чтобы увеличить</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HallPayBuyingInfo",

    }
</script>

<style scoped>

</style>
