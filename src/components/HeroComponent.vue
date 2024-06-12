<template>
    <div class="slidersection templete clear">
        <div id="slider">
            <a href="#" v-for="(item, index) in slideimg" :key="index"><img :src="getimagepath(item)" alt="nature 1"
                    title="This is slider one Title or Description" /></a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'HeroComponent',
    data() {
        return {
            slideimg: ['01', '02', '03', '04'],
            sliderInitialized: false
        }
    },
    mounted() {
        this.initializeSliderOnNextTick();
    },

    methods: {
        getimagepath(item) {
            const path = require(`../assets/img/${item}.jpg`);
            return path;
        },
        initializeSliderOnNextTick() {
            this.$nextTick(() => {
                if (!this.sliderInitialized) {
                    $('#slider').nivoSlider({
                        effect: 'random',
                        slices: 10,
                        animSpeed: 500,
                        pauseTime: 5000,
                        startSlide: 0,
                        directionNav: false,
                        directionNavHide: false,
                        controlNav: false,
                        controlNavThumbs: false,
                        pauseOnHover: true,
                        manualAdvance: false,
                        captionOpacity: 0.8,
                        beforeChange: function () { },
                        afterChange: function () { },
                        slideshowEnd: function () { }
                    });
                    this.sliderInitialized = true;
                }
            });
        }
    },
}
</script>

<style scoped></style>