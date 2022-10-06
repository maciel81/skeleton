<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom text-dark headline">
    <span class="fs-2">
        <i class="bi {{ $icon }}"></i>
        <span class="ps-2">{{ $title }}</span>
    </span>
    <div>
        @if($btnText && $btnRoute)
            <a class="btn btn-lg btn-outline-primary pe-4 py-2" href="{{ route($btnRoute) }}">
                <i class="bi bi-hash"></i> {{ $btnText }}
            </a>
        @endif
    </div>
</div>
