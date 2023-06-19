@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Alert!</strong><br>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Alertr!</strong><br>
        {{ session('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert!</strong><br>
        <ul class="list-group list-group-numbered">
            @foreach ($errors->all() as $error)
                <li class="list-group-item">{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
