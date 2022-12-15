@extends('layouts.main')

@section('main_section')
<div class="border border-2 px-2" style="background-color: #eee;">
    <div class="border border-2 px-2 my-2" style="background-color: #fff;">
        <h5 class="my-2">
            System Tool
        </h5>
        <div>these options will call sensitive methods in one run, proceed with caution</div>
        <form method="post">
            @csrf
            <div>
                <input type="checkbox" class="btn-check" id="cache-clear" autocomplete="off"
                name="methods[]" value="cache:clear">
                <label class="btn btn-outline-secondary btn-sm" for="cache-clear">
                    cache:clear
                </label>
                
                <input type="checkbox" class="btn-check" id="config-clear" autocomplete="off"
                name="methods[]" value="config:clear">
                <label class="btn btn-outline-secondary btn-sm" for="config-clear">
                    config:clear
                </label>

                <input type="checkbox" class="btn-check" id="config-cache" autocomplete="off"
                name="methods[]" value="config:cache">
                <label class="btn btn-outline-secondary btn-sm" for="config-cache">
                    config:cache
                </label>

                <input type="checkbox" class="btn-check" id="view-clear" autocomplete="off"
                name="methods[]" value="view:clear">
                <label class="btn btn-outline-secondary btn-sm" for="view-clear">
                    view:clear
                </label>

                <input type="checkbox" class="btn-check" id="migrate" autocomplete="off"
                name="methods[]" value="migrate">
                <label class="btn btn-outline-secondary btn-sm" for="migrate">
                    migrate
                </label>

                <input type="checkbox" class="btn-check" id="migrate-fresh" autocomplete="off"
                name="methods[]" value="migrate:fresh --seed">
                <label class="btn btn-outline-secondary btn-sm" for="migrate-fresh">
                    migrate:fresh --seed
                </label>

                <input type="checkbox" class="btn-check" id="key-generate" autocomplete="off"
                name="methods[]" value="key:generate">
                <label class="btn btn-outline-secondary btn-sm" for="key-generate">
                    key:generate
                </label>
                
                <input type="checkbox" class="btn-check" id="clean-files" autocomplete="off"
                name="clean-files">
                <label class="btn btn-outline-secondary btn-sm" for="clean-files">
                    clean storage/app/files
                </label>
            </div>
            <div class="form-group row mb-2">
                <div class="col-12">
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary btn-sm">Run</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection