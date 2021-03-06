@extends ('layouts.master')

@section ('title', translate($institutionType, 'i', 'p', true))

@section('content')
    <div class="min-h-screen flex flex-col">
        @component('layouts.header')
            @slot ('smHeaderDropdownMenu')
                @include ('institutions.sm-header-dropdown-menu')
            @endslot
        @endcomponent

        {{-- Контент страницы --}}
        <div class="flex-1 mt-2 lg:bg-grey-light lg:mt-0">
            <main class="container mx-auto">
                <div class="lg:bg-white lg:shadow-lg about-lg:mx-20" style="min-height: 700px">
                    {{-- Реклама: топ вузы текущего года для маленьких экранов --}}
                    <div class="mb-4 px-3 lg:px-6 lg:hidden">
                        @include ('institutions.partials.promo-carousel', [ 'pageDots' => false ])
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
                            <typeahead name="query"
                                      :endpoint="'/institutions/{{ $institutionType }}/search'"
                                      placeholder="Название учебного заведения..."
                                      class="block w-full mb-3"
                                      input-classes="block w-full px-6 py-2 placeholder-text-grey bg-white"
                                      spinner-classes="mt-px">
                            </typeahead>

                            <div class="flex">
                                <div class="w-3/5 mr-3">
                                    <ss-select class="text-grey-darkest" name="specialty">
                                        <input type="search" class="block w-full py-2 px-6 text-grey cursor-pointer">
                                        <option value="" class="py-1 px-6">
                                            Специальности{{ $institutionType == 'colleges' ? ', квалификации' : '' }}
                                        </option>
                                        @foreach ($specialties as $specialty)
                                            <option value="{{ $specialty->id }}" {{ request('specialty') == $specialty->id ? 'selected' : '' }} class="py-1 px-6">
                                                {{ $specialty->title }} ({{ $specialty->code }})
                                            </option>
                                        @endforeach
                                    </ss-select>
                                </div>

                                <div class="w-2/5 flex">
                                    <div class="w-4/5 mr-3">
                                        <ss-select class="text-grey-darkest" name="city">
                                            <input type="search" class="block w-full py-2 px-6 text-grey cursor-pointer">
                                            <option value="" class="px-6 py-1">Город</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }} class="px-6 py-1">
                                                    {{ $city->title }}
                                                </option>
                                            @endforeach
                                        </ss-select>
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

                    <div class="md:flex">
                        {{-- Список вузов --}}
                        <infinite-institution-list :offset-initial="{{ count($institutions) }}"
                                                    institution-type="{{ $institutionType }}"
                                                    inline-template
                                                    class="mb-6 px-3 lg:px-6 lg:w-2/3">
                            <div>
                                @foreach ($institutions as $institution)
                                    @include ('institutions.partials.institution-in-list')
                                @endforeach

                                <institution v-for="(institution, index) in list"
                                            :institution="institution"
                                            :institution-type="institutionType"
                                            :key="institution.id">
                                </institution>

                                <div v-if="fetching" class="flex items-center justify-center">
                                    <svg width="100" height="100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background:0 0"><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.9166666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(30 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.8333333333333334s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(60 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.75s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(90 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.6666666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(120 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5833333333333334s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(150 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.5s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(180 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.4166666666666667s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(210 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.3333333333333333s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(240 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.25s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(270 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.16666666666666666s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(300 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="-0.08333333333333333s" repeatCount="indefinite"/></rect><rect x="47" y="24" rx="9.4" ry="4.8" width="6" height="12" fill="#2f84a9" transform="rotate(330 50 50)"><animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"/></rect></svg>
                                </div>
                            </div>
                        </infinite-institution-list>

                        {{-- Реклама: топ вузы текущего года для больших экранов --}}
                        <div class="hidden lg:block lg:w-1/3">
                            <div class="sticky" style="top: 90px">
                                @include ('institutions.partials.promo-carousel', [ 'pageDots' => true ])
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
