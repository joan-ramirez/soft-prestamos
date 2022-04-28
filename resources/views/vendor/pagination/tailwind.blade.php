@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pagination">
        <div class="links">
            @if ($paginator->onFirstPage())
                <span class="">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="info_pagination">
            <div>
                <p class="">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>
        </div>
    </nav>
@endif
