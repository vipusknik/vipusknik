@php
    $banners = [
        '/img/main-banner.jpg',
        '/img/avicenna-main-banner.jpg',
        '/img/vita-main-banner.jpg',
    ];
@endphp

{{-- Carousel --}}
@foreach ($banners as $banner)
<div class="flex items-center justify-center text-center px-4 md:pt-5 pb-4 lg:px-12 lg:py-5 carousel-cell">
    {{-- <div class="flex justify-end w-1/4 sm:w-1/3 mr-3 lg:mr-0">
        <img src="/img/main-banner-girl.jpg" alt="" class="main-banner-girl block h-24 sm:h-32 md:h-48">
    </div>

    <div class="w-3/4 sm:w-2/3">
        <h2 class="font-franklin-gothic tracking-tight uppercase mb-3 text-2xl xs:text-3xl sm:text-4xl md:text-5xl lg:text-4rem">
            <span class="text-blue-darker tracking-normal font-black mb-4">Не знаешь</span><br>
            <span class="font-normal text-orange">куда поступить?</span>
        </h2>
        <h4 class="text-blue-lightish font-normal text-sm sm:text-base">
            На сегодняшний день в Казахстане насчитывается <br>131 ВУЗ и 729 колледжей
        </h4>
    </div> --}}
    <img class="w-full h-auto" src="{{ $banner }}" alt="">
</div>
@endforeach
