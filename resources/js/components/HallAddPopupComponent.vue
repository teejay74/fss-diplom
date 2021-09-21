<template>
    <div class="popup" v-bind:class="{active: $store.state.Modals.addHall.opened}">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__header">
                    <h2 class="popup__title">
                        Добавление зала
                        <span class="popup__dismiss">
                        <img alt="Закрыть" @click="$store.state.Modals.addHall.opened = false"/>
                        </span>
                    </h2>

                </div>
                <div class="popup__wrapper">
                    <form method="post" accept-charset="utf-8">
                        <label class="conf-step__label conf-step__label-fullsize" for="name">
                            Название зала
                            <input
                                class="conf-step__inputв"
                                type="text" placeholder="Например, &laquo;Зал 1&raquo;"
                                name="name"
                                v-model.trim="formData.nameHall"
                                required>
                        </label>
                        <div class="conf-step__buttons text-center">
                            <input type="submit" value="Добавить зал" class="conf-step__button conf-step__button-accent" @click.prevent="addHall">
                            <button class="conf-step__button conf-step__button-regular" @click="$store.state.Modals.addHall.opened = false">Отменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HallAddPopupComponent",
        data() {
            return {
                formData: {
                    nameHall: ''
                }
            }
        },
        methods: {
            addHall() {
                this.$store.dispatch('hallSave', this.formData)
                this.formData.nameHall = ''
                this.$store.state.Modals.addHall.opened = false


            }
        }

    }
</script>

<style scoped>

</style>
