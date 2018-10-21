{{-- Строка поиска --}}
<form action="/search" method="get" class="flex bg-orange py-1 px-6 lg:px-32 lg:py-2">
    <input type="search"
           name="query"
           value="{{ request('query') }}"
           class="flex-1 p-3 lg:text-lg lg:py-2 lg:px-10 mr-2"
           placeholder="Cпециальность, учебное заведение...">

    <button type="submit" class="flex justify-center w-10 flex-no-shrink bg-blue-dark hover:bg-blue-darker">
        <svg class="inline-block h-4 w-6 pl-px fill-current text-white" viewBox="0 0 20 20">
            <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
        </svg>
    </button>
</form>
