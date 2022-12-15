<span class="float-end">
    <b class="{{ $badge_style }}"> {{$file_status }}</b>
    <a href="#" class="text-black" id="dropdownMenuButton{{ $file->file_id }}" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @if ($file->is_questionaire)
            @isset ($file->real_file_id)
                @role('Village')
                <li><a class="dropdown-item" href="/questionaire/fill/{{ $file->village_id }}"><i class="bi bi-ui-checks"></i> Ganti</a></li>
                @endrole
                <li><a class="dropdown-item" href="/questionaire/{{ $file->village_id }}"><i class="bi bi-eye"></i> Lihat</a></li>
                @role(['Developer', 'Administrator'])
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/questionaire/score/{{ $file->village_id }}"><i class="bi bi-journal-check"></i> Nilai</a></li>
                @endrole
            @else
                <li><a class="dropdown-item" href="/questionaire/fill/{{ $file->village_id }}"><i class="bi bi-ui-checks"></i> Isi</a></li>
            @endif
        @else
            @if ($file->is_multiple)
                @isset ($file->real_file_id)
                    <li><a class="dropdown-item" href="/files/upload/{{ $file->village_id }}/{{ $file->file_id }}?redirect={{request()->path()}}"><i class="bi bi-upload"></i> Tambah</a></li>
                    <li><a class="dropdown-item" href="/files/view/{{ $file->village_id }}/{{ $file->file_id }}"><i class="bi bi-eye"></i> Lihat</a></li>
                @else
                    <li><a class="dropdown-item" href="/files/upload/{{ $file->village_id }}/{{ $file->file_id }}?redirect={{request()->path()}}"><i class="bi bi-upload"></i> Unggah</a></li>
                @endif
            @else
                @isset ($file->real_file_id)
                    <li><a class="dropdown-item" href="/files/upload/{{ $file->village_id }}/{{ $file->file_id }}?redirect={{request()->path()}}"><i class="bi bi-upload"></i> Ganti</a></li>
                    <li><a class="dropdown-item" href="/files/download/{{ $file->real_file_id }}"><i class="bi bi-download"></i> Unduh</a></li>
                    <li><a class="dropdown-item" href="/files/message/{{ $file->real_file_id }}"><i class="bi bi-chat"></i> Komentar</a></li>
                    @role(['Developer', 'Administrator'])
                    @if($file->is_verified)
                    <li><a class="dropdown-item" href="/files/cancel_verification/{{ $file->real_file_id }}"><i class="bi bi-check-square"></i> Batalkan Verifikasi</a></li>
                    @else
                    <li><a class="dropdown-item" href="/files/verify/{{ $file->real_file_id }}"><i class="bi bi-check-square"></i> Verifikasi</a></li>
                    @endif
                    @endrole
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/files/delete/{{ $file->real_file_id }}" onclick="return confirm('Apakah Anda yakin akan menghapus berkas ini?');"><i class="bi bi-x-square"></i> Hapus</a></li>
                @else
                    <li><a class="dropdown-item" href="/files/upload/{{ $file->village_id }}/{{ $file->file_id }}?redirect={{request()->path()}}"><i class="bi bi-upload"></i> Unggah</a></li>
                @endif
            @endif
        @endif
    </ul>
</span>