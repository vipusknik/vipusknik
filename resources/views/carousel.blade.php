@php
    $banners = [
        [
            'link' => 'https://www.vipusknik.kz/',
            'image' => '/img/main-banner.jpg'
        ],
		
		[
            'image' => '/img/travelbook.jpg'
        ],
		
		[
            'link' => 'http://otdyh-vko.kz/',
            'image' => '/img/otdyh-vko.jpg'
        ],
    ];
@endphp

{{-- Carousel --}}
<div data-flickity='{ "cellAlign": "left", "contain": true, "arrowShape": "M25.87899833350241,50.628999380943 l46.49999681743717,41.628999380943 V9 z", "imagesLoaded": true, "autoPlay": true, "wrapAround": true }'>
    @foreach ($banners as $banner)
        <div class="flex items-center justify-center text-center px-4 md:pt-5 pb-4 lg:px-12 lg:py-5 carousel-cell">
            <a href="{{ $banner['link'] }}" target="_blank">
                <img class="w-full h-auto" src="{{ $banner['image'] }}" alt="">
            </a>
        </div>
    @endforeach
</div>
