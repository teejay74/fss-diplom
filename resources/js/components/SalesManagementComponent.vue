<template>
    <section class="conf-step">
        <header class="conf-step__header conf-step__header_opened">
            <h2 class="conf-step__title">Открыть продажи</h2>
        </header>
        <div class="conf-step__wrapper text-center">
            <p class="conf-step__paragraph">Всё готово, теперь можно:</p>
            <button class="conf-step__button conf-step__button-accent" @click.prevent="changeStatus">{{ changeStatusText }}</button>
        </div>
    </section>
</template>

<script>
    export default {
        name: "SalesManagementComponent",
        data() {
            return {
              active: false,
            }
        },
        computed: {
            changeStatusText: function () {
                this.active = this.$store.state.HallList[0] ? this.$store.state.HallList[0].is_active:0
                return  this.active ? 'Закрыть продажу билетов':'Открыть продажу билетов'
            }
        },

        methods: {
            changeStatus() {
                let isActive = this.$store.state.HallList[0] ? this.$store.state.HallList[0].is_active:0
                axios.post('/api/save-status-hall', {status: !isActive}).then(response => {
                    this.$store.dispatch('getHall')
                    this.active = !this.active
                }).catch(error => console.error(error));

            }
        }
    }
</script>

<style scoped>

</style>
