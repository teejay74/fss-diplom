<template>
    <header class="page-header">
         <HeaderComponent />
    </header>
    <nav>

    </nav>
</template>

<script>
    import HeaderComponent from "./Header";
    import NavComponent from "./NavComponent";
    export default {
        name: "BodyContainer",
        components: {
            HeaderComponent,
            NavComponent
        }
    }
</script>

<style scoped>

</style>
