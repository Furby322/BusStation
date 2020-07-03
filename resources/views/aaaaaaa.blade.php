@php
    $pattern = ['~/page-d+.html?page=d+~', '~.html?page=d+~'];
@endphp

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span>&laquo;</span>
            </li>
        @else
            @if ($paginator->currentPage() == 2)
                <li>
                    <a href="{{ preg_replace($pattern, '', $paginator->previousPageUrl()) }}.html" rel="prev">&laquo;</a>
                </li>
            @else
                <li>
                    <a href="{{ preg_replace($pattern, '/page-'.($paginator->currentPage()-1), $paginator->previousPageUrl()) }}.html" rel="prev">&laquo;</a>
                </li>
            @endif
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled">
                    <span>{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        @if ($page == 1)
                            <li>
                                <a href="{{ preg_replace($pattern, '', $url) }}.html">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ preg_replace($pattern, '/page-'.$page, $url) }}.html">{{ $page }}</a>
                            </li>
                        @endif
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ preg_replace($pattern, '/page-'.($paginator->currentPage()+1),
                 $paginator->nextPageUrl()) }}.html" rel="next">&raquo;</a>
            </li>
        @else
            <li class="disabled">
                <span>&raquo;</span>
            </li>
        @endif
    </ul>
@endif










