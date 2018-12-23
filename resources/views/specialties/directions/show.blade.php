@extends ('layouts.master')

@section ('title', 'Специальности')

@section ('styles')
    <style>
        .specialty:nth-child(odd) {
            background-color: #DEDEDC;
        }

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

                    <div>
                        <div class="px-4 py-4 md:py-8 md:px-24">
                            <h3 class="text-blue-lightish uppercase font-normal tracking-wide">{{ $direction->title }}</h3>
                        </div>

                        <div>
                            @if ($direction->institution == 'university')
                                @foreach ($specialties as $specialty)
                                    <a href="{{ route('specialties.show', $specialty) }}" class="text-sm md:text-base lg:text-xl xl:text-base flex specialty px-4 md:px-24 text-grey-darkest hover:no-underline">
                                        <div class="w-3/4 md:w-7/8 mr-3 border-r-8 border-white py-2">
                                            <div class="border-l-2 border-orange pl-4">
                                                {{ $specialty->title }}
                                            </div>
                                        </div>
                                        <div class="w-1/4 md:w-1/8 flex-none py-2">{{ $specialty->code }}</div>
                                    </a>
                                @endforeach
                            @else
                                @foreach ($specialties as $specialty)
                                    <a href="{{ route('specialties.show', $specialty) }}" class="flex text-sm md:text-base lg:text-xl xl:text-base text-blue-lightish hover:no-underline my-px md:my-1" style="background-color: #DEDEDC;">
                                        <div class="w-3/4 md:w-7/8 border-r-8 border-white py-2 md:py-3 pl-6 md:pl-24">{{ $specialty->title }}</div>
                                        <div class="w-1/4 md:w-1/8 py-2 md:py-3 pl-3">{{ $specialty->code }}</div>
                                    </a>

                                    @foreach ($specialty->qualifications as $qualification)
                                        <a href="{{ route('specialties.show', $qualification) }}" class="flex items-center text-sm md:text-base lg:text-xl xl:text-base text-grey-darkest hover:no-underline">
                                            <div class="w-3/4 md:w-7/8 py-1 md:py-2 pl-2 md:pl-20">
                                                <div class="border-l-2 border-orange pl-4">
                                                    {{ $qualification->title }}
                                                </div>
                                            </div>
                                            <div class="w-1/4 md:w-1/8 py-1 md:py-2 pl-3">{{ $qualification->code }}</div>
                                        </a>
                                    @endforeach
                                @endforeach
                            @endif
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
