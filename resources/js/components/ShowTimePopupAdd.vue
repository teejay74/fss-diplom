<template>
    <div class="popup" v-bind:class="{active: $store.state.Modals.addShowTime.opened}">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__header">
                    <h2 class="popup__title">
                        Добавление сеанса {{ $store.state.ShowTimeBuffer.movieName }}
                        <a class="popup__dismiss" href="#"><img src="i/close.png" alt="Закрыть" @click="$store.state.Modals.addShowTime.opened = false"></a>
                    </h2>

                </div>
                <div class="popup__wrapper">
                    <form accept-charset="utf-8">
                        <label class="conf-step__label conf-step__label-fullsize" for="hall">
                            Название зала
                            <select class="conf-step__input" name="hall" v-model="select" required>
                                <option v-for="(hall,id) in $store.state.HallList"
                                        :key="hall.id"
                                        :hall="hall"
                                        :value="hall.id"
                                        :selected="id===0"

                                >{{hall.name}}</option>
                              </select>
                        </label>
                        <label class="conf-step__label conf-step__label-fullsize" for="name">
                            Время начала
                            <input class="conf-step__input" type="time" v-model="startTime" @change="timeChange" name="start_time" required>
                        </label>


                        <div class="conf-step__buttons text-center">
                            <input type="submit" value="Добавить" class="conf-step__button conf-step__button-accent" @click.prevent="addShowTime">
                            <button class="conf-step__button conf-step__button-regular" >Отменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ShowTimePopupAdd",
        data() {
            return {
               select: this.defaultSelect(),
               startTime: '00:00'
            }
        },



        methods: {
            addShowTime() {
                const sessionMovie = {
                    hall_id: this.select,
                    movie_id: this.$store.state.ShowTimeBuffer.movieId,
                    movie_name: this.$store.state.ShowTimeBuffer.movieName,
                    start_time: this.startTime,
                    movie_show_duration: this.$store.state.ShowTimeBuffer.duration
                }
                this.$store.state.ShowTimeList.push(sessionMovie)
                this.select = this.$store.state.HallList[0].id
                this.startTime = '00:00'
                this.$store.state.Modals.addShowTime.opened = false
            },
            defaultSelect() {
                if(this.$store.state.HallList[0]) {
                    return this.$store.state.HallList[0].id
                } else {
                    return ''
                }

            }


        }
    }
</script>

<style scoped>

</style>
