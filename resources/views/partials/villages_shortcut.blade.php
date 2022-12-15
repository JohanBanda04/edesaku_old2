<div class="form-group">
    <select class="form-control" id="villagesShortcut" placeholder="Pilih Desa/Kelurahan...">
        <option value=""></option>
        @foreach (App\Models\Village::with(['district', 'district.city'])->get() as $village)
        <option value="{{ $village->id }}" >{{ $village->name }}, {{ $village->district->name }}, {{ $village->district->city->name }}</option>
        @endforeach
    </select>
</div>