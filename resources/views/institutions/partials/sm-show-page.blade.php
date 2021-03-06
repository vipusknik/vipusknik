<one-open-accordion name="institution" :is-open-initial="true" heading-classes="bg-orange">
    <template slot="heading">
        @if ($institution->hasLogo() && $institution->is_paid)
            <div class="mr-2 flex-none">
                <img src="{{ $institution->logo()->getUrl() }}" alt="{{ $institution->title }}" class="block w-10 h-auto">
            </div>
        @endif

        <div class="text-white text-center">
            {{ $institution->title }}
        </div>
    </template>

    <div>
        <div class="relative">
            {{-- Главное фото вуза --}}
            <img src="{{ $institution->profilePhoto() }}" alt="{{ $institution->title }} главное фото" class="block">

            <div class="absolute z-10 pin-t mt-2 pin-r">
                <div class="px-8 py-1 text-sm text-blue-dark text-center bg-white opacity-90 mb-2">
                    г. {{ $institution->city->title }}
                </div>

                @if ($institution->web_site_url)
                    <a href="{{ $institution->web_site_url }}" target="_blank" class="block px-8 py-1 text-sm text-blue-dark text-center font-bold bg-white opacity-90">
                        {{ $institution->web_site_display_title ?: $institution->getBaseUrl() }}
                    </a>
                @endif
            </div>
        </div>

        <div class="p-3 text-grey-darkest">
            {!! $institution->description !!}

            @if ($institution->is_paid && $institution->extra_description)
                {!! $institution->extra_description !!}
            @endif
        </div>

        @include('institutions.partials.dormitory-and-military-dep')
    </div>
</one-open-accordion>

<one-open-accordion name="specialties" heading-classes="bg-blue-lighter">
    <template slot="heading">
        {{ $isUniversity ? 'бакалавриат' : 'специальности' }}
    </template>

    <div>
        <div class="institution-specialty-list text-black mt-2">
            @if ($isUniversity)
                @foreach ($institution->specialties as $specialty)
                    <div class="px-3 py-1">
                        <div class="flex justify-between items-center py-2 border-b border-black text-grey-darkest">
                            <div class="flex-1">
                                <a href="{{ route('specialties.show', $specialty) }}" class="block text-black no-underline text-grey-darkest">{{ $specialty->title }}</a>
                            </div>
                            <div class="ml-5 flex-no-shrink">{{ $specialty->code }}</div>
                        </div>

                        <div class="flex py-2">
                            <div class="w-1/2 px-2 border-r border-black flex flex-col items-center">
                                <div class="text-sm text-grey-darker">Стоимость за 1 год</div>
                                <div>{{ $specialty->pivot->study_price ? $specialty->pivot->study_price . ' тг' : '--' }}</div>
                            </div>
                            <div class="w-1/2 px-2 flex flex-col items-center">
                                <div class="text-sm text-grey-darker">Срок обучения</div>
                                <div>{{ $specialty->pivot->study_period ? $specialty->pivot->study_period . ' ' . years($specialty->pivot->study_period): '--' }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                @foreach ($institution->specialties_distinct as $specialty)
                    @php
                        $qualifications = $specialty->qualificationsOf($institution);
                    @endphp

                    @if (count($qualifications))
                        <div class="px-3 py-1">
                            <div class="w-full flex justify-between items-center py-2 border-b border-black text-grey-darkest antialiased">
                                <div class="flex-1">
                                    <a href="{{ route('specialties.show', $specialty) }}" class="block no-underline text-grey-darkest antialiased">{{ $specialty->title }}</a>
                                </div>
                                <div class="ml-5 flex-no-shrink">{{ $specialty->code }}</div>
                            </div>

                            @foreach ($qualifications as $qualification)
                                <div class="college-qualification">
                                    <div class="flex items-center text-sm text-grey-darkest py-1">
                                        <div class="mr-4">
                                            {{ $qualification->title }}
                                        </div>
                                        <div>
                                            {{ $qualification->code }}
                                        </div>
                                    </div>
                                    <div class="flex py-2">
                                        <div class="w-1/2 px-2 border-r border-black flex flex-col items-center">
                                            <div class="text-sm text-grey-darker">Стоимость за 1 год</div>
                                            <div>{{ $qualification->pivot->study_price ? $qualification->pivot->study_price . ' тг' : '--' }}</div>
                                        </div>
                                        <div class="w-1/2 px-2 flex flex-col items-center">
                                            <div class="text-sm text-grey-darker">Срок обучения</div>
                                            <div>{{ $qualification->pivot->study_period ? $qualification->pivot->study_period . years($qualification->pivot->study_period): '--' }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        @if ($isUniversity && !count($institution->specialties))
            @include('institutions.partials.no-info')
        @endif

        @if ($isCollege && !$institution->hasQualificationsWithParent())
            @include('institutions.partials.no-info')
        @endif
    </div>
</one-open-accordion>

<one-open-accordion name="contacts" heading-classes="bg-blue-light">
    <template slot="heading">
        контакты
    </template>

    <div>
        {{-- Контакты --}}
        <div class="px-6 py-3">
            <div class="mb-4">
                @include('institutions.partials.contacts')
            </div>
            @include ('institutions.partials.social-media-sites')
        </div>

        {{-- Карта --}}
        @if ($institution->map)
            <div class="bg-blue-light py-3 px-10 mb-2">
                <div>
                    {!! $institution->map->source_code !!}
                </div>
            </div>
        @endif
    </div>
</one-open-accordion>

@if ($institution->reception)
    <one-open-accordion name="reception-comittee" heading-classes="bg-green-light">
        <template slot="heading">
            приемная комиссия
        </template>

        <div>
            {{-- Контакты --}}
            <div class="px-6 py-3">
                @include('institutions.partials.reception-contacts')
            </div>

            {{-- Описание --}}
            @if ($institution->reception->info)
                <div class="p-3 text-grey-darkest">
                    {!! $institution->reception->info !!}
                </div>
            @endif
        </div>
    </one-open-accordion>
@endif

@if ($institution->is_paid && count($institution->media))
    <one-open-accordion name="gallery" heading-classes="bg-yellow">
        <template slot="heading">
            фотогалерея
        </template>

        <div class="mt-2">
            <carousel>
                @foreach ($institution->media as $image)
                    @if ($image->collection_name != 'logo')
                        <img src="{{ $image->getUrl() }}" class="carousel-cell md:rounded-tr-2xl md:rounded-bl-2xl" alt="{{ $image->file_name }} {{ $institution->title }}">
                    @endif
                @endforeach
            </carousel>
        </div>
    </one-open-accordion>
@endif
