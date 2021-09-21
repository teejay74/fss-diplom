<template>
    <header class="page-header">
        <h1 class="page-header__title">Идём<span>в</span>кино</h1>
        <span class="page-header__subtitle">Администраторррская</span>
    </header>

    <main>
        <section class="login">
            <header class="login__header">
                <h2 class="login__title">Авторизация {{ redirect }}</h2>
            </header>
            <div class="login__wrapper">
                <form class="login__form" accept-charset="utf-8" @submit.prevent="submitHandler">
                    <label class="login__label" for="mail">
                        E-mail
                        <input class="login__input" v-model.trim="form.email" type="mail" placeholder="example@domain.xyz" name="mail" required>
                    </label>
                    <label class="login__label" for="pwd">
                        Пароль
                        <input class="login__input"  v-model.trim="form.password" type="password" placeholder="" name="pwd" required>
                    </label>
                    <div class="text-center">
                        <input value="Авторизоваться" type="submit" class="login__button">
                    </div>
                </form>
            </div>
        </section>
    </main>
</template>

<script>
    import Auth from "../helpers/Auth";
     export default {

         created() {
             Auth.init();
             // if(this.$store.state.Auth.login) {
             //     this.$router.push('/admin')
             // }
         },
         data() {
            return {
                form: {
                    email: null,
                    password: null
                },
            }
        },

        methods: {
            submitHandler() {
               this.$store.dispatch('login', this.form)

            }
        },
         computed: {
            redirect() {
                if(this.$store.state.Auth.login) {
                    return this.$router.push('/admin')
                }
            }
         }

    }
</script>

<style scoped>

</style>
