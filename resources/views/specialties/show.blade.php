@extends ('layouts.master')

@section ('title', 'Специальности')

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
                    <div class="flex px-16 py-8 text-blue-lightish font-franklin-gothic">
                        <div class="w-2/3">
                            <h4 class="font-normal text-lg mb-1 ml-2">Специальность</h4>
                            <h3 class="text-2xl font-normal">"{{ $specialty->title }}"</h3>
                        </div>
                        <div class="w-1/3">
                            <h4 class="font-normal text-lg mb-1">Код:</h4>
                            <h5 class="text-base">{{ $specialty->code }}</h5>
                        </div>
                    </div>

                    <div class="bg-orange px-12 py-5">
                        hi
                    </div>
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection
