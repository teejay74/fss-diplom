<template>
    <a class="page-nav__day" v-bind:class="[{'page-nav__day_today': item.id === 0 }, {'page-nav__day_chosen': item.active}]" href="#" @click="open">
        <span class="page-nav__day-week">{{ item.dayOfWeek }}</span><span class="page-nav__day-number">{{ item.calendarDay }}</span>
    </a>

</template>

<script>
    export default {
        props: ['item'],
        name: "DayItem",
        created() {
            if(this.item.id === 0) {
                this.open()
            }
        },
        methods: {
            open() {
                this.$emit('close-items', this.item.id)
                this.$store.dispatch('getMovieToDay', this.item)
                this.$store.dispatch('getHall')

            }
        }
     }
</script>

<style scoped>

</style>
