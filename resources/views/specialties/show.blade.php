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
                                <h4 class="font-normal text-base lg:text-xl xl:text-base md:text-lg md:mb-1 mr-1 md:mr-0">Код:</h4>
                                <h5 class="font-normal text-base lg:text-xl xl:text-base">{{ $specialty->code }}</h5>
                            </div>
                        </div>

                        <div class="md:hidden text-2xl font-franklin-gothic text-blue-lightish">
                            "{{ $specialty->title }}"
                        </div>
                    </div>

                    <div class="md:bg-orange md:px-8 md:py-3 flex flex-wrap text-white font-franklin-gothic antialiased">
                        <div class="bg-orange md:bg-transparent w-full md:w-1/2 py-2 sm:py-3 md:py-0 px-6 md:px-4 flex items-center mb-2 md:mb-0 md:border-r-2 md:border-white">
                            <div>
                                @if ($specialty->type == 'specialty')
                                    @if ($specialty->direction->institution == 'university')
                                        <span>Профильные предметы (ЕНТ):</span><br>
                                        @foreach ($specialty->subjects as $subject)
                                            <a class="text-white font-franklin-gothic antialiased hover:no-underline" href="{{ route('subjects.show', $subject) }}">
                                                {{ $subject->title }}
                                            </a>
                                            {{ $loop->last ? '' : ',' }}
                                        @endforeach
                                    @else
                                        <span>Направление:</span><br>
                                        <a class="text-white font-franklin-gothic antialiased" href="{{ route('specialties.directions.show', $specialty->direction) }}">
                                            {{ $specialty->title }}
                                        </a>
                                    @endif
                                @else
                                    <span>Специальность:</span><br>
                                    <a class="text-white font-franklin-gothic antialiased" href="{{ route('specialties.show', $specialty->specialty) }}">
                                        {{ $specialty->title }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="bg-orange md:bg-transparent w-1/2 md:w-1/4 py-2 sm:py-3 md:py-0 px-6 md:px-4 flex items-center border-r-2 border-white">
                            <a class="text-white font-franklin-gothic antialiased" href="#professions">Связанные профессии</a>
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

                    <div id="professions" class="flex bg-orange py-3 px-6 md:px-12 font-franklin-gothic mb-3">
                        <div class="w-1/3 md:w-1/4 mr-4 text-white font-normal">Связанные профессии:</div>
                        <div class="w-2/3 md:w-3/4 flex flex-col">
                            @foreach ($specialty->professions as $profession)
                                <a href="{{ route('professions.show', $profession) }}" class="text-white font-franklin-gothic hover:no-underline mb-2">{{ $profession->title }}</a>
                            @endforeach
                        </div>
                    </div>

                    @if ($specialty->type == 'specialty' && $specialty->direction->institution == 'college')
                        <div id="qualifications" class="flex bg-orange py-3 px-6 md:px-12 font-franklin-gothic mb-3">
                            <div class="w-1/3 md:w-1/4 mr-4 text-white font-normal">Квалификации:</div>
                            <div class="w-2/3 md:w-3/4 flex flex-col">
                                @foreach ($specialty->qualifications as $qualification)
                                    <a href="{{ route('specialties.show', $qualification) }}" class="text-white font-franklin-gothic hover:no-underline mb-2">{{ $qualification->title }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>

        <div class="hidden lg:block">
            @include('layouts.footer')
        </div>
    </div>
@endsection
