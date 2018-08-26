@extends ('layouts.master')

@section ('title')
    {{ $institution->title }}
@endsection

@section('content')
    <div class="min-h-screen flex flex-col">
        @include ('layouts.header')

        {{-- Контент страницы --}}
        <div class="flex-1 mt-px lg:bg-grey-light">
            <main>
                <div class="hidden lg:block container mx-auto">
                    <div class="lg:bg-white lg:shadow-lg about-lg:mx-20">
                        <div>
                            <div>
                                <img src="/img/institutions/default-profile-photo.jpg" alt="{{ $institution->title }}" class="block w-full">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:hidden">
                    @include ('institutions.partials.show.accordions')
                </div>
            </main>
        </div>
    </div>
@endsection

@section ('styles')
    <style>
        iframe {
            width: 100% !important;
            height: 250px !important;
        }

        .institution-specialty-list > div:nth-child(odd) {
            background: #DEDEDC;
        }
    </style>
@endsection
