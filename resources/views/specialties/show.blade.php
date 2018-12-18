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
                    <div class="px-6 md:px-16 py-8">
                        <div class="flex text-blue-lightish font-franklin-gothic">
                            <div class="w-1/2 mr-2 md:mr-0 md:w-2/3">
                                <h4 class="font-normal text-lg mb-1 md:ml-2">{{ $specialty->type == 'specialty' ? 'Специальность' : 'Квалификация' }}</h4>
                                <h3 class="hidden md:block text-2xl font-normal">"{{ $specialty->title }}"</h3>
                            </div>
                            <div class="w-1/2 md:w-1/3 flex md:block">
                                <h4 class="font-normal text-base md:text-lg md:mb-1 mr-1 md:mr-0">Код:</h4>
                                <h5 class="font-normal text-base">{{ $specialty->code }}</h5>
                            </div>
                        </div>

                        <div class="md:hidden text-2xl font-franklin-gothic text-blue-lightish">
                            "{{ $specialty->title }}"
                        </div>
                    </div>

                    <div class="md:bg-orange md:px-8 md:py-3 flex flex-wrap text-white font-franklin-gothic antialiased">
                        <div class="bg-orange md:bg-transparent w-full md:w-1/2 py-2 sm:py-3 md:py-0 px-6 md:px-4 flex items-center mb-2 md:mb-0 md:border-r-2 md:border-white">
                            <div>
                                <span>{{ $specialty->type == 'specialty' ? 'Направление' : 'Специальность' }}:</span><br>
                                <a class="text-white font-franklin-gothic antialiased" href="{{ route('specialties.directions.show', $specialty->direction) }}">{{ $specialty->title }}</a>
                            </div>
                        </div>
                        <div class="bg-orange md:bg-transparent w-1/2 md:w-1/4 py-2 sm:py-3 md:py-0 px-6 md:px-4 flex items-center border-r-2 border-white">
                            <a class="text-white font-franklin-gothic antialiased" href="#">Связанные профессии</a>
                        </div>
                        <div class="bg-orange md:bg-transparent w-1/2 md:w-1/4 py-2 sm:py-3 md:py-0 px-6 md:px-4 flex items-center">
                            <a class="text-white font-franklin-gothic antialiased" href="{{ route('institutions.index', str_plural($specialty->direction->institution)) . '?specialty=' . $specialty->id }}">
                                Где учиться?
                            </a>
                        </div>
                    </div>

                    <article class="py-4 md:py-10 px-6 md:px-12 text-grey-darkest">
                        {!! $specialty->description !!}
                    </article>
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection
