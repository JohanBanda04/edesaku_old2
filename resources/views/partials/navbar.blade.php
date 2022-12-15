<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #ddd;">
    <div class="container">
        <a class="navbar-brand" href="/"><b><i class="bi bi-house-door"></i></b> e-Desaku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto me-0 mb-2 mb-lg-0 d-flex">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Arsip
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/files/empty">Masih Kosong</a></li>
                        <li><a class="dropdown-item" href="/files/not-verified">Belum Terverifikasi</a></li>
                        <li><a class="dropdown-item" href="/files/verified">Sudah Terverifikasi</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/villages/files-status">Status Pemberkasan Desa/Kelurahan</a></li>
                        <li><a class="dropdown-item" href="/files">Lihat Semua</a></li>
                    </ul>
                </li><li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @guest Akun @endguest
                        @auth {{ auth()->user()->username }} @endauth
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                        @guest
                            <li><a class="dropdown-item" href="/login">Masuk</a></li>
                        @endguest
                        @auth
                            @role('Village')
                                <li><a class="dropdown-item" href="/villages/{{ App\Models\Village::where('user_id', auth()->user()->id)->first()->id }}/files">Berkas Desa/Kelurahan</a></li>
                                <li><a class="dropdown-item" href="/questionaire/fill/{{ App\Models\Village::where('user_id', auth()->user()->id)->first()->id }}">Kuesioner</a></li>
                                <li><hr class="dropdown-divider"></li>
                            @endrole
                                <li><a class="dropdown-item" href="/change_password?redirect={{request()->path()}}">Ganti Sandi</a></li>
                            @role(['Developer', 'Administrator'])
                                <li><a class="dropdown-item" href="/users">Lihat Akun Terdaftar</a></li>
                            @endrole
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/logout">Keluar</a></li>
                        @endauth
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>