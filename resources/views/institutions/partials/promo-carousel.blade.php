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
@endphp

<institution-promo-carousel heading="{{ $heading }}" :institutions="{{ json_encode(${$institutionType}) }}" :page-dots="{{ json_encode($pageDots) }}"></institution-promo-carousel>
