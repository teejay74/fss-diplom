<template>

    <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">{{ hall }}</h3>
        <ul class="movie-seances__list">
            <MovieSeancesTime v-for="(time, index) in hall.times" :key="index" :time="time"></MovieSeancesTime>
        </ul>
    </div>
</template>

<script>
    import MovieSeancesTime from "./MovieSeancesTime";
    export default {
        name: "MovieSeancesHall",
        props: ['hall'],
        components: {
            MovieSeancesTime
        }
    }
</script>

<style scoped>

</style>
