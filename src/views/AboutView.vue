<template>
    <div class="contentsection contemplete clear">
        <div class="maincontent clear">
            <div class="about">
                <h2>{{ title }}</h2>

                <p>{{ des }}</p>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AboutView',
    data() {
        return {
            title: 'About us',
            des: "About us..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here."
        }
    },
}
</script>

<style lang="scss" scoped></style>