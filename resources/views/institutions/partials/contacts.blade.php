@if ($institution->address)
<div class="flex items-center mb-3">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
    </div>
    <div class="lg:text-white lg:text-xl">{{ $institution->address }}</div>
</div>
@endif

@if ($institution->phone_number)
<div class="flex items-center mb-3">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/></svg>
    </div>
    <a href="tel:{{ $institution->phone_number }}" class="text-blue-dark lg:text-white lg:text-xl lg:no-underline">{{ $institution->phone_number }}</a>
</div>
@endif

@if ($institution->reception && $institution->reception->email)
<div class="flex mb-3">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.6 13.47A4.99 4.99 0 0 1 5 10a5 5 0 0 1 8-4V5h2v6.5a1.5 1.5 0 0 0 3 0V10a8 8 0 1 0-4.42 7.16l.9 1.79A10 10 0 1 1 20 10h-.18.17v1.5a3.5 3.5 0 0 1-6.4 1.97zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
    </div>
    <a href="mailto:{{ $institution->reception->email }}" class="text-blue-dark lg:text-white lg:text-xl lg:no-underline">{{ $institution->reception->email }}</a>
</div>
@endif

@if ($institution->web_site_url)
<div class="flex">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm2-2.25a8 8 0 0 0 4-2.46V9a2 2 0 0 1-2-2V3.07a7.95 7.95 0 0 0-3-1V3a2 2 0 0 1-2 2v1a2 2 0 0 1-2 2v2h3a2 2 0 0 1 2 2v5.75zm-4 0V15a2 2 0 0 1-2-2v-1h-.5A1.5 1.5 0 0 1 4 10.5V8H2.25A8.01 8.01 0 0 0 8 17.75z"/>
        </svg>
    </div>
    <a href="{{ $institution->web_site_url }}" target="_blank" class="text-blue-dark lg:text-white lg:text-xl lg:no-underline">{{ $institution->web_site_url }}</a>
</div>
@endif
