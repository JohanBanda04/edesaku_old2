@extends('layouts.main')

@section('carousel_section')
<div style="margin-top:3.5em !important;">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="banners/1.jpg"><img src="banners/1.jpg" class="image-banner" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="banners/2.jpg"><img src="banners/2.jpg" class="image-banner" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="banners/3.jpg"><img src="banners/3.jpg" class="image-banner" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="banners/4.jpg"><img src="banners/4.jpg" class="image-banner" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="banners/5.jpg"><img src="banners/5.jpg" class="image-banner" alt="..."></a>
            </div>
            <div class="carousel-item">
                <a href="banners/6.jpg"><img src="banners/6.jpg" class="image-banner" alt="..."></a>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endsection

@section('main_section')
<div>
    <div class="row my-2">
        <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2 p-2">
            @include('partials.villages_shortcut')
        </div>
    </div>
    <div class="row my-2">
        <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2 p-2">
            <div class="card p-2" style="background-color: #dee">
                <h5>Batas waktu pengunggahan berkas
                    <hr>
                    <b id='limitTime'>{{ $limitTimeStr }}</b>
                    @auth
                    @role(['Developer', 'Administrator'])
                    <span class="float-end">
                        <button class="btn btn-secondary-outline btn-sm " data-bs-toggle="modal" data-bs-target="#modalChangeLimit"><i class="bi bi-wrench"></i> Ubah</button>
                    </span>
                    @endrole
                    @endauth
                </h5>

                <div class="modal fade" id="modalChangeLimit">
                    <div class="modal-dialog modal-lg">
                        <form class="modal-content" action="/time/change-time-limit" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah Tanggal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                                @endforeach
                                @endif
                                <div class="input-group mb-3">
                                    @csrf
                                    <label class="input-group-text" for="inputTanggal">Tanggal</label>
                                    <input type="number" name="date" min="1" max="31" class="form-control" id="inputTanggal" required value="{{ $gantiTanggal->date }}">
                                    <label class="input-group-text" for="inputBulan">Bulan</label>
                                    <select class="form-select" name="month" id="inputBulan" required>
                                        <option>Bulan...</option>
                                        <option value="1" @if ($gantiTanggal->month == '1') selected @endif>Januari</option>
                                        <option value="2" @if ($gantiTanggal->month == '2') selected @endif>Februari</option>
                                        <option value="3" @if ($gantiTanggal->month == '3') selected @endif>Maret</option>
                                        <option value="4" @if ($gantiTanggal->month == '4') selected @endif>April</option>
                                        <option value="5" @if ($gantiTanggal->month == '5') selected @endif>Mei</option>
                                        <option value="6" @if ($gantiTanggal->month == '6') selected @endif>Juni</option>
                                        <option value="7" @if ($gantiTanggal->month == '7') selected @endif>Juli</option>
                                        <option value="8" @if ($gantiTanggal->month == '8') selected @endif>Agustus</option>
                                        <option value="9" @if ($gantiTanggal->month == '9') selected @endif>September</option>
                                        <option value="10" @if ($gantiTanggal->month == '10') selected @endif>Oktober</option>
                                        <option value="11" @if ($gantiTanggal->month == '11') selected @endif>November</option>
                                        <option value="12" @if ($gantiTanggal->month == '12') selected @endif>Desember</option>
                                    </select>
                                    <label class="input-group-text" for="inputBulan">Tahun</label>
                                    <input type="number" name="year" readonly required class="form-control" id="inputBulan" value="2022">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div>Sisa waktu: <b id='remainingTime'></b></div>
            </div>
        </div>
        <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2 p-2">
            <div class="card p-2" style="background-color: #eed">
                <h5>Ketentuan pengunggahan berkas
                    <hr>
                </h5>
                @foreach ($files as $file)
                <div class="px-3 py-1 m-1" style="background-color: #fff">
                    <b>{{$file->name}}</b>@if ($file->description != "") ({{$file->description}})@endif: {{$file->requirement}}</li>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row my-2">
        @guest
        <div class="col-lg-4 col-md-6 p-2">
            <a href="/login" class="card text-black text-center p-2" style="background-color: #dee; height: 5em; text-decoration: none;">
                Masuk<br>
                Pengguna
            </a>
        </div>
        @endguest
        @role('Village')
        <div class="col-lg-4 col-md-6 p-2">
            <a href="/villages/{{ App\Models\Village::where('user_id', auth()->user()->id)->first()->id}}/files" class="card text-black text-center p-2" style="background-color: #ede; height: 5em; text-decoration: none;">
                Lihat Pemberkasan
            </a>
        </div>
        <div class="col-lg-4 col-md-6 p-2">
            <a href="/questionaire/fill/{{ App\Models\Village::where('user_id', auth()->user()->id)->first()->id}}" class="card text-black text-center p-2" style="background-color: #eed; height: 5em; text-decoration: none;">
                Isi<br>
                Kuesioner
            </a>
        </div>
        <div class="col-lg-4 col-md-6 p-2">
            <a href="/villages/{{ App\Models\Village::where('user_id', auth()->user()->id)->first()->id}}/messages" class="card text-black text-center p-2" style="background-color: #dde; height: 5em; text-decoration: none;">
                Notifikasi
            </a>
        </div>
        @endrole
        <div class="col-lg-4 col-md-6 p-2">
            <a href="/villages/files-status" class="card text-black text-center p-2" style="background-color: #ded; height: 5em; text-decoration: none;">
                Status Pemberkasan<br>
                Desa/Kelurahan
            </a>
        </div>
        <div class="col-lg-4 col-md-6 p-2">
            <a href="/files" class="card text-black text-center p-2" style="background-color: #edd; height: 5em; text-decoration: none;">
                Lihat Semua
            </a>
        </div>
    </div>

