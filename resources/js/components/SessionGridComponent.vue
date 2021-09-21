<template>

    <section class="conf-step">

        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Сетка сеансов</h2>
        </header>

        <div class="conf-step__wrapper">

            <p class="conf-step__paragraph">
                <button class="conf-step__button conf-step__button-accent" @click="$store.state.Modals.addMovie.opened = true">Добавить фильм</button>
            </p>

            <div class="conf-step__movies">
                <MovieItemComponent v-for="item in $store.state.MoviesList" :key="item.id" :item="item" ></MovieItemComponent>
            </div>


            <div class="conf-step__seances">
                <SessionGridHalls v-for="hallItem in $store.state.HallList" :key="hallItem" :hallItem="hallItem" ></SessionGridHalls>

            </div>

            <fieldset class="conf-step__buttons text-center">
                <button class="conf-step__button conf-step__button-regular">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent" >
            </fieldset>
        </div>
    </section>
</template>

<script>
    import MovieItemComponent from "./MovieItemComponent";
    import SessionGridHalls from "./SessionGridHalls";
    import { ref } from 'vue'
    export default {
        name: "SessionGridComponent",
        created() {
            this.$store.dispatch('getMovie')
        },
        components: {
            MovieItemComponent,
            SessionGridHalls
        },

    }
</script>

<style scoped>

</style>
