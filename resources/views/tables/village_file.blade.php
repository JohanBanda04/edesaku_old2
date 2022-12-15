<div class="row my-2">
    <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2 p-2">
        @include('partials.villages_shortcut')
    </div>
</div>

<div class="border border-2 px-2" style="background-color: #eee;">
    @forelse ($villageFiles as $villageFile)
        <div class="border border-2 px-2 my-2" style="background-color: #fff;">
            <h5 class="my-2">
                <a class="text-black" href="/villages/{{ $villageFile[0]->village_id }}/files" style="text-decoration: none;"> {{ $villageFile[0]->village_name }},
                {{ $villageFile[0]->district_name }},
                {{ $villageFile[0]->city_name }}
                </a>
            </h5>
            @php
                $prev_file_id = 0;
            @endphp
            @foreach ($villageFile as $file)
            @if ($file->file_id == $prev_file_id)
                @continue
            @endif
            @php
                $prev_file_id = $file->file_id;
            @endphp
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
                        {{ $file->file_name }} @if ($file->file_description != "")<span class="text-mute">({{$file->file_description}})</span>@endif
                        @include('partials.file_operation_shortcut')
                    </div>
                    <div style="font-size: 10pt;">
                        <span class="text-muted">{{ $file->created_at }}</span>
                        <a class="text-muted" href="/users/{{ $file->uploader_id }}/files" style="text-decoration: none;">{{ $file->uploader_username }}</a>
                    </div>
                    @isset($file->messages)
                    @foreach($file->messages as $comment)
                    <div class="border border-2 px-2 py-1 my-2" style="background-color: #eee;">
                        {{$comment->content}}
                        <div style="font-size: 10pt;">
                            <span class="text-muted">{{$comment->created_at}}</span>
                        </div>
                    </div>
                    @endforeach
                    @endisset
                </div>
            @endforeach
        </div>
    @empty
        <div class="border border-2 px-2 my-2" style="background-color: #fff;">
            <h3 class="p-2">
                Kosong
            </h3>
        </div>
    @endforelse
</div>



@section('script_section')
<script>
    $(document).ready(function() {
        $('#villagesShortcut').change(function(e) {
            window.location.replace("/villages/" + (this).value + "/files");
        }).selectize({
            sortField: 'text'
        });
    });
</script>
@endsection