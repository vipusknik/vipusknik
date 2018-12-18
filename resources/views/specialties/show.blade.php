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
                    {{--  --}}
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection
