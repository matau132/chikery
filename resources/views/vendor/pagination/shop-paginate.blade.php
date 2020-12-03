@if ($paginator->hasPages())
    <nav class="ps-pagination">
        <ul class="pagination">
            {{-- Previous Page Link --}}
                <li class="page-item">
                    <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-caret-left"></i></a>
                </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span class="">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                             <li class="active" aria-current="page"><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @else
                            <li class=""><a class="" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
                <li class="">
                    <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-caret-right"></i></a>
                </li>
                
        </ul>
    </nav>
@endif
