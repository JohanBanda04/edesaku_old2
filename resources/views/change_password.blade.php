@extends('layouts.main')

@section('main_section')
<div class="text-center row">
    <div class="form-signin col-md-4 offset-md-4">
        <form method="post">
            <h5 class="mb-3">Laman ubah sandi pengguna</h5>
            @csrf
            <!-- <div class="form-floating">
                <input type="text" name="username" class="form-control form-control-sm mb-3" id="floatingInput" placeholder="Nama">
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control form-control-sm mb-3" id="floatingPassword" placeholder="Sandi">
                <label for="floatingPassword">Sandi</label>
            </div> -->
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Sandi" id="inputPassword">
                <label class="btn btn-secondary">
                    <span>
                        <i class="bi bi-eye"></i><button type="button" style="display: none;" onclick="togglePassword(this)" for="inputPassword"></button>
                    </span>
                </label>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="new_password" class="form-control" placeholder="Sandi Baru" id="inputNewPassword">
                <label class="btn btn-secondary">
                    <span>
                        <i class="bi bi-eye"></i><button type="button" style="display: none;" onclick="togglePassword(this)" for="inputNewPassword"></button>
                    </span>
                </label>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="new_password_confirmation" class="form-control" placeholder="Ulang Sandi Baru" id="inputNewPasswordConfirmation">
                <label class="btn btn-secondary">
                    <span>
                        <i class="bi bi-eye"></i><button type="button" style="display: none;" onclick="togglePassword(this)" for="inputNewPasswordConfirmation"></button>
                    </span>
                </label>
            </div>
            
            <div class="form-group row mb-2">
                <div class="col-12">
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Ubah Sandi</button>
                    </div>
                </div>
            </div>
        </form>
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

    function togglePassword(elem) {
        var theFor = $(elem).attr('for');
        var theId = '#' + theFor;
        var theElem = $(theId);
        if (theElem.attr('type') === "password") {
            theElem.attr('type', "text");
        } else {
            theElem.attr('type', "password");
        }
    }
    $(document).ready(function() {

    });
</script>
@endsection