<template>
    <div>
        <div class="flex">
            <div class="w-1/2 bg-blue-dark mr-2 mt-1" style="height: 1.3px"></div>

            <div class="flex-1 whitespace-no-wrap mr-2 text-xl text-blue-dark">
                Топ ВУЗы 2018
            </div>

            <div class="w-1/5 bg-blue-dark mt-1" style="height: 1.3px"></div>
        </div>

        <div class="institution-promo-carousel border border-t-none border-blue-dark" style="margin-top: -1.125rem; border-width: 1.3px; border-top-width: 0px;">
            <div class="carousel-cell">
                <div class="flex pb-3 pt-5 px-5">
                    <div class="mr-2">
                        <a href="#" class="block">
                            <img src="http://mustim09.beget.tech/storage/389/8cca0jpg.jpeg" alt="" class="block w-24">
                        </a>
                    </div>

                    <div class="self-end">
                        <div class="text-center mb-2">
                            <a href="#" class="text-blue-dark no-underline">Академический инновационный университет</a>
                        </div>

                        <div class="text-sm text-center text-grey-dark">
                            Город: Семей
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-cell">
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
            </div>
        </div>
    </div>
</template>

<script>
    import Flickity from 'flickity'
    import 'flickity/dist/flickity.min.css'

    export default {
        mounted() {
            let carousel = document.querySelector('.institution-promo-carousel')

            new Flickity(carousel, {
                autoPlay: true,
                wrapAround: true,
                cellAlign: 'left',
                contain: true,
                pageDots: false,
                prevNextButtons: false
            })
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
      opacity: 0;
      z-index: -1;
    }

    .institution-promo-carousel .carousel-cell.is-selected {
      opacity: 1;
      z-index: 0
    }
</style>
