@if ($paginator->hasPages())

<nav style="display: flex; width: 100%; justify-content: space-between; gap: 20px;">
    @if ($paginator->onFirstPage())
        <p>Prev</p>
    @else 
        <p><a href="{{ $paginator->previousPageUrl() }}"> Prev</a></p>
    @endif
    @if ($paginator->hasMorePages())
        <p><a href="{{ $paginator->nextPageUrl() }}"> Next</a></p>
    @else 
        <p>Next</p>
    @endif
@endif