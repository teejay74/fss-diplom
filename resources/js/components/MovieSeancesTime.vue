<template>
   <li class="movie-seances__time-block"> <router-link tag="a" class="movie-seances__time" :to="{ name: 'hall', query: {sessionId, startTime, hallId, movieId} }" > {{ session.startTime }}</router-link></li>
</template>

<script>
    export default {
        name: "MovieSeancesTime",
        props: ['session', 'hallId', 'movieId'],
        data() {
            return {
                startTime: this.session.startTime,
                sessionId: this.session.id
            }
        }
    }
</script>

<style scoped>

</style>
