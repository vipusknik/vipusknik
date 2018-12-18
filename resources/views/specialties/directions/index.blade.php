@extends ('layouts.master')

@section ('title', 'Специальности')

@section ('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
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
                    <div data-flickity='{ "cellAlign": "left", "contain": true, "arrowShape": "M25.87899833350241,50.628999380943 l46.49999681743717,41.628999380943 V9 z", "imagesLoaded": true, "autoPlay": true }'>
                        @include ('carousel')
                        @include ('carousel')
                    </div>

                    @include ('search-form')

                    <div class="px-4 py-5 md:px-24 md:py-10">
                        <div class="flex flex-wrap">
                            @foreach ($directions as $direction)
                                <div class="flex items-start w-full mb-4 md:w-1/2 md:mb-10 md:pl-6">
                                    <div class="flex-none mr-2">
                                        <i class="student icon text-blue-lightish"></i>
                                    </div>

                                    <div class="flex-1">
                                        <h4 class="mb-3">
                                            <a class="text-base md:text-md text-blue-lightish font-franklin-gothic font-normal hover:no-underline" href="{{ route('specialties.directions.show', $direction) }}">
                                               {{ $direction->title }}
                                            </a>
                                        </h4>
                                        <div class="text-grey-darker">
                                            {!! $direction->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
