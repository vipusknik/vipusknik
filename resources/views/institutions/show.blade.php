@extends ('layouts.master')

@section ('title')
    {{ $institution->title }}
@endsection

@section('content')
    <div class="min-h-screen mb-2 flex flex-col">
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

                            <div class="flex mb-4">
                                <tabs style="margin-top: -43px;">
                                    <tab name="{{ $institution->title }}" bg-class="bg-orange" :selected-initial="true">
                                        <div class="flex py-4 px-5">
                                            <div class="w-4/5 mr-2">
                                                <h1 class="text-2xl text-blue-dark tracking-wide mb-1">{{ $institution->title }}</h1>

                                                <div class="text-grey-darkest">
                                                    {!! $institution->description !!}
                                                </div>
                                            </div>

                                            <div class="w-1/5 flex flex-col items-center">
                                                @if ($institution->hasLogo())
                                                    <div class="mb-3">
                                                        <img src="{{ $institution->logo()->getUrl() }}" alt="{{ $institution->title }} лого" class="block w-32">
                                                    </div>
                                                @endif

                                                <div class="text-black">
                                                    г. {{ $institution->city->title }}
                                                </div>
                                                @if ($institution->foundation_year)
                                                    <div class="text-black">
                                                        Основан в {{ $institution->foundation_year }} г.
                                                    </div>
                                                @endif

                                                <a href="{{ $institution->web_site_url }}" class="block text-xl text-blue-dark mt-2 no-underline hover:underline">{{ $institution->web_site_url }}</a>
                                            </div>
                                        </div>

                                        <carousel>
                                            @foreach ($institution->media as $image)
                                                @if ($image->collection_name != 'logo')
                                                    <img src="{{ $image->getUrl() }}" class="carousel-cell md:rounded-tr-2xl md:rounded-bl-2xl shadow" alt="{{ $image->file_name }} {{ $institution->title }}">
                                                @endif
                                            @endforeach
                                        </carousel>
                                    </tab>

                                    <tab name="бакалавриат" bg-class="bg-blue">
                                        <div class="px-8 py-2">
                                            <p class="">Бакалавриат - форма трех или пятигодичного обучения студентов, дающая базовое высшее образование и степень бакалавра.</p>
                                        </div>

                                        <table class="w-full">
                                            <thead class="mb-2">
                                                <tr class="bg-blue-darker">
                                                    <th class="py-3 px-4 text-white text-left font-normal">
                                                        <div class="">Специальности Бакалавриата</div>
                                                    </th>
                                                    <th class="py-3 text-white font-normal">
                                                        <div class="border-r border-l border-white">Код</div>
                                                    </th>
                                                    <th class="py-3 text-white font-normal">
                                                        <div class="border-r border-white">Стоимость за год</div>
                                                    </th>
                                                    <th class="py-3 text-white font-normal">
                                                        <div class="">Срок обучения</div>
                                                    </th>
                                                </tr>
                                            </thead>

                                            <tbody class="institution-specialty-table-body">
                                                @foreach ($institution->specialties as $specialty)
                                                    <tr>
                                                        <td class="py-3 px-4">
                                                            <div>
                                                                <a href="{{ route('specialties.show', $specialty) }}" class="text-black no-underline">{{ $specialty->title }}</a>
                                                            </div>
                                                        </td>
                                                        <td class="py-3 text-center">
                                                            <div class="border-r border-l border-grey-dark">{{ $specialty->code }}</div>
                                                        </td>
                                                        <td class="py-3 text-center">
                                                            <div class="border-r border-grey-dark">{{ $specialty->pivot->study_price }} тг</div>
                                                        </td>
                                                        <td class="py-3 text-center">
                                                            <div>{{ $specialty->pivot->study_period }}</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </tab>

                                    <tab name="контакты" bg-class="bg-blue-dark">
                                        <div class="flex bg-blue-dark mt-3 px-6 py-2">
                                            <div class="w-2/3 py-2">
                                                <h3 class="text-white font-normal mb-4">
                                                    Контакты {{ $institution->type == 'university' ? 'вуза' : 'колледжа' }}:
                                                </h3>

                                                @include('institutions.partials.contacts')
                                            </div>

                                            <div class="w-1/3">
                                                {{-- Карта --}}
                                                @if ($institution->map)
                                                    <div class="py-3 px-10 mb-2">
                                                        <div>
                                                            {!! $institution->map->source_code !!}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </tab>

                                    <tab name="приемная комиссия" bg-class="bg-green-light">
                                        @if ($institution->reception)
                                            <div class="bg-green-light mt-3 p-6">
                                                @include('institutions.partials.reception-contacts')
                                            </div>

                                            @if ($institution->reception->info)
                                                <div class="p-6 text-black">
                                                    {!! $institution->reception->info !!}
                                                </div>
                                            @endif
                                        @endif
                                    </tab>
                                </tabs>
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

        @media (min-width: 992px) {
            iframe {
                width: 100% !important;
                height: 200px !important;
            }
        }

        .institution-specialty-list > div:nth-child(odd) {
            background: #DEDEDC;
        }

        .institution-specialty-table-body > tr:nth-child(odd) {
            background: #DEDEDC;
        }

        .institution-specialty-table-body > tr:nth-child(even) > td:not(:last-child) > div {
            border-color: transparent;
        }
    </style>
@endsection
