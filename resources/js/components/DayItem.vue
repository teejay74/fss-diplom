<template>
    <a class="page-nav__day" v-bind:class="[{'page-nav__day_today': id === 0 }, {'page-nav__day_chosen': active}]" href="#" @click="open">
        <span class="page-nav__day-week">{{ dayOfWeek }}</span><span class="page-nav__day-number">{{ calendarDay }}</span>
    </a>
</template>

<script>
    export default {
        props: {
            dayOfWeek: String,
            id: Number,
            calendarDay: String,
            active: Boolean
        },
        name: "DayItem",

        methods: {
            open() {
                this.$emit('close-items', this.id)
            }
        }
     }
</script>

<style scoped>

</style>
