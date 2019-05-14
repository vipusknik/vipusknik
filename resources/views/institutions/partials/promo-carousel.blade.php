@php
    $heading = ($institutionType == 'universities' ? 'Топ вузы' : 'Топ колледжи') . ' ' . \Carbon\Carbon::now()->year;

    $universities = [
        [
            'name' => 'Колледж агробизнеса и экономики Казпотребсоюза',
            'city' => 'Семей',
            'logo' => '/logo-top/7013.png',
            'link' => 'http://vipusknik.kz/institutions/colleges/kolledzh-agrobiznesa-i-ekonomiki-kazpotrebsoyuza'
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
            'name' => 'Государственный высший медицинский колледж имени Д. Калматаева',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/1296/kalmataeva-2png.png',
            'link' => 'https://www.vipusknik.kz/institutions/college/gosudarstvennyy-meditsinskiy-kolledzh-imeni-dkalmataeva'
        ],

        [
            'name' => 'Астанинский технико-экономический колледж',
            'city' => 'Астана',
            'logo' => 'http://mustim09.beget.tech/storage/333/astaninskiy-tekhniko-ekonomicheskiy-kolledzh-atekpng.png',
            'link' => '/institutions/colleges/astaninskiy-tekhniko-ekonomicheskiy-kolledzh'
        ],
    ];
@endphp

@php
    $institutionType = str_plural($institutionType);
@endphp

<institution-promo-carousel heading="{{ $heading }}" :institutions="{{ json_encode(${$institutionType}) }}" :page-dots="{{ json_encode($pageDots) }}"></institution-promo-carousel>
