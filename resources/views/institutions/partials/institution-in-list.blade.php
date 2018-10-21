<div class="flex mb-6">
    <div class="w-12 flex-no-shrink mr-2 p-1">
        @if ($institution->hasLogo())
            <a href="{{ route('institutions.show', [ $institution->type, $institution ]) }}" class="block" target="_blank">
                <img src="{{ asset($institution->logo()->getUrl()) }}" alt="{{ $institution->title }}" class="block w-full">
            </a>
        @endif
    </div>

    <div class="flex-1 min-w-0 flex flex-col justify-center px-2 border-orange-light" style="border-left-width: 1.3px">
        <div class="mb-1">
            <a href="{{ route('institutions.show', [ $institution->type, $institution ]) }}" class="text-blue-dark no-underline hover:underline" target="_blank">
                {{ $institution->title }}
            </a>
        </div>
        <div class="text-sm text-grey-dark">
            Город: {{ $institution->city->title }}
        </div>
    </div>
</div>
