<form action="{{ route('institutions.index', $institutionType) }}" method="get">
    <typeahead name="query"
              :endpoint="'/institutions/{{ $institutionType }}/search'"
              placeholder="Название учебного заведения..."
              class="block w-full mb-4 lg:mb-3"
              input-classes="block w-full text-grey px-6 placeholder-text-grey-dark"
              input-styles="padding-top: .937rem; padding-bottom: .937rem;"
              spinner-classes="mt-2">
    </typeahead>

    <ss-select class="mb-4 text-grey-darkest" name="specialty">
        <input type="search" class="block w-full h-12 text-grey px-6" style="padding-top: .937rem; padding-bottom: .937rem;">
        <option value="" class="py-2 px-6">
            Специальности{{ $institutionType == 'colleges' ? ', квалификации' : '' }}
        </option>
        @foreach ($specialties as $specialty)
            <option value="{{ $specialty->id }}" {{ request('specialty') == $specialty->id ? 'selected' : '' }} class="py-2 px-6">
                {{ $specialty->title }} ({{ $specialty->code }})
            </option>
        @endforeach
    </ss-select>

    <div class="flex">
        <ss-select class="flex-1 min-w-0 h-full text-grey-darkest mr-2" name="city">
            <input type="search" class="block w-full h-12 text-grey px-6" style="padding-top: .937rem; padding-bottom: .937rem;">
            <option value="" class="px-6 py-2">Город</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }} class="px-6 py-2">
                    {{ $city->title }}
                </option>
            @endforeach
        </ss-select>

        <button class="block w-12 flex-no-shrink bg-blue-dark">
            <svg class="inline-block h-6 w-8 mt-1 fill-current text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
        </button>
    </div>
</form>
