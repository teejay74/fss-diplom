<template>
   <li class="movie-seances__time-block"> <router-link tag="a" class="movie-seances__time" :to="{ name: 'hall', query: {time, hallId, movieId} }" > {{ time }}</router-link></li>
</template>

<script>
    export default {
        name: "MovieSeancesTime",
        props: ['time', 'hallId', 'movieId']
    }
</script>

<style scoped>

</style>
