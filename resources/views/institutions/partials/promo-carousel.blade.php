@php
    $heading = ($institutionType == 'universities' ? 'Топ вузы' : 'Топ колледжи') . ' ' . \Carbon\Carbon::now()->year;

    $universities = [
        [
            'name' => 'Академический инновационный университет',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/389/8cca0jpg.jpeg',
            'link' => '/institutions/university/akademicheskiy-innovatsionnyy-universitet'
        ],

        [
            'name' => 'Карагандинский государственный университет имени академика Е. А. Букетова',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/381/ksu-logogif.gif',
            'link' => '/institutions/university/karagandinskiy-gosudarstvennyy-universitet-imeni-akademika-e-a-buketova'
        ],
    ];

    $colleges = [
        [
            'name' => 'Алматинский колледж менеджмента и сервиса',
            'city' => 'Алматы',
            'logo' => 'http://mustim09.beget.tech/storage/323/logo-1png.png',
            'link' => '/institutions/colleges/almatinskiy-kolledzh-menedzhmenta-i-servisa'
        ],

        [
            'name' => 'Астанинский технико-экономический колледж',
            'city' => 'Астана',
            'logo' => '/storage/333/astaninskiy-tekhniko-ekonomicheskiy-kolledzh-atekpng.png',
            'link' => '/institutions/colleges/astaninskiy-tekhniko-ekonomicheskiy-kolledzh'
        ],
    ];
@endphp

@php
    $institutionType = str_plural($institutionType);
@endphp

<institution-promo-carousel heading="{{ $heading }}" :institutions="{{ json_encode(${$institutionType}) }}" :page-dots="{{ json_encode($pageDots) }}"></institution-promo-carousel>
