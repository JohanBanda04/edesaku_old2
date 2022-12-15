@extends('layouts.main')

@section('main_section')
<div class="border border-2 px-2" style="background-color: #eee;">
    <div class="border border-2 px-2 my-2" style="background-color: #fff;">
        <h5 class="my-2">
            Memperlihatkan ringkasan status pemberkasan Desa/Kelurahan
        </h5>
        @foreach ($villages as $village)
        <div class="border border-2 px-2 py-1 my-2 {{ $village->panel_class }}">
            <span class="float-end">
                <a class="text-black" href="/villages/{{ $village->id }}/files" style="text-decoration: none;">{{ $village->status }}</a>
            </span>
            <a class="text-black" href="/villages/{{ $village->id }}/files" style="text-decoration: none;">
            {{ $village->name }},
            {{ $village->district->name }},
            {{ $village->district->city->name }}
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection