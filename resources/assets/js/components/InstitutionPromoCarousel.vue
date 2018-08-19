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
        <div class="institution-promo-carousel border border-blue-dark">
            <div class="carousel-cell md:w-full">
                <div class="flex pb-3 pt-5 px-5 items-center justify-center lg:flex-col lg:py-16">
                    <div class="mr-4 md:mr-5 lg:mr-0 lg:mb-10">
                        <a href="#" class="block">
                            <img src="http://mustim09.beget.tech/storage/389/8cca0jpg.jpeg" alt="" class="block w-24 lg:w-32">
                        </a>
                    </div>

                    <div>
                        <div class="text-center mb-2">
                            <a href="#" class="text-blue-dark no-underline md:text-xl lg:text-lg">Академический инновационный университет</a>
                        </div>

                        <div class="text-sm text-center text-grey-dark md:text-base lg:hidden">
                            Город: Семей
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-cell md:w-full">
                <div class="flex pb-3 pt-5 px-5 items-center justify-center lg:flex-col lg:py-16">
                    <div class="mr-4 md:mr-5 lg:mr-0 lg:mb-10">
                        <a href="#" class="block">
                            <img src="http://mustim09.beget.tech/storage/381/ksu-logogif.gif" alt="" class="block w-24 lg:w-32">
                        </a>
                    </div>

                    <div>
                        <div class="text-center mb-2">
                            <a href="#" class="text-blue-dark no-underline md:text-xl lg:text-lg">Карагандинский государственный университет имени академика Е. А. Букетова</a>
                        </div>

                        <div class="text-sm text-center text-grey-dark md:text-base lg:hidden">
                            Город: Семей
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
            heading: {
                type: String,
                required: true
            }
        },

        mounted() {
            let carousels = document.querySelectorAll('.institution-promo-carousel')

            for (let i = 0; i < carousels.length; i++) {
                new Flickity(carousels[i], {
                    autoPlay: true,
                    wrapAround: true,
                    cellAlign: 'left',
                    contain: true,
                    pageDots: i != 0, // первая карусель для маленьких экранов и ей не нужны кнопки
                    prevNextButtons: false
                })
            }
        }
    }
</script>

<style>
    .institution-promo-carousel {
        margin-top: -.75rem;
        border-width: 1.3px;
        border-top-width: 0px;
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
        }
    }

    .insitution-promo-carousel-heading-line {
        height: 1.3px;
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
