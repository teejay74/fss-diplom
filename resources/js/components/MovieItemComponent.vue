<template>

        <div class="conf-step__movie"  @click="addSession">
            <img class="conf-step__movie-poster" alt="poster" :src="item.poster">
            <h3 class="conf-step__movie-title">{{ item.name }}</h3>
            <p class="conf-step__movie-duration">{{ item.duration }} минут</p>
        </div>

</template>

<script>
    export default {
        name: "MovieItemComponent",
        props: ['item'],
        methods: {
            addSession() {
                this.$store.state.ShowTimeBuffer.movieId = this.item.id
                this.$store.state.ShowTimeBuffer.movieName = this.item.name
                this.$store.state.ShowTimeBuffer.description = this.item.description
                this.$store.state.ShowTimeBuffer.poster = this.item.poster
                this.$store.state.ShowTimeBuffer.duration = this.item.duration
                this.$store.state.Modals.addShowTime.opened = true
            }
        }

    }
</script>

<style scoped>

</style>
