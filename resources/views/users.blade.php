@extends('layouts.main')

@section('main_section')
<div class="border border-2 px-2" style="background-color: #eee;">
    <div class="border border-2 px-2 my-2" style="background-color: #fff;">
        <h5 class="my-2">
            Memperlihatkan akun-akun terdaftar
        </h5>
        @foreach ($users as $user)
        <div class="border border-2 px-2 py-1 my-2" style="background-color: #eee;">
            <span class="float-end">
                <a class="btn btn-link btn-sm" style="text-decoration: none;" href="/users/reset_password/{{$user->username}}"  onclick="return confirm('Apakah Anda yakin akan menyetel ulang sandi dari {{$user->username}}?');">
                    <i class="bi bi-shuffle"></i> Setel Ulang Sandi
                </a>
            </span>
            {{$user->username}}
        </div>
        @endforeach
    </div>
</div>
@endsection