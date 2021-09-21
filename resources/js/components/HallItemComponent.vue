<template>
    <li>{{ item.name }}
        <button class="conf-step__button conf-step__button-trash" @click="hallDelete"></button>
    </li>
</template>

<script>
    export default {
        name: "HallItemComponent",
        props: ['item'],
        methods: {
            hallDelete() {
                this.$store.dispatch('deleteHall', this.item)
            }
        }
    }
</script>

<style scoped>

</style>