</div>
@endsection

@section('script_section')
<script>
    // function removeElement(target) {
    //     $(target).animate({
    //         opacity: "-=1"
    //     }, 1000, function() {
    //         $(target).remove();
    //     });
    // }
    // var myCarousel = document.querySelector('#myCarousel')
    // var carousel = new bootstrap.Carousel(myCarousel, {
    //     interval: 2000,
    //     wrap: true
    // })

    var c = 0

    function display_c() {
        var refresh = 1000; // Refresh rate in milli seconds
        c++;
        mytime = setTimeout('display_ct()', refresh)
    }

    function display_ct() {
        var server = new Date("{{ $serverTime }}");
        var limit = new Date("{{ $limitTime }}");
        if (server > limit) {
            $('#remainingTime').html(
                "Waktu unggah sudah habis"
            );
            return 0;
        }
        server.setSeconds(server.getSeconds() + c);
        var timeDiff = limit.getTime() - server.getTime();
        var dayDiff = Math.floor(timeDiff / (24 * 60 * 60 * 1000));
        timeDiff = timeDiff - dayDiff * 24 * 60 * 60 * 1000;
        var hourDiff = Math.floor(timeDiff / (60 * 60 * 1000));
        timeDiff = timeDiff - hourDiff * 60 * 60 * 1000;
        var minDiff = Math.floor(timeDiff / (60 * 1000));
        timeDiff = timeDiff - minDiff * 60 * 1000;
        var secDiff = Math.floor(timeDiff / (1000));
        var dayDiffStr = (dayDiff == 0) ? "" : dayDiff + " hari ";
        var hourDiffStr = (dayDiff == 0 & hourDiff == 0) ? "" : hourDiff + " jam ";
        var minDiffStr = (dayDiff == 0 & hourDiff == 0 & minDiff == 0) ? "" : minDiff + " menit ";
        var secDiffStr = (dayDiff == 0 & hourDiff == 0 & minDiff == 0 & secDiff == 0) ? "" : secDiff + " detik ";

        $('#remainingTime').html(
            dayDiffStr +
            hourDiffStr +
            minDiffStr +
            secDiffStr
        );
        if (secDiffStr != "") {
            display_c();
        } else {
            $('#remainingTime').html(
                "Waktu unggah sudah habis"
            );
            return 0;
        }
    }



    $(document).ready(function() {

        display_ct(0);
        $('#villagesShortcut').change(function(e) {
            window.location.replace("/villages/" + (this).value + "/files");
        }).selectize({
            sortField: 'text'
        });
        
        $('#inputBulan').change(function(e) {
            d29 = [2]
            d30 = [4, 6, 9, 11];
            d31 = [1, 3, 5, 7, 8, 10, 12];
            console.log(d29.includes(parseInt($(this).val())));

            if (d29.includes(parseInt($(this).val()))) {
                if ($("#inputTanggal").val() > 29) {
                    $("#inputTanggal").val(29);
                }
                $("#inputTanggal").attr("max", "29");
            } else if (d30.includes(parseInt($(this).val()))) {
                if ($("#inputTanggal").val() > 30) {
                    $("#inputTanggal").val(30);
                }
                $("#inputTanggal").attr("max", "30");
            } else if (d31.includes(parseInt($(this).val()))) {
                if ($("#inputTanggal").val() > 31) {
                    $("#inputTanggal").val(31);
                }
                $("#inputTanggal").attr("max", "31");
            }
        });
    });
</script>
@endsection