@extends ('layouts.master')

@section ('title', 'Специальности')

@section ('styles')
    <style>
        .carousel-cell {
          width: 100%; /* full width */
        }

        .flickity-page-dots {
            bottom: 3px !important;
        }

        .flickity-page-dots .dot {
            height: 5px !important;
            width: 7px !important;
            border-radius: 0 !important;
            background: #428cae !important;
            opacity: 1 !important;
        }

        .flickity-page-dots .dot.is-selected {
            background: #EF9C0E !important;
        }

        .flickity-prev-next-button {
            background-color: transparent !important;
        }
    </style>
@endsection

@section('content')
    <div class="min-h-screen flex flex-col">
        @component('layouts.header')
            @slot ('smHeaderDropdownMenu')
                @include ('search-form')
            @endslot
        @endcomponent

        {{-- Контент страницы --}}
        <div class="flex-1 mt-2 lg:bg-grey-light lg:mt-0">
            <main class="container mx-auto">
                <div class="lg:bg-white lg:shadow-lg about-lg:mx-20 flex flex-col" style="min-height: 700px">
                    <div class="mb-6">
                        <div data-flickity='{ "cellAlign": "left", "contain": true, "arrowShape": "M25.87899833350241,50.628999380943 l46.49999681743717,41.628999380943 V9 z", "imagesLoaded": true, "autoPlay": true }'>
                            @include ('carousel')
                            @include ('carousel')
                        </div>
                    </div>

                    <div class="flex flex-col px-4 md:px-32">
                        <div class="md:text-lg text-blue-light text-center mb-5 md:mb-3 order-1">
                            Спецальности высшего и средне-специального образования
                        </div>

                        <div class="text-grey-darker mb-8 order-3 md:order-2">
                            В данном разделе Вы найдете список и информацию по специальстям для колледжей и ВУЗов.
                            Так же Вы сможете найти учебные заведения, в которых присутствует выбранная Вами специальность.
                            Если Вы ищете конкретную специальность - введите ее название в поле внизу и нажмите кнопку "найти".
                            Или Вы можете найти интересующую Вас специальность в одной из категорий.
                        </div>

                        <div class="flex flex-col md:px-24 mb-5 lg:px-48 order-2 md:order-3">
                            <a href="#" class="flex mb-3 no-underline">
                                <div class="bg-blue-light flex items-center justify-center w-16 h-10 mr-3 flex-none">
                                    <img class="w-5 h-auto" src="/img/icons/site-categories/colleges.png" alt="Специальности колледжа">
                                </div>
                                <div class="text-white justify-center bg-orange flex items-center px-4 flex-1 hover:underline">Специальности колледжа</div>
                            </a>

                            <a href="#" class="flex no-underline">
                                <div class="bg-blue-light flex items-center justify-center w-16 h-10 mr-3 flex-none">
                                    <img class="w-8 h-auto" src="/img/icons/site-categories/universities.png" alt="Бакалавриат">
                                </div>
                                <div class="text-white justify-center bg-orange flex items-center px-4 flex-1 hover:underline">Бакалавриат</div>
                            </a>
                        </div>
                    </div>

                    <div class="mt-auto">
                        <div class="flex mb-4 px-4">
                            <div class="w-1/2 mr-3">
                                <a href="/institutions/colleges/vostochno-kazakhstanskiy-tekhniko-ekonomicheskiy-kolledzh" target="_blank">
                                    <img src="/img/vktek.gif" class="w-full h-auto">
                                </a>
                            </div>
                            <div class="w-1/2">
                                <a href="http://langberry.kz" target="_blank">
                                    <img src="/img/langberry_new.gif" class="w-full h-auto">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection
