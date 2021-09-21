<template>
    <div class="popup" v-bind:class="{active: $store.state.Modals.addMovie.opened}">
        <div class="popup__container">
            <div class="popup__content">
                <div class="popup__header">
                    <h2 class="popup__title">
                        Добавление фильма
                        <span class="popup__dismiss">
                        <img alt="Закрыть" @click="$store.state.Modals.addMovie.opened = false"/>
                        </span>
                    </h2>

                </div>
                <div class="popup__wrapper">
                    <form method="post" acceptCharset="utf-8">
                    <label class="conf-step__label conf-step__label-fullsize">
                        Название фильма
                        <input class="conf-step__input" :class="{invalid: errors.title}" type="text" placeholder="Например, &laquo;Гражданин Кейн&raquo;" name="title" required  v-model.trim="formData.title">
                        <small v-if="errors.title">{{ errors.title }}</small>
                    </label>
                    <label class="conf-step__label conf-step__label-fullsize" >
                        Описание фильма
                        <input class="conf-step__input"   type="text" placeholder="Описание фильма" name="description" required v-model.trim="formData.description" />

                    </label>
                    <label class="conf-step__label conf-step__label-fullsize" htmlFor="duration">
                        Длительность фильма, в минутах
                        <input class="conf-step__input"   type="number" placeholder="Длительность" name="duration" required v-model.trim="formData.duration" />

                    </label>
                    <label class="conf-step__label conf-step__label-fullsize" htmlFor="country">
                        Страна производства
                        <input class="conf-step__input"  type="text" placeholder="Страна производства" name="country" required v-model.trim="formData.country"/>

                    </label>
                    <label class="conf-step__label conf-step__label-fullsize" htmlFor="poster">
                        <input class="conf-step__input" type="file" accept="image/*" ref="poster" required  @change="onAttachmentChange" />
                    </label>
                    <div class="conf-step__buttons text-center">
                        <input type="submit" value="Добавить фильм" class="conf-step__button conf-step__button-accent" @click.prevent="addMovie"/>
                        <button class="conf-step__button conf-step__button-regular" type="button" @click="$store.state.Modals.addMovie.opened = false">Отменить</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MovieAddPopupComponent",


        data() {
            return {
                formData: {
                    title: '',
                    description: '',
                    duration: '',
                    country: '',
                    poster: ''
                },
                errors: {
                    title: null
                }
            }
        },
        methods: {
            formIsValid() {
                let isValid = true
                if(this.formData.title.length === 0) {
                    this.errors.title = "Поле не может быть пустым"
                    isValid = false
                }
                return isValid
            },
            addMovie() {
                let form = new FormData()
                form.append('title', this.formData.title)
                form.append('description', this.formData.description)
                form.append('duration', this.formData.duration)
                form.append('country', this.formData.country)
                form.append('poster', this.formData.poster)
                //this.formData.poster = form
                if(this.formIsValid()) {
                    this.$store.dispatch('movieSave', form)
                    this.formData.title = ''
                    this.formData.description = ''
                    this.formData.duration = ''
                    this.formData.country = ''
                    this.$refs.poster.value = ''
                    this.errors.title = null
                    this.$store.state.Modals.addMovie.opened = false

                } else { console.log('Форма невалидна')}
            },

            onAttachmentChange (e) {
                this.formData.poster = e.target.files[0]
            }
        }
    }
</script>

<style scoped>
    .popup__wrapper small {
        color: red;
    }

    .invalid {
        border-color: #ff0000;
    }
</style>
