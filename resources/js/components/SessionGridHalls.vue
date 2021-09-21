<template>
    <div class="conf-step__seances-hall" >
        <h3 class="conf-step__seances-title">{{hallItem.name}}</h3>
        <div class="conf-step__seances-timeline">

<!-- <ShowTimeMovieItem v-for="(movie,id) in $store.state.ShowTimeList" :key="id" :movie="movie" :hallItem="hallItem"></ShowTimeMovieItem>-->

        </div>
    </div>
</template>

<script>
    import ShowTimeMovieItem from "./ShowTimeMovieItem";
    export default {
        name: "SessionGridHalls",
        props: ['hallItem']

    }
</script>

<style scoped>

</style>
