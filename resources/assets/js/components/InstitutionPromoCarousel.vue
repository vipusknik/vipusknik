<template>
    <div class="institution-promo-carousel-wrapper lg:mx-auto">
        <!-- Шапка карусели -->
        <div class="flex items-center">
            <div class="flex-3 bg-blue-dark mr-2 md:flex-1 md:mr-3 lg:mr-6 insitution-promo-carousel-heading-line"></div>

            <div class="flex-none whitespace-no-wrap mr-2 text-xl text-blue-dark md:text-2xl md:mr-3 lg:mr-6">
                {{ heading }}
            </div>

            <div class="flex-1 bg-blue-dark insitution-promo-carousel-heading-line"></div>
        </div>

        <!-- Рекламные блоки -->
        <div ref="carousel" class="institution-promo-carousel border border-blue-dark">
            <div v-for="institution in institutions" class="carousel-cell md:w-full">
                <div class="flex pb-3 pt-5 px-5 items-center justify-center lg:flex-col lg:pt-16 lg:pb-10">
                    <div class="flex-none mr-4 md:mr-5 lg:mr-0 lg:mb-10">
                        <a :href="institution.link" class="block">
                            <img :src="institution.logo" :alt="institution.name" class="block h-16 lg:h-32">
                        </a>
                    </div>

                    <div>
                        <div class="text-center mb-2">
                            <a :href="institution.link" class="text-blue-dark no-underline hover:underline md:text-xl lg:text-lg">{{ institution.name }}</a>
                        </div>

                        <div class="text-sm text-center text-grey-dark md:text-base lg:hidden">
                            Город: {{ institution.city }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity'
    import 'flickity/dist/flickity.min.css'

    export default {
        props: {
            heading: {},
            institutions: {},
            pageDots: {
                type: Boolean,
                required: false,
                default: false
            }
        },

        mounted() {
            new Flickity(this.$refs['carousel'], {
                autoPlay: true,
                wrapAround: true,
                cellAlign: 'left',
                contain: true,
                pageDots: this.pageDots,
                prevNextButtons: false,
            })
        }
    }
</script>

<style>
    .institution-promo-carousel {
        margin-top: -.75rem;
        border-width: 1.3px;
        border-top-width: 0px;
    }

    @media (min-width: 768px) {
        .institution-promo-carousel {
            margin-top: -.875rem;
        }
    }

    @media (min-width: 992px) {
        .institution-promo-carousel {
            margin-top: -.9rem;
            border-bottom-width: 0px;
        }
    }

    /* Fade CSS */
    .institution-promo-carousel .flickity-slider {
      transform: none !important;
    }

    .institution-promo-carousel .carousel-cell {
      left: 0 !important;
      opacity: 0;
      z-index: -1;
    }

    .institution-promo-carousel .carousel-cell.is-selected {
      opacity: 1;
      z-index: 0
    }

    @media (min-width: 992px) {
        .institution-promo-carousel-wrapper {
            width: 250px;
            min-height: 360px;
        }
    }

    .insitution-promo-carousel-heading-line {
        height: 1.6px;
    }

    @media (min-width: 768px) {
        .insitution-promo-carousel-heading-line {
            height: 1.6px;
        }
    }

    .flickity-page-dots {
      bottom: -8px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .flickity-page-dots:before,
    .flickity-page-dots:after {
        content: "";
        flex: 1;
        height: 1.6px;
        background: #2f84a9;
    }

    .flickity-page-dots:before {
        margin-right: 15px;
    }

    .flickity-page-dots:after {
        margin-left: 15px;
    }

    .flickity-page-dots .dot {
      width: 16px;
      height: 16px;
      opacity: 1;
      border-radius: 5px;
      border : 2px solid white;
      background: #2f84a9;
    }

    .flickity-page-dots .dot.is-selected {
      background: #1d5671;
    }
</style>
