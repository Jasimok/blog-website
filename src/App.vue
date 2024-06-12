<template>
    <NavComponent />
    <router-view />
    <Footer />
</template>

<script>
import NavComponent from "./components/NavComponent.vue";
import Footer from "./components/Footer.vue";

export default {
    name: 'App',
    components: {
        NavComponent,
        Footer
    },


}
</script>

<style scoped></style>