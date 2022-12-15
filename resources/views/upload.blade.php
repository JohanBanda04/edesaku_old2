@extends('layouts.main')

@section('main_section')
<div class="border border-2 px-2" style="background-color: #eee;">
    <form action="" method="post" class="border border-2 px-2 my-2" style="background-color: #fff;" enctype="multipart/form-data" id="uploadForm">
        @csrf
        <h5 class="my-2">
            Laman unggah {{ $file->name }} {{ $village->name }}, {{ $village->district->name }}, {{ $village->district->city->name }}
        </h5>
        <div class="border border-2 p-2 my-2" style="background-color: #eee;">
            @if ($file->is_multiple)
            <div class="input-group mb-2">
                <label class="input-group-text" for="inputName">
                    Judul
                </label>
                <input class="form-control" type="text" name="name" size="40" id="inputName">
            </div>
            @endif
            <div class="input-group">
                <label class="btn btn-primary" type="button">
                    <span>
                        <!-- @if ($file->is_multiple) name="files[]" multiple="multiple" @else name="file" @endif -->
                        <i class="bi bi-file-earmark"></i> Browse <input type="file" name="file" accept="{{ $file->accept }}" style="display: none;" required="" id="inputFile">
                    </span>
                </label>
                <label for="inputFile" class="form-control" style="cursor: pointer">
                    <!-- <input type="text" class="form-control" size="40" readonly="" required="" disabled=""> -->
                </label>
                <label class="btn btn-primary">
                    <span>
                        <i class="bi bi-upload"></i> Unggah <input type="submit" name="submit" value="submit" style="display: none;" id="uploadSubmit">
                    </span>
                </label>
            </div>
            {{ $file->requirement }}
        </div>
    </form>
</div>
@endsection

@section('script_section')
<script>

    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
    $(':file').on('fileselect', function(event, numFiles, label) {
        // var input = $('[for="inputFile"]'),
        var input = $(this).parents('.input-group').find('[for="inputFile"]'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        if (input.length) {
            input.text(log)
        } else {
            if (log) alert(log)
        }
    });
</script>
@endsection