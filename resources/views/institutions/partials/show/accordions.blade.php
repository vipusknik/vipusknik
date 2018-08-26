<one-open-accordion name="institution" :is-open-initial="true" heading-classes="bg-orange">
    <template slot="heading">
        @if ($institution->hasLogo())
            <div class="mr-2 flex-none">
                <img src="{{ $institution->logo()->getUrl() }}" alt="{{ $institution->title }}" class="block w-10 h-10">
            </div>
        @endif

        <div class="text-white text-center">
            {{ $institution->title }}
        </div>
    </template>

    <div>
        <div class="relative">
            {{-- Главное фото вуза --}}
            <img src="/img/institutions/default-profile-photo.jpg" alt="{{ $institution->title }} главное фото" class="block">

            <div class="absolute z-10 pin-t mt-2 pin-r">
                <div class="px-8 py-1 text-sm text-blue-dark text-center bg-white opacity-90 mb-2">
                    г. {{ $institution->city->title }}
                </div>

                <a href="{{ $institution->web_site_url }}" target="_blank" class="block px-8 py-1 text-sm text-blue-dark text-center font-bold bg-white opacity-90">
                    {{ $institution->web_site_url }}
                </a>
            </div>
        </div>

        <div class="p-3 text-grey-darkest">
            {!! $institution->description !!}
        </div>
    </div>
</one-open-accordion>

<one-open-accordion name="specialties" heading-classes="bg-blue-lighter">
    <template slot="heading">
        бакалавриат
    </template>

    <div>
        <div class="institution-specialty-list text-black mt-2">
            @foreach ($institution->specialties as $specialty)
                <div class="px-3 py-1">
                    <div class="flex justify-between py-2 border-b border-black">
                        <a href="{{ route('specialties.show', $specialty) }}" class="block text-black no-underline">{{ $specialty->title }}</a>
                        <div>{{ $specialty->code }}</div>
                    </div>

                    <div class="flex py-2">
                        <div class="w-1/2 px-2 border-r border-black flex flex-col items-center">
                            <div class="text-sm text-grey-darker">Стоимость за 1 год</div>
                            <div>{{ $specialty->pivot->study_price }}</div>
                        </div>
                        <div class="w-1/2 px-2 flex flex-col items-center">
                            <div class="text-sm text-grey-darker">Срок обучения</div>
                            <div>{{ $specialty->pivot->study_period }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</one-open-accordion>

<one-open-accordion name="contacts" heading-classes="bg-blue-light">
    <template slot="heading">
        контакты
    </template>

    <div>
        {{-- Контакты --}}
        <div class="px-6 py-3">
            <div class="flex items-center mb-3">
                <div class="flex-none mr-2">
                    <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                </div>
                {{ $institution->address }}
            </div>

            <div class="flex items-center mb-3">
                <div class="flex-none mr-2">
                    <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/></svg>
                </div>
                <a href="tel:{{ $institution->phone_number }}" class="text-blue-dark">{{ $institution->phone_number }}</a>
            </div>

            <div class="flex mb-3">
                <div class="flex-none mr-2">
                    <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13.6 13.47A4.99 4.99 0 0 1 5 10a5 5 0 0 1 8-4V5h2v6.5a1.5 1.5 0 0 0 3 0V10a8 8 0 1 0-4.42 7.16l.9 1.79A10 10 0 1 1 20 10h-.18.17v1.5a3.5 3.5 0 0 1-6.4 1.97zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </div>
                <a href="mailto:{{ $institution->reception->email }}" class="text-blue-dark">{{ $institution->reception->email }}</a>
            </div>

            <div class="flex">
                <div class="flex-none mr-2">
                    <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm2-2.25a8 8 0 0 0 4-2.46V9a2 2 0 0 1-2-2V3.07a7.95 7.95 0 0 0-3-1V3a2 2 0 0 1-2 2v1a2 2 0 0 1-2 2v2h3a2 2 0 0 1 2 2v5.75zm-4 0V15a2 2 0 0 1-2-2v-1h-.5A1.5 1.5 0 0 1 4 10.5V8H2.25A8.01 8.01 0 0 0 8 17.75z"/>
                    </svg>
                </div>
                <a href="{{ $institution->web_site_url }}" target="_blank" class="text-blue-dark">{{ $institution->web_site_url }}</a>
            </div>
        </div>

        {{-- Карта --}}
        @if ($institution->map)
            <div class="bg-blue-darker py-3 px-10 mb-2">
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
                <div class="flex items-center mb-3">
                    <div class="flex-none mr-2">
                        <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
                    </div>
                    {{ $institution->reception->address }}
                </div>

                <div class="flex items-center mb-3">
                    <div class="flex-none mr-2">
                        <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/></svg>
                    </div>
                    <a href="tel:{{ $institution->reception->phone }}" class="text-green-light">{{ $institution->reception->phone }}</a>
                </div>

                <div class="flex">
                    <div class="flex-none mr-2">
                        <svg class="inline-block w-4 h-4 fill-current text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M13.6 13.47A4.99 4.99 0 0 1 5 10a5 5 0 0 1 8-4V5h2v6.5a1.5 1.5 0 0 0 3 0V10a8 8 0 1 0-4.42 7.16l.9 1.79A10 10 0 1 1 20 10h-.18.17v1.5a3.5 3.5 0 0 1-6.4 1.97zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </div>
                    <a href="mailto:{{ $institution->reception->email }}" class="text-green-light">{{ $institution->reception->email }}</a>
                </div>
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
