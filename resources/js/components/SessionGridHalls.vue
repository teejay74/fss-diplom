<template>
    <div class="conf-step__seances-hall" >
        <h3 class="conf-step__seances-title">{{hallItem.name}}</h3>
        <div class="conf-step__seances-timeline">

        <ShowTimeMovieItem v-for="(session,id) in filteredHall()" :key="id" :session="session" :hallItem="hallItem"></ShowTimeMovieItem>

        </div>
    </div>
</template>

<script>
    import ShowTimeMovieItem from "./ShowTimeMovieItem";
    export default {
        name: "SessionGridHalls",
        props: ['hallItem'],
        components: {ShowTimeMovieItem},
        methods: {
            filteredHall() {
               return this.$store.state.ShowTimeList.filter(n => n.hall_id === this.hallItem.id)
            }
        },
        created() {
            console.log(this.$store.state.ShowTimeList.filter(n => n.hall_id === this.hallItem.id))
        }

    }
</script>

<style scoped>

</style>
