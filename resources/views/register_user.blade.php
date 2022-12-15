@extends('layouts.main')

@section('main_section')
<div class="container mb-5" style="margin-top: 5rem !important;">
    <div class="card mt-2">
        <div class="card-body">
            <div class="card-title">
                Laman Daftar Pengguna
                <hr>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <!-- {{ csrf_field() }} -->
                    <div class="form-group row mb-2">
                        <label class="col-sm-2 col-form-label">username</label>
                        <div class="col-sm-10">
                            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Masukkan username pengguna..." value="{{ old('username') }}" required>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password pengguna..." required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label class="col-sm-2 col-form-label">Konfirmasi</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kembali password pengguna..." required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <div class="col-sm-12">
                            <div class="float-end">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script_section')
<script>
    function removeElement(target) {
        $(target).animate({
            opacity: "-=1"
        }, 1000, function() {
            $(target).remove();
        });
    }

    $(document).ready(function() {
        // removeElement('#loader');
        $('#kelurahan_ar').change(function(e) {
            window.location.replace("/arsip/kelurahan/" + (this).value);
            // console.log((this).value)
        }).selectize({
            sortField: 'text'
        });
    });
</script>
@endsection