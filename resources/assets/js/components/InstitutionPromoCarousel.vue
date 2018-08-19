<template>
    <div class="institution-promo-carousel-wrapper lg:mx-auto">
        <div class="flex">
            <div class="w-1/2 bg-blue-dark mr-2 mt-1 md:flex-1 md:mt-2 md:mr-3 lg:mr-6 lg:mt-4" style="height: 1.3px"></div>

            <div class="flex-1 whitespace-no-wrap mr-2 text-xl text-blue-dark md:flex-none md:text-2xl md:mr-3 lg:text-3xl lg:mr-6">
                Топ ВУЗы 2018
            </div>

            <div class="w-1/5 bg-blue-dark mt-1 md:flex-1 md:mt-2 lg:mt-4" style="height: 1.3px"></div>
        </div>

        <div class="institution-promo-carousel border border-t-none border-blue-dark" style="margin-top: -1.125rem; border-width: 1.3px; border-top-width: 0px;">
            <div class="carousel-cell md:w-full">
                <div class="flex pb-3 pt-5 px-5 md:items-center md:justify-center lg:flex-col lg:py-16">
                    <div class="mr-2 md:mr-5 lg:mr-0 lg:mb-10">
                        <a href="#" class="block">
                            <img src="http://mustim09.beget.tech/storage/389/8cca0jpg.jpeg" alt="" class="block w-24 lg:w-32">
                        </a>
                    </div>

                    <div class="self-end md:self-auto">
                        <div class="text-center mb-2">
                            <a href="#" class="text-blue-dark no-underline md:text-xl lg:text-lg">Академический инновационный университет</a>
                        </div>

                        <div class="text-sm text-center text-grey-dark md:text-base lg:hidden">
                            Город: Семей
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="carousel-cell">
                <div class="flex pb-3 pt-5 px-5">
                    <div class="mr-2">
                        <a href="#" class="block">
                            <img src="http://mustim09.beget.tech/storage/381/ksu-logogif.gif" alt="" class="block w-24">
                        </a>
                    </div>

                    <div class="self-end">
                        <div class="text-center mb-2">
                            <a href="#" class="text-blue-dark no-underline">Карагандинский государственный университет имени академика Е. А. Букетова</a>
                        </div>

                        <div class="text-sm text-center text-grey-dark">
                            Город: Семей
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity'
    import 'flickity/dist/flickity.min.css'

    export default {
        mounted() {
            // let carousel = document.querySelector('.institution-promo-carousel')

            // new Flickity(carousel, {
            //     autoPlay: true,
            //     wrapAround: true,
            //     cellAlign: 'left',
            //     contain: true,
            //     pageDots: false,
            //     prevNextButtons: false
            // })
        }
    }
</script>

<style>
    /* Fade CSS */
    .institution-promo-carousel .flickity-slider {
      transform: none !important;
    }

    .institution-promo-carousel .carousel-cell {
      left: 0 !important;
      /*opacity: 0;
      z-index: -1;*/
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
</style>
