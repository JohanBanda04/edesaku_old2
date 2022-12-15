@if(session()->has('berhasil'))
    <div class="alert alert-success" role="alert">
        {{ session('berhasil') }}
    </div>
@endif
@if(session()->has('gagal'))
    <div class="alert alert-danger" role="alert">
        {{ session('gagal') }}
    </div>
@endif
@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
        {{ $error }}
    </div>
    @endforeach
@endif