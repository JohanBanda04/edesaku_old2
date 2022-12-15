@extends('layouts.main')

@section('main_section')
<div class="border border-2 px-2" style="background-color: #eee;">

    <div class="border border-2 px-2 my-2" style="background-color: #fff;">
        <h5 class="my-2">

        </h5>
        <div class="border border-2 p-2 my-2" style="background-color: #eee;">
            <div class="row">
                @foreach ($villageFiles as $villageFile)
                @if ($villageFile->is_verified == "1")
                    @php
                        $panel_style = "panel-verified";
                        $badge_style = "badge-verified";
                        $file_status = "Terverifikasi";
                    @endphp
                @elseif ($villageFile->is_verified == "0")
                    @php
                        $panel_style = "panel-uploaded";
                        $badge_style = "badge-uploaded";
                        $file_status = "Terunggah";
                    @endphp
                @else
                    @php
                        $panel_style = "panel-empty";
                        $badge_style = "badge-empty";
                        $file_status = "Kosong";
                    @endphp
                @endif
                <div class="col-md-4 col-sm-6">
                    <img src="/files/download/{{$villageFile->real_file_id}}" class="img-thumbnail rounded" style="width: 100%;height: 300px;object-fit: cover;">
                    <div>{{$villageFile->real_file_name}}
                        <span class="float-end">
                            <a href="#" class="text-black" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="/files/download/{{$villageFile->real_file_id}}"><i class="bi bi-download"></i> Unduh</a></li>
                                <li><a class="dropdown-item" href="/files/message/{{$villageFile->real_file_id}}"><i class="bi bi-chat"></i> Komentar</a></li>
                                @auth
                                @role(['Developer', 'Administrator'])
                                @if($villageFile->is_verified)
                                <li><a class="dropdown-item" href="/files/cancel_verification/{{ $villageFile->real_file_id }}"><i class="bi bi-check-square"></i> Batalkan Verifikasi</a></li>
                                @else
                                <li><a class="dropdown-item" href="/files/verify/{{ $villageFile->real_file_id }}"><i class="bi bi-check-square"></i> Verifikasi</a></li>
                                @endif
                                @endrole
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/files/delete/{{$villageFile->real_file_id}}"  onclick="return confirm('Apakah Anda yakin akan menghapus berkas ini?');"><i class="bi bi-x-square"></i> Hapus</a></li>
                                @endauth
                            </ul>
                        </span>
                    </div>
                    <div>
                        <div>
                            <b class="{{ $badge_style }}"> {{$file_status }}</b>
                        </div>
                        <span class="text-muted">{{$villageFile->created_at}}</span>
                        <a class="text-muted" href="/users/{{$villageFile->uploader_id}}/files" style="text-decoration: none;">{{$villageFile->uploader_username}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection