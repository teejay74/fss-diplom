<template>
    <main>
    <section class="movie">
        <div class="movie__info">
            <div class="movie__poster">
                <img class="movie__poster-image" alt="Звёздные войны постер" :src="item.movie_poster">
            </div>
            <div class="movie__description">
                <h2 class="movie__title">{{ item.movie_name }}</h2>
                <p class="movie__synopsis">{{ item.movie_description }}</p>
                <p class="movie__data">
                    <span class="movie__data-duration">{{ item.movie_show_duration }} минут</span>
                    <span class="movie__data-origin">США</span>
                </p>
            </div>
        </div>

            <MovieSeancesHall v-for="hall in item.halls" :key="hall.hallId" :hall="hall"></MovieSeancesHall>


    </section>
        </main>
</template>

<script>
    import MovieSeancesHall from "./MovieSeancesHall";


    export default {
        name: "MovieComponent",
        components: {
            MovieSeancesHall,
        },
        props: ['item']
    }
</script>

<style scoped>

</style>
