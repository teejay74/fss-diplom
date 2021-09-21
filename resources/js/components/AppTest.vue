<template>
    <div class="container with-nav">
        <div class="card">
            <h1>Про Vuex</h1>
            <h2>Счетчик {{ counter }}</h2>
            <button class="btn" @click="increment">+</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AppTest",
        // data() {
        //     return {
        //         counter: 0
        //     }
        // },
        // methods: {
        //     increment() {
        //         this.counter++
        //     }
        // }
    }
</script>

<style scoped>
    .btn {
        width: 200px;
        height: 50px;
    }
</style>
