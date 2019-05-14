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
            'name' => 'Колледж агробизнеса и экономики Казпотребсоюза',
            'city' => 'Семей',
            'logo' => http://mustim09.beget.tech/storage/433/20png.png',
            'link' => '/institutions/colleges/kolledzh-agrobiznesa-i-ekonomiki-kazpotrebsoyuza'
        ],
		
        [
            'name' => 'Усть-Каменогорский политехнический колледж',
            'city' => 'Усть-Каменогорский',
            'logo' => 'http://mustim09.beget.tech/storage/279/kgkp-ust-kamenogorskiy-politekhnicheskiy-kolledzh-logopng.png',
            'link' => '/institutions/college/ust-kamenogorskiy-politekhnicheskiy-kolledzh'
        ],
		[
            'name' => 'Государственный высший медицинский колледж имени Д. Калматаева',
            'city' => 'Семей',
            'logo' => 'http://mustim09.beget.tech/storage/1296/kalmataeva-2png.png',
            'link' => 'https://www.vipusknik.kz/institutions/college/gosudarstvennyy-meditsinskiy-kolledzh-imeni-dkalmataeva'
        ],
    ];
@endphp

@php
    $institutionType = str_plural($institutionType);
@endphp

<institution-promo-carousel heading="{{ $heading }}" :institutions="{{ json_encode(${$institutionType}) }}" :page-dots="{{ json_encode($pageDots) }}"></institution-promo-carousel>
