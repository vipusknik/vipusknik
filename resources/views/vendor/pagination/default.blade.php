@if ($paginator->hasPages())
    <div class="ui pagination menu custom">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="item disabled">&laquo;</div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="item">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <div class="item disabled">{{ $element }}</div>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="" class="active item">{{ $page }}</a>
                    @else
                        <a href="{{ $url }}" class="item">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="item" rel="next">&raquo;</a>
        @else
            <a href="" class="disabled item">&raquo;</a>
        @endif
    </div>
@endif