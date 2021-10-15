<template>
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Конфигурация залов</h2>
        </header>
        <div class="conf-step__wrapper">
            <p class="conf-step__paragraph">Выберите зал для конфигурации:</p>
            <ul class="conf-step__selectors-box">
               <HallConfigItemComponent
                   v-for="(item, id) in $store.state.HallList"
                   :id="id"
                   :key="item.id"
                   :item="item"
                    :name="name"
                   @sendHall="getCurrentHall($event)"
               ></HallConfigItemComponent>
            </ul>
            <p class="conf-step__paragraph">Укажите количество рядов и максимальное количество кресел в ряду:</p>
            <div class="conf-step__legend">
                <label class="conf-step__label">Рядов, шт
                    <input
                        v-if="loading"
                        type="number"
                        min="1"
                        max="15"
                        class="conf-step__input"
                        placeholder="10"
                        @change="stateChange"
                        v-model="stateRow"

                    ></label>
                <span class="multiplier">x</span>
                <label class="conf-step__label">Мест, шт
                    <input type="number"
                           v-if="loading"
                           min="1"
                           max="15"
                           class="conf-step__input"
                           placeholder="10"
                           @change="stateChange"
                           v-model="stateSeats"

                    ></label>
            </div>
            <p class="conf-step__paragraph">Теперь вы можете указать типы кресел на схеме зала:</p>
            <div class="conf-step__legend">
                <span class="conf-step__chair conf-step__chair_standart"></span> — обычные кресла
                <span class="conf-step__chair conf-step__chair_vip"></span> — VIP кресла
                <span class="conf-step__chair conf-step__chair_disabled"></span> — заблокированные (нет кресла)
                <p class="conf-step__hint">Чтобы изменить вид кресла, нажмите по нему левой кнопкой мыши</p>
            </div>

            <div class="conf-step__hall">
                <div class="conf-step__hall-wrapper">

                    <div class="conf-step__row">

                        <HallRow v-for="(row, id) in +$store.state.CurrentHall.row"
                                  :key="id"
                                  :row="row"
                                  :hallId ="$store.state.CurrentHall.id"
                                  :loading = 'loading'
                        ></HallRow>
                    </div>
                </div>
            </div>

            <fieldset class="conf-step__buttons text-center">
                <button class="conf-step__button conf-step__button-regular" @click="resetForm">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent" @click="updateConfigHall">
            </fieldset>
        </div>
    </section>
</template>

<script>
    import HallConfigItemComponent from "./HallConfigItemComponent";
    import HallRow from "./HallRow";
    import SeatComponent from "./SeatComponent";
    export default {
        name: "HallConfigComponent",
        components: {
            HallConfigItemComponent,
            HallRow,
            SeatComponent
        },
        data() {
          return {
              loading: false,
              stateRow: 0,
              stateSeats: 0,
              name: "chairs-hall"
          }
        },

        methods: {
            getCurrentHall(item) {
                axios.post('/api/get-current-hall', item).then(response => {
                    this.$store.state.CurrentHall = response.data
                    this.$store.state.CurrentHall.seatsStatus = []
                    this.stateRow = this.$store.state.CurrentHall.row
                    this.stateSeats = this.$store.state.CurrentHall.seats
                    this.loading = true

                }).catch(error => console.error(error));
            },
            updateConfigHall() {
                this.$store.dispatch('updateHall', this.$store.state.CurrentHall)
            },
            resetForm() {
                this.$store.dispatch('getCurrentHall', this.$store.state.CurrentHall)
            },
            stateChange () {
                this.$store.state.CurrentHall.row = this.stateRow
                this.$store.state.CurrentHall.seats = this.stateSeats
            }

        }
    }
</script>

<style scoped>

</style>
