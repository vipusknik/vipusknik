<template>
    <div>
        <div ref="carousel" class="main-carousel">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity'
    import 'flickity-fullscreen'
    import 'flickity/dist/flickity.min.css'
    import 'flickity-fullscreen/fullscreen.css'

    export default {
        props: {
            wrapAround: { default: true },
            autoPlay: { default: false },
            pageDots: { default: false }
        },

        mounted() {
            let carousel = new Flickity(this.$refs['carousel'], {
                autoPlay: this.autoPlay,
                cellAlign: 'center',
                contain: true,
                pageDots: this.pageDots,
                fullscreen: true
            })

            carousel.on('staticClick', (event, pointer, cellElement, cellIndex) => {
                carousel.select(cellIndex)
                carousel.viewFullscreen()
            })
        }
    }
</script>

<style>
    .main-carousel .flickity-prev-next-button {
        color: #3d4852 !important;
        background: none !important;
    }

    .flickity-page-dots .dot {
        width: 12px;
        height: 12px;
        border-radius: 25%;
    }

    .main-carousel .flickity-button-icon {
        fill: currentColor;
    }

    .main-carousel .carousel-cell {
        height: 200px;
        width: 100%;
        margin-right: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @media (min-width: 768px) {
        .main-carousel .carousel-cell {
            height: 200px;
            width: 30%;
            object-fit: cover;
            object-position: center;
        }
    }

    .is-fullscreen {
        z-index: 60 !important;
    }

    .is-fullscreen .carousel-cell {
        width: 100%;
        height: 100%;
        border-bottom-left-radius: 0 !important;
        border-top-right-radius: 0 !important;
        object-fit: contain;
        object-position: initial;
    }

    .carousel-nav img {
        width: 100px;
        height: 70px;
    }

    @media (min-width: 768px) {
        .flickity-fullscreen-button {
            display: none;
        }
    }
</style>
