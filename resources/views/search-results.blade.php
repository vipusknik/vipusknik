@extends ('layouts.master')

@section ('title', 'Результаты поиска')

@section ('content')
    @component('layouts.header')
        @slot ('smHeaderDropdownMenu')
            <form action="#">
                <input type="search" class="block w-full h-12 text-grey py-4 px-6" placeholder="Add placeholder">
            </form>
        @endslot
    @endcomponent

    <div class="hidden lg:block">
        @include ('carousel')
    </div>

    @include ('search-form')

    <div>
        <div class="container mx-auto">
            <div class="text-grey pl-8 mt-4 mb-3 lg:mb-2">
                Результаты поиска по запросу "{{ request('query') }}":
            </div>
        </div>

        @if (count($universities))
            <div>
                <div class="pl-6 bg-brown-light py-2 text-blue-dark font-franklin-gothic tracking-wide">
                    <div class="container mx-auto">
                        <div class="flex items-center">
                            <div class="flex p-1 items-center justify-center bg-blue-dark flex-no-shrink text-center mr-3">
                                <img src="/img/icons/site-categories/universities.png" alt="ВУЗы" class="h-4">
                            </div>
                            <div class="border-b border-blue-dark leading-none">ВУЗы</div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto">
                    <div class="flex py-3 flex-col lg:flex-row">
                        @foreach ($universities->split(2) as $half)
                            <div class="w-full lg:w-1/2">
                                @foreach ($half as $institution)
                                    @include ('institutions.partials.institution-in-list')
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($colleges))
            <div>
                <div class="pl-6 bg-brown-light py-2 text-blue-dark font-franklin-gothic tracking-wide">
                    <div class="flex items-center">
                        <div class="flex p-1 items-center justify-center bg-blue-dark flex-no-shrink text-center mr-3">
                            <img src="/img/icons/site-categories/colleges.png" alt="Колледжи" class="h-4">
                        </div>
                        <div class="border-b border-blue-dark leading-none">Колледжи</div>
                    </div>
                </div>
                <div class="container mx-auto">
                    <div class="flex py-3 flex-col lg:flex-row">
                        @foreach ($colleges->split(2) as $half)
                            <div class="w-full lg:w-1/2">
                                @foreach ($half as $institution)
                                    @include ('institutions.partials.institution-in-list')
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($universitySpecialties))
            <div>
                <div class="pl-6 bg-brown-light py-2 text-blue-dark font-franklin-gothic tracking-wide">
                    <div class="container mx-auto">
                        <div class="flex items-center">
                            <div class="flex p-1 items-center justify-center bg-blue-dark flex-no-shrink text-center mr-3">
                                <img src="/img/icons/site-categories/specialties.png" alt="Специальности ВУЗов" class="h-4">
                            </div>
                            <div class="border-b border-blue-dark leading-none">Специальности ВУЗов</div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto">
                    <div class="flex py-3 flex-col lg:flex-row">
                        @foreach ($universitySpecialties->split(2) as $half)
                            <div class="w-full lg:w-1/2">
                                @foreach ($half as $specialty)
                                    <div class="flex mb-6">
                                        <div class="w-12 flex-no-shrink mr-2 p-1"></div>
                                        <div class="flex-1 min-w-0 flex flex-col justify-center px-2 border-orange-light" style="border-left-width: 1.3px">
                                            <div class="mb-1">
                                                <a href="{{ route('specialties.show', $specialty) }}" class="text-blue-dark no-underline hover:underline">
                                                    {{ $specialty->title }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if (count($collegeSpecialties))
            <div>
                <div class="pl-6 bg-brown-light py-2 text-blue-dark font-franklin-gothic tracking-wide">
                    <div class="container mx-auto">
                        <div class="flex items-center">
                            <div class="flex p-1 items-center justify-center bg-blue-dark flex-no-shrink text-center mr-3">
                                <img src="/img/icons/site-categories/specialties.png" alt="Специальности ВУЗов" class="h-4">
                            </div>
                            <div class="border-b border-blue-dark leading-none">Специальности, квалификации Колледжей</div>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto">
                    <div class="flex py-3 flex-col lg:flex-row">
                        @foreach ($collegeSpecialties->split(2) as $half)
                            <div class="w-full lg:w-1/2">
                                @foreach ($half as $specialty)
                                    <div class="flex mb-6">
                                        <div class="w-12 flex-no-shrink mr-2 p-1"></div>
                                        <div class="flex-1 min-w-0 flex flex-col justify-center px-2 border-orange-light" style="border-left-width: 1.3px">
                                            <div class="mb-1">
                                                <a href="{{ route('specialties.show', $specialty) }}" class="text-blue-dark no-underline hover:underline">
                                                    {{ $specialty->title }}
                                                </a>
                                            </div>
                                            <div class="text-sm text-grey-dark">
                                                @foreach ($specialty->qualifications as $qualification)
                                                    <div>{{ $qualification->title }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection