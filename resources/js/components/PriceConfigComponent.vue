<template>
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Конфигурация цен</h2>
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
<!--                <li><input type="radio" class="conf-step__radio" name="prices-hall" value="Зал 1"><span class="conf-step__selector">Зал 1</span></li>-->
<!--                <li><input type="radio" class="conf-step__radio" name="prices-hall" value="Зал 2" checked><span class="conf-step__selector">Зал 2</span></li>-->
            </ul>

            <p class="conf-step__paragraph">Установите цены для типов кресел:</p>
            <div class="conf-step__legend">
                <label class="conf-step__label">Цена, рублей
                    <input
                        type="number"

                        min="0"
                        max="10000"
                        class="conf-step__input"
                        placeholder="300"
                        v-model="normalPrice"
                        @change="stateChange"
                    ></label>
                за <span class="conf-step__chair conf-step__chair_standart"></span> обычные кресла
            </div>
            <div class="conf-step__legend">
                <label class="conf-step__label">Цена, рублей
                    <input
                        type="number"
                        min="0"
                        max="10000"
                        class="conf-step__input"
                        placeholder="600"
                        v-model="vipPrice"
                        @change="stateChange"
                    ></label>
                за <span class="conf-step__chair conf-step__chair_vip"></span> VIP кресла
            </div>

            <fieldset class="conf-step__buttons text-center">
                <button class="conf-step__button conf-step__button-regular" @click="resetForm">Отмена</button>
                <input type="submit" value="Сохранить" class="conf-step__button conf-step__button-accent" @click.prevent="updateConfigHall">
            </fieldset>
        </div>
    </section>
</template>

<script>
    import HallConfigItemComponent from "./HallConfigItemComponent";
    export default {
        name: "PriceConfigComponent",
        components: {HallConfigItemComponent},
        data() {
            return {
                loading: false,
                normalPrice: 0,
                vipPrice: 0,
                name: "prices-hall"
            }
        },
        methods: {
            getCurrentHall(item) {
                axios.post('/api/get-current-hall', item).then(response => {
                    console.log(response.data)
                    this.$store.state.CurrentHall = response.data
                    this.normalPrice = this.$store.state.CurrentHall.price
                    this.vipPrice = this.$store.state.CurrentHall.vip_price
                }).catch(error => console.error(error));

            },
            stateChange () {
                this.$store.state.CurrentHall.price = this.normalPrice
                this.$store.state.CurrentHall.vip_price = this.vipPrice
            },
            updateConfigHall() {
                this.$store.dispatch('updatePrice', this.$store.state.CurrentHall)
            },
            resetForm() {
                axios.post('/api/get-current-hall', this.$store.state.CurrentHall).then(response => {
                    this.$store.state.CurrentHall = response.data
                    this.normalPrice = this.$store.state.CurrentHall.price
                    this.vipPrice = this.$store.state.CurrentHall.vip_price
                }).catch(error => console.error(error));

            },
        }
    }
</script>

<style scoped>

</style>
