@if (session('alert') == 'success')
    <div class="alert alert-success" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <strong>{{ session('message') }}</strong>
    </div>
@endif

@if (session('alert') == 'info')
    <div class="alert alert-info" role="alert">
        <i class="bi bi-info-circle-fill"></i>
        <strong>{{ session('message') }}</strong>
    </div>
@endif

@if (session('alert') == 'warning')
    <div class="alert alert-warning" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <strong>{{ session('message') }}</strong>
    </div>
@endif

@if (session('alert') == 'error')
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <strong>{{ session('message') }}</strong>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i>
        {{ $errors->first() }}
    </div>
@endif