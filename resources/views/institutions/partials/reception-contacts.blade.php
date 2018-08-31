<div class="flex items-center mb-3">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-lg lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 20S3 10.87 3 7a7 7 0 1 1 14 0c0 3.87-7 13-7 13zm0-11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/></svg>
    </div>
    <div class="lg:text-lg lg:text-white">
        {{ $institution->reception->address }}
    </div>
</div>

<div class="flex items-center mb-3">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 18.35V19a1 1 0 0 1-1 1h-2A17 17 0 0 1 0 3V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4c0 .56-.31 1.31-.7 1.7L3.16 8.84c1.52 3.6 4.4 6.48 8 8l2.12-2.12c.4-.4 1.15-.71 1.7-.71H19a1 1 0 0 1 .99 1v3.35z"/></svg>
    </div>
    <a href="tel:{{ $institution->reception->phone }}" class="text-green-light lg:text-lg lg:text-white lg:no-underline">{{ $institution->reception->phone }}</a>
</div>

<div class="flex">
    <div class="flex-none mr-2 lg:mr-3">
        <svg class="inline-block w-4 h-4 fill-current text-black lg:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M13.6 13.47A4.99 4.99 0 0 1 5 10a5 5 0 0 1 8-4V5h2v6.5a1.5 1.5 0 0 0 3 0V10a8 8 0 1 0-4.42 7.16l.9 1.79A10 10 0 1 1 20 10h-.18.17v1.5a3.5 3.5 0 0 1-6.4 1.97zM10 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
    </div>
    <a href="mailto:{{ $institution->reception->email }}" class="text-green-light lg:text-lg lg:text-white lg:no-underline">{{ $institution->reception->email }}</a>
</div>
