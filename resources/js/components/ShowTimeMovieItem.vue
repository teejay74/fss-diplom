<template>

    <div class="conf-step__seances-movie" style="background-color: rgb(133, 255, 137);" :style="style">
        <p class="conf-step__seances-movie-title">{{ session.movie_name }}</p>
        <p class="conf-step__seances-movie-start">{{ session.start_time }}</p>
    </div>
</template>

<script>
    export default {
        name: "ShowTimeMovieItem",
        props: ['session'],
        data () {
            return {
                style: ''
            }
        },
        created() {
            let minutes = this.session.start_time.split(':')
            this.style = 'width:' + ((100 * this.session.movie_show_duration) / 1440) + '%;' + "left:" + (100*((+minutes[0]*60) + (+minutes[1])) / 1440) + "%;"

        }

    }
</script>

<style scoped>

</style>
