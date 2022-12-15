@extends('layouts.main')

@section('main_section')
<div class="border border-2 px-2" style="background-color: #eee;">
    <div class="border border-2 px-2 my-2" style="background-color: #fff;">
        @if ($file->is_verified == "1")
            @php
                $panel_style = "panel-verified";
                $badge_style = "badge-verified";
                $file_status = "Terverifikasi";
            @endphp
        @elseif ($file->is_verified == "0")
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
        <div class="border border-2 p-2 my-2 {{$panel_style}}">
            <div>
                <i class="bi bi-file-earmark"></i>
                {{ $file->file_name }}
                @include('partials.file_operation_shortcut')
            </div>
            <div style="font-size: 10pt;">
                <span class="text-muted">{{ $file->created_at }}</span>
                <a class="text-muted" href="/users/{{ $file->uploader_id }}/files" style="text-decoration: none;">{{ $file->uploader_username }}</a>
            </div>
        </div>

        @role(['Developer', 'Administrator'])
        <h5 class="my-2">
            Mengirim pesan ke {{$village_name}} terhadap pemberkasan {{$file_name}}-nya
        </h5>
        <form method="post" class="border border-2 p-2 my-2" style="background-color: #eee;">
            @csrf
            <div class="form-floating mb-2">
                <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea" style="height: 5em"></textarea>
                <label for="floatingTextarea">Pesan</label>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="float-end">
                        <label class="btn btn-primary btn-sm">
                            <span>
                                <i class="bi bi-upload"></i> Kirim <input type="submit" name="submit" value="submit" style="display: none;" id="uploadSubmit">
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
        @else
        <h5 class="my-2">
            Komentar terhadap {{$file_name}} {{$village_name}}
        </h5>
        @endrole
        @foreach ($comments as $comment)
        <div class="border border-2 px-2 py-1 my-2" style="background-color: #eee;">
            {{$comment->content}}
            <div style="font-size: 10pt;">
                <span class="text-muted">{{$comment->created_at}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection