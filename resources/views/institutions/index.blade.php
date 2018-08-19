@extends ('layouts.master')

@section ('title')
    {{ translate($institutionType, 'i', 'p', true) }}
@endsection

@section('content')
    <div class="min-h-screen flex flex-col">
        @include ('layouts.header')

        {{-- Контент страницы --}}
        <div class="flex-1 lg:bg-grey-light">
            <main class="container mx-auto">
                <div class="lg:bg-white lg:shadow-lg about-lg:mx-20">
                    {{-- Реклама: топ вузы текущего года для маленьких экранов --}}
                    <div class="mb-8 px-3 lg:px-6 lg:hidden">
                        @include ('institutions.partials.promo-carousel')
                    </div>

                    {{-- Подзаголовок страницы --}}
                    <div class="hidden lg:block lg:px-6 lg:py-3 lg:text-blue-dark">
                        @if ($institutionType === 'universities')
                            <p><span class="uppercase">Высшее учебное заведение</span> — учебное заведение,</p>
                            <p>дающее высшее профессиональное образование и осуществляющее научную деятельность.</p>
                        @else
                            <p>Колледж является образовательным учреждением среднего</p>
                            <p>профессионального образования.</p>
                        @endif
                    </div>

                    {{-- Форма поиска для больших экранов --}}
                    <div class="hidden lg:block lg:px-6 lg:py-3 lg:mb-4 lg:bg-orange">
                        <form action="{{ route('institutions.index', $institutionType) }}" method="get" class="lg:w-4/5 lg:w-2/3">
                            <input type="text" name="query" value="{{ request('query') }}" placeholder="Название учебного заведения..." class="block w-full px-6 py-2 mb-3 text-lg placeholder-text-grey-dark bg-white">
                            <div class="flex">
                                <div class="w-3/5 mr-3">
                                    <select class="block w-full text-grey py-2 px-4 styled-select" name="specialty">
                                        <option value="" class="py-1 px-6">
                                            Специальности{{ $institutionType == 'colleges' ? ', квалификации' : '' }}
                                        </option>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}" {{ request('specialty') == $specialty->id ? 'selected' : '' }} class="py-1 px-6">
                                                {{ $specialty->title }} ({{ $specialty->code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-2/5 flex">
                                    <div class="w-4/5 mr-3">
                                        <select class="block w-full text-grey py-2 px-4 styled-select" name="city">
                                            <option value="">Город</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }} class="px-6 py-1">
                                                    {{ $city->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="w-1/5">
                                        <button type="submit" class="block flex-no-shrink h-full w-full bg-blue-dark hover:bg-blue-darker">
                                            <svg class="inline-block h-5 w-8 mt-1 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="lg:flex">
                        {{-- Список вузов --}}
                        <div class="px-3 lg:px-6 lg:w-2/3">
                            @foreach ($institutions as $institution)
                                <div class="flex mb-6">
                                    <div class="w-12 flex-no-shrink mr-2 p-1">
                                        @if ($institution->hasLogo())
                                            <a href="{{ route('institutions.show', [ $institutionType, $institution ]) }}" class="block">
                                                <img src="{{ asset($institution->logo()->getUrl()) }}" alt="{{ $institution->title }}" class="block w-full">
                                            </a>
                                        @endif
                                    </div>

                                    <div class="flex-1 min-w-0 flex flex-col justify-center px-2 border-orange-light" style="border-left-width: 1.3px">
                                        <div class="mb-1">
                                            <a href="{{ route('institutions.show', [ $institutionType, $institution ]) }}" class="text-blue-dark no-underline hover:underline">{{ $institution->title }}</a>
                                        </div>
                                        <div class="text-sm text-grey-dark">
                                            Город: {{ $institution->city->title }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Реклама: топ вузы текущего года для больших экранов --}}
                        <div class="hidden lg:block lg:w-1/3">
                            <div class="sticky" style="top: 90px">
                                @include ('institutions.partials.promo-carousel')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
