<template>
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Управление залами</h2>
        </header>
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Доступные залы:</p>
            <ul class="conf-step__list">
                <HallItemComponent v-for="item in $store.state.HallList" :key="item.id" :item="item"></HallItemComponent>
            </ul>
            <button class="conf-step__button conf-step__button-accent" @click="$store.state.Modals.addHall.opened = true">Создать зал</button>
        </div>
    </section>
</template>

<script>

    import HallItemComponent from "./HallItemComponent";

    export default {
        name: "HallControlComponent",
        components: {
            HallItemComponent,
        },
        created() {
            this.$store.dispatch('getHall')
        },
    }
</script>

<style scoped>

</style>
