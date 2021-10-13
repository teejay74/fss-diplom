<template>
    <li class="movie-seances__time-block"><a class="movie-seances__time" href="hall.html">{{ time }}</a></li>
</template>

<script>
    export default {
        name: "MovieSeancesTime",
        props: ['time']
    }
</script>

<style scoped>

</style>
