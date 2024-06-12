<template>
    <div class="footersection templete clear">
        <div class="footermenu clear">
            <ul>
                <li><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li><router-link :to="{ name: 'about' }">About</router-link></li>
                <li><router-link :to="{ name: 'contact' }">Contact</router-link></li>
            </ul>
        </div>
        <p>&copy; Copyright Training with live project.</p>
    </div>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style lang="scss" scoped></style>