<div class="lg:w-full lg:bg-white lg:shadow-lg about-lg:mx-20">
    <div>
        <div>
            <img src="{{ $institution->profilePhoto() }}" alt="{{ $institution->title }}" class="block w-full">
        </div>

        <div class="flex">
            <tabs style="margin-top: -43px">
                <tab name="{{ $institution->title }}" bg-class="bg-orange" :selected-initial="true">
                    <div class="flex py-4 px-5">
                        <div class="w-4/5 mr-2">
                            <h1 class="text-2xl text-blue-dark tracking-wide mb-1">{{ $institution->title }}</h1>

                            <div class="text-grey-darkest">
                                {!! $institution->description !!}
                            </div>
                        </div>

                        <div class="w-1/5 flex flex-col items-center">
                            @if ($institution->hasLogo() && $institution->is_paid)
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

                            <a href="{{ $institution->web_site_url }}" target="_blank" class="block text-xl text-blue-dark mt-2 no-underline hover:underline">
                                {{ $institution->web_site_display_title ?: $institution->getBaseUrl() }}
                            </a>
                        </div>
                    </div>

                    @include('institutions.partials.dormitory-and-military-dep')

                    @if ($institution->is_paid)
                    <div class="py-3 mb-6">
                        <carousel :page-dots="true">
                            @foreach ($institution->media as $image)
                                @if ($image->collection_name != 'logo')
                                    <img src="{{ $image->getUrl() }}" class="carousel-cell md:rounded-tr-2xl md:rounded-bl-2xl shadow-lg p-2" alt="{{ $image->file_name }} {{ $institution->title }}">
                                @endif
                            @endforeach
                        </carousel>
                    </div>
                    @endif

                    @if ($institution->is_paid && $institution->extra_description)
                        <div class="py-4 px-5 text-grey-darkest">{!! $institution->extra_description !!}</div>
                    @endif
                </tab>

                <tab name="{{ $isUniversity ? 'бакалавриат' : 'специальности' }}" bg-class="bg-blue">
                    @if ($isUniversity)
                        <div class="px-8 py-2 sticky z-10 bg-white" style="top: 108px">
                            <p class="">Бакалавриат - форма трех или пятигодичного обучения студентов, дающая базовое высшее образование и степень бакалавра.</p>
                        </div>
                    @endif

                    <table class="w-full">
                        <thead>
                            <tr class="bg-blue-darker">
                                <th class="py-3 text-white text-left font-normal bg-blue-darker sticky z-10 {{ $isUniversity ? 'px-4' : 'px-8' }}" style="top: {{ $isUniversity ? '142px' : '108px' }}">
                                    <div class="">Специальности {{ $isUniversity ? 'Бакалавриата' : '' }}</div>
                                </th>
                                <th class="py-3 text-white font-normal bg-blue-darker sticky z-10" style="top: {{ $isUniversity ? '142px' : '108px' }}">
                                    <div class="border-r border-l border-white">Код</div>
                                </th>
                                <th class="py-3 text-white font-normal bg-blue-darker sticky z-10" style="top: {{ $isUniversity ? '142px' : '108px' }}">
                                    <div class="border-r border-white">Стоимость за год</div>
                                </th>
                                <th class="py-3 text-white font-normal bg-blue-darker sticky z-10" style="top: {{ $isUniversity ? '142px' : '108px' }}">
                                    <div class="">Срок обучения</div>
                                </th>
                            </tr>
                        </thead>

                        {{-- Искуственный отступ :( --}}
                        <tbody>
                            <tr class="h-2 bg-white"></tr>
                        </tbody>

                        {{-- Специальности университета --}}
                        @if ($isUniversity)
                            <tbody class="university-specialty-table-body">
                                @foreach ($institution->specialties as $specialty)
                                    <tr>
                                        <td class="py-3 px-4">
                                            <div>
                                                <a href="{{ route('specialties.show', $specialty) }}" class="text-black no-underline">
                                                    {{ $specialty->title }}
                                                </a>
                                            </div>
                                        </td>
                                        <td class="py-3 text-center">
                                            <div class="border-r border-l border-grey-dark">{{ $specialty->code }}</div>
                                        </td>
                                        <td class="py-3 text-center">
                                            <div class="border-r border-grey-dark">{{ $specialty->pivot->study_price ? $specialty->pivot->study_price . ' тг': '--' }}</div>
                                        </td>
                                        <td class="py-3 text-center">
                                            <div>{{ $specialty->pivot->study_period ? $specialty->pivot->study_period . ' ' . years($specialty->pivot->study_period) : '--' }}</div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tbody class="college-specialty-table-body">
                                {{-- Специальности колледжа --}}
                                @foreach ($institution->specialties_distinct as $specialty)
                                    @php
                                        $qualifications = $specialty->qualificationsOf($institution);
                                    @endphp

                                    @if (count($qualifications))
                                        <tr class="bg-brown-light">
                                            <td colspan="5" class="py-1 px-8">
                                                <a href="{{ route('specialties.show', $specialty) }}" class="block text-black no-underline">
                                                    {{ $specialty->getNameWithCodeOrName() }}
                                                </a>
                                            </td>
                                        </tr>

                                        @foreach ($qualifications as $qualification)
                                            <tr>
                                                <td class="py-3 px-8">
                                                    {{ $qualification->title }}
                                                </td>
                                                <td class="text-center">
                                                    <div class="py-3 border-r border-l border-brown-light">{{ $qualification->code }}</div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="py-3 border-r border-brown-light">{{ $qualification->pivot->study_price ? $qualification->pivot->study_price . ' тг' : '--' }}</div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="py-3">{{ $qualification->pivot->study_period ? $qualification->pivot->study_period . ' ' . years($qualification->pivot->study_period) : '--' }}</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        @endif

                        <tbody>
                            <tr>
                                <td colspan="5" class="py-1 px-8">
                                    @if ($isUniversity && !count($institution->specialties))
                                        @include('institutions.partials.no-info')
                                    @endif

                                    @if ($isCollege && !$institution->hasQualificationsWithParent())
                                        @include('institutions.partials.no-info')
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </tab>

                <tab name="контакты" bg-class="bg-blue-dark">
                    <div class="mt-3">
                        <div class="flex bg-blue-dark px-6 py-2">
                            <div class="w-2/3 py-2">
                                <h3 class="text-white font-normal mb-4">
                                    Контакты {{ $isUniversity ? 'вуза' : 'колледжа' }}:
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

                        @include ('institutions.partials.social-media-sites')
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
