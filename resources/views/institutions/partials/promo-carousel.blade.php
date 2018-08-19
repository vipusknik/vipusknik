@php
    $heading = ($institutionType == 'universities' ? 'Топ вузы' : 'Топ колледжи') . ' ' . \Carbon\Carbon::now()->year;

    $universities = [
        [
            'name' => 'Академический инновационный университет',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/389/8cca0jpg.jpeg',
            'link' => '#'
        ],

        [
            'name' => 'Карагандинский государственный университет имени академика Е. А. Букетова',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/381/ksu-logogif.gif',
            'link' => '#'
        ],
    ];

    $colleges = [
        [
            'name' => 'Академический инновационный университет',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/389/8cca0jpg.jpeg',
            'link' => '#'
        ],

        [
            'name' => 'Карагандинский государственный университет имени академика Е. А. Букетова',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/381/ksu-logogif.gif',
            'link' => '#'
        ],
    ];
@endphp

<institution-promo-carousel heading="{{ $heading }}" :institutions="{{ json_encode(${$institutionType}) }}"></institution-promo-carousel>
