@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" tabindex="-1" aria-disabled="true" aria-label="@lang('pagination.previous')" data-page="prev">Prev</a>
        </li>
        @else
        <li class="paginate_button page-item previous">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link" href="#" tabindex="-1" aria-disabled="true" aria-label="@lang('pagination.previous')" data-page="prev">Prev</a>
        </li>
        @endif



        @foreach ($elements as $element)

        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><a class="page-link" href="#"><span>{{ $element }}</span><a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li class="paginate_button page-item active" aria-current="page">
                    <a class="page-link" data-page="1"><span>{{ $page }}</span><a>
                </li>
                @else
                    <li class="paginate_button page-item" aria-current="page">
                        <a href="{{ $url }}" class="page-link" data-page="1">{{ $page }}<a>
                    </li>
                @endif
            @endforeach
        @endif
        @endforeach

      @if ($paginator->hasMorePages())
      <li class="page-item paginate_button page-item next">
        <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" data-page="next" class="page-link" href="#">Next</a>
      </li>
      @else
      <li class="page-item next disabled">
        <a class="page-link" tabindex="-1" aria-disabled="true" aria-label="@lang('pagination.next')" data-page="next">Next</a>
      </li>
      @endif
</ul>
</nav>
@endif
