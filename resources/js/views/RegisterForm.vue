<template>
    <header class="page-header">
        <h1 class="page-header__title">Идём<span>в</span>кино</h1>
        <span class="page-header__subtitle">Администраторррская</span>
    </header>

    <main>
        <section class="login">
            <header class="login__header">
                <h2 class="login__title">Регистрация</h2>
            </header>
            <div class="login__wrapper">
                <form class="login__form" accept-charset="utf-8" @submit.prevent="submitRegister">
                    <label class="login__label"  for="name">
                       Имя
                        <input class="login__input" v-model.trim="form.name" type="text" required>
                    </label>
                    <label class="login__label" for="mail">
                        E-mail
                        <input class="login__input" v-model.trim="form.email" type="mail" placeholder="example@domain.xyz" name="mail" required>
                    </label>
                    <label class="login__label" for="pwd">
                        Пароль
                        <input class="login__input"  v-model.trim="form.password" type="password" placeholder="" name="pwd" required>
                    </label>
                    <label class="login__label" for="pwd">
                       Подтверждение пароля
                        <input class="login__input"  v-model.trim="form.password_confirmation" type="password" placeholder="" name="pwd" required>
                    </label>
                    <div class="text-center">
                        <input value="Зарегистрироваться" type="submit" class="login__button">
                    </div>
                </form>
            </div>
        </section>
    </main>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null
                },
            }
        },
        methods: {
            submitRegister() {
                this.$store.dispatch('register', this.form)
            }
        }
    }

</script>

<style scoped>

</style>
