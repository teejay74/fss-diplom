<template>

    <div class="movie-seances__hall">
        <h3 class="movie-seances__hall-title">{{ $store.state.HallList.find(el => el.id === hall.hallId ).name }}</h3>

        <ul class="movie-seances__list">

            <MovieSeancesTime v-for="(session, index) in hall.sessions"
                              :key="index"
                              :session="session"
                              :hallId="hall.hallId"
                              :movieId="item.movie_id"
                              v-if="$store.state.HallList.find(el => el.id === hall.hallId ).is_active === 1"

            ></MovieSeancesTime>
        </ul>
    </div>
</template>

<script>
    import MovieSeancesTime from "./MovieSeancesTime";
    export default {
        name: "MovieSeancesHall",
        props: ['hall', 'item'],
        components: {
            MovieSeancesTime
        }
    }
</script>

<style scoped>

</style>
