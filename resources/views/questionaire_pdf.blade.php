@extends('layouts.pdf')

@section('main_section')
<div style="background: #eee; padding: 40px;">
    <button onclick="printPDF();" style="float: right; margin-top: 20px; margin-right: 20px; padding: 5px 10px; font-size: 0.9rem; font-weight: 400;">Print PDF</button>
    <div id="pdf" style="background: #fff; padding: 20px">
        <div style="padding: 5px 10px; font-size: 1.4rem">
            Kuesioner Indeks Desa/Kelurahan Sadar Hukum
            <br>{{ $village->name }}, {{ $village->district->name }}, {{ $village->district->city->name }}
        </div>
        <table width="100%">
            <tr>
                <th>Kuesioner</th>
                <th>Jawaban</th>
                <th>Sumber</th>
                <th>Nilai</th>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1. Akses Informasi Hukum</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.1. Keluarga Sadar Hukum</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.1.1. Jumlah Keluarga Sadar Hukum</td>
            </tr>
            <tr>
                <td>1. Apakah di desa/kelurahan ini telah dibentuk Keluarga Sadar Hukum?</td>
                <td>@isset($name1) {{ $name1 }} @endisset</td>
                <td>Bag. Hukum Kabupaten/Kota (SK Bupati/Walikota)</td>
                <td>@isset($score1) {{ $score1 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Bila telah ada, berapa jumlahnya?</td>
                <td>@isset($name2) {{ $name2 }} @endisset</td>
                <td>Bag. Hukum Kabupaten/Kota (SK Bupati/Walikota)</td>
                <td>@isset($score2) {{ $score2 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.1.2. Kegiatan penyuluhan pada Keluarga Sadar Hukum (kadarkum)</td>
            </tr>
            <tr>
                <td>1. Apakah selama kurun waktu 1 (satu) tahun terakhir ada kegiatan penyuluhan hukum yang dilakukan pada Kelompok kadarkum?</td>
                <td>@isset($name3) {{ $name3 }} @endisset</td>
                <td>Bag. Hukum Kabupaten/Kota (SK Bupati/Walikota)</td>
                <td>@isset($score3) {{ $score3 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Bila ada, siapa atau instansi mana saja yang melakukan kegiatan penyuluhan hukum tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name4) @if ($name4=="on") @php $array[]="Kemenkumham" @endphp @endif @endisset
                    @isset($name5) @if ($name5=="on") @php $array[]="Polri" @endphp @endif @endisset
                    @isset($name6) @if ($name6=="on") @php $array[]="TNI" @endphp @endif @endisset
                    @isset($name7) @if ($name7=="on") @php $array[]="Pemda" @endphp @endif @endisset
                    @isset($name9) @if ($name9=="on") @isset($name8) @php $array[]=$name8 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Bag. Hukum Kabupaten/Kota (SK Bupati/Walikota)</td>
                <td>@isset($score4) {{ $score4 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Materi apa saja yang disampaikan atau disuluhkan kepada Keluarga Sadar Hukum (Kadarkum)?</td>
                <td>@php $array=[] @endphp
                    @isset($name10) @if ($name10=="on") @php $array[]="Perkawinan" @endphp @endif @endisset
                    @isset($name11) @if ($name11=="on") @php $array[]="Kekerasan dalam rumah tangga" @endphp @endif @endisset
                    @isset($name12) @if ($name12=="on") @php $array[]="Narkotika" @endphp @endif @endisset
                    @isset($name13) @if ($name13=="on") @php $array[]="Perdagangan orang" @endphp @endif @endisset
                    @isset($name14) @if ($name14=="on") @php $array[]="Kebersihan" @endphp @endif @endisset
                    @isset($name15) @if ($name15=="on") @php $array[]="Lingkungan Hidup" @endphp @endif @endisset
                    @isset($name16) @if ($name16=="on") @php $array[]="Pajak" @endphp @endif @endisset
                    @isset($name17) @if ($name17=="on") @php $array[]="Perlindungan anak" @endphp @endif @endisset
                    @isset($name18) @if ($name18=="on") @php $array[]="Kamtibnas" @endphp @endif @endisset
                    @isset($name19) @if ($name19=="on") @php $array[]="Kerukunan Hidup Bermasyarakat" @endphp @endif @endisset
                    @isset($name20) @if ($name20=="on") @php $array[]="Pertanahan" @endphp @endif @endisset
                    @isset($name21) @if ($name21=="on") @php $array[]="Bantuan Hukum" @endphp @endif @endisset
                    @isset($name23) @if ($name23=="on") @isset($name22) @php $array[]=$name22 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>1. Kepala Desa/Lurah<br>2. Ketua Kelompok Kadarkum</td>
                <td>@isset($score5) {{ $score5 }} @endisset</td>
            </tr>
            <tr>
                <td>4. Apakah Desa/Kelurahan menyediakan anggaran untuk mendukung kegiatan yang dilakukan oleh Kelompok Keluarga Sadar Hukum (Kadarkum)?</td>
                <td>@isset($name24) {{ $name24 }} @endisset</td>
                <td>1. Kepala Desa/Lurah<br>2. Ketua Kelompok</td>
                <td>@isset($score6) {{ $score6 }} @endisset</td>
            </tr>
            <tr>
                <td>5. Bila ada, berasal dari mana sumber dana tersebut dan berapa jumlahnya dalam 1 Tahun?</td>
                <td>@php $array=[] @endphp
                    @isset($name26) @if ($name26=="on") @isset($name25) @php $array[]="Dana desa/Kelurahan, Jumlahnya ".$name25 @endphp @endisset @endif @endisset
                    @isset($name28) @if ($name28=="on") @isset($name27) @php $array[]="Swadaya Masyarakat, Jumlahnya ".$name27 @endphp @endisset @endif @endisset
                    @isset($name30) @if ($name30=="on") @isset($name29) @php $array[]="Bantuan Pihak Ketiga, Jumlahnya ".$name29 @endphp @endisset @endif @endisset
                    @isset($name33) @if ($name33=="on") @isset($name31) @isset($name32) @php $array[]=$name31.", Jumlahnya ".$name32 @endphp @endisset @endisset @endif @endisset
                    @foreach($array as $e) {{ $e }} <br> @endforeach
                </td>
                <td></td>
                <td>@isset($score7) {{ $score7 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.1.3. Tugas Keluarga Sadar Hukum (Kadarkum)</td>
            </tr>
            <tr>
                <td>1. Kegiatan apa yang dilakukan oleh Kelompok Keluarga Sadar Hukum (Kadarkum) di desa/Kelurahan?</td>
                <td>@php $array=[] @endphp
                    @isset($name34) @if ($name34=="on") @php $array[]="Penyuluhan Hukum" @endphp @endif @endisset
                    @isset($name35) @if ($name35=="on") @php $array[]="Pendampingan Hukum" @endphp @endif @endisset
                    @isset($name36) @if ($name36=="on") @php $array[]="Konsultasi Hukum" @endphp @endif @endisset
                    @isset($name37) @if ($name37=="on") @php $array[]="Bantuan Hukum" @endphp @endif @endisset
                    @isset($name39) @if ($name39=="on") @isset($name38) @php $array[]=$name38 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>1. Kepala Desa/Lurah<br>2. Ketua Kelompok<br>(Laporan kegiatan)</td>
                <td>@isset($score8) {{ $score8 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.2. Tenaga Penyuluh Hukum</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.2.1. Jumlah Tenaga penyuluh hukum di desa/Kelurahan</td>
            </tr>
            <tr>
                <td>1. Selama kurun waktu 1 (satu) tahun terakhir, apakah ada Petugas Penyuluh Hukum yang telah memberikan penyuluhan hukum ke desa/Kelurahan?</td>
                <td>@isset($name40) {{ $name40 }} @endisset
                    <br>
                    @php $array=[] @endphp
                    @isset($name41) @if ($name41=="on") @php $array[]="1 orang" @endphp @endif @endisset
                    @isset($name42) @if ($name42=="on") @isset($name43) @php $array[]="Lebih dari 1 orang: ".$name43 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>1. Kepala Desa/Lurah<br>2. Ketua Kelompok<br>(Laporan kegiatan)</td>
                <td>@isset($score9) {{ $score9 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Bila ada, berasal dari instansi mana saja Petugas Penyuluh Hukum tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name45) @if ($name45=="on") @php $array[]="Kemenkumham" @endphp @endif @endisset
                    @isset($name46) @if ($name46=="on") @php $array[]="Polri" @endphp @endif @endisset
                    @isset($name47) @if ($name47=="on") @php $array[]="TNI" @endphp @endif @endisset
                    @isset($name48) @if ($name48=="on") @php $array[]="Pemda" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>1. Kepala Desa/Lurah<br>2. Ketua Kelompok<br>(Laporan kegiatan)</td>
                <td>@isset($score10) {{ $score10 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.2.2. Anggaran penyuluhan hukum di Desa/Kelurahan</td>
            </tr>
            <tr>
                <td>1. Apakah desa/kelurahan menyediakan anggaran untuk mendukung kegiatan penyuluhan hukum bagi warganya?</td>
                <td>@isset($name49) {{ $name49 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score11) {{ $score11 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.3. Paralegal</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.3.1. Keberadaan paralegal di Desa/Kelurahan</td>
            </tr>
            <tr>
                <td>1. Apakah di desa/kelurahan ada tenaga Paralegal yaitu orang yang aktif membantu menyelesaikan masalah hukum yang dihadapi masyarakat?</td>
                <td>@isset($name50) {{ $name50 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score12) {{ $score12 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.3.2. Anggaran untuk mendukung kegiatan paralegal</td>
            </tr>
            <tr>
                <td>1. Apakah desa/kelurahan menyediakan anggaran untuk mendukung penyelesaian masalah hukum yang dihadapi oleh masyarakat yang dilakukan oleh Paralegal</td>
                <td>@isset($name51) {{ $name51 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score13) {{ $score13 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Sumber dana tersebut berasal darimana dan berapa jumlahnya?</td>
                <td>@php $array=[] @endphp
                    @isset($name53) @if ($name53=="on") @isset($name52) @php $array[]="Dana desa/Kelurahan, Jumlahnya ".$name52 @endphp @endisset @endif @endisset
                    @isset($name55) @if ($name55=="on") @isset($name54) @php $array[]="Swadaya Masyarakat, Jumlahnya ".$name54 @endphp @endisset @endif @endisset
                    @isset($name57) @if ($name57=="on") @isset($name56) @php $array[]="Bantuan Pihak Ketiga, Jumlahnya ".$name56 @endphp @endisset @endif @endisset
                    @isset($name60) @if ($name60=="on") @isset($name58) @isset($name59) @php $array[]=$name58.", Jumlahnya ".$name59 @endphp @endisset @endisset @endif @endisset
                    @foreach($array as $e) {{ $e }} <br> @endforeach
                </td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score14) {{ $score14 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.4. Media informasi hukum lainnya</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.4.1. Taman bacaan/perpustakaan</td>
            </tr>
            <tr>
                <td>1. Apakah di Desa/Kelurahan tersedia sarana taman bacaan atau perpustakaan?</td>
                <td>@isset($name61) {{ $name61 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score15) {{ $score15 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Jika ada, apakah ada buku-buku terkait pengetahuan hukum? Berapa jumlahnya?</td>
                <td>@isset($name62) {{ $name62 }} @endisset
                    <br>
                    @isset($name63) {{ $name63 }} @endisset
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score16) {{ $score16 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.4.2. Ruang konsultasi hukum</td>
            </tr>
            <tr>
                <td>1. Apakah di Desa/Kelurahan tersedia ruangan atau tempat yang digunakan oleh masyarakat untuk melakukan konsultasi hukum dengan para Penyuluh Hukum/ Paralegal?</td>
                <td>@isset($name65) {{ $name65 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score17) {{ $score17 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Dimanakah tempatnya?</td>
                <td>@php $array=[] @endphp
                    @isset($name66) @if ($name66=="on") @php $array[]="Balai Desa/Kelurahan" @endphp @endif @endisset
                    @isset($name67) @if ($name67=="on") @php $array[]="Rumah Kepala Desa/Lurah" @endphp @endif @endisset
                    @isset($name69) @if ($name69=="on") @isset($name68) @php $array[]=$name68 @endphp @endisset @endif @endisset
                    @foreach($array as $e) {{ $e }} <br> @endforeach
                </td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score18) {{ $score18 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.4.3. Media cetak dan elektronik atau media lainnya yang berisi informasi hukum</td>
            </tr>
            <tr>
                <td>1. Darimana umumnya masyarakat Desa/Kelurahan memperoleh informasi tentang masalah hukum?</td>
                <td>@php $array=[] @endphp
                    @isset($name70) @if ($name70=="on") @php $array[]="Radio" @endphp @endif @endisset
                    @isset($name71) @if ($name71=="on") @php $array[]="Televisi" @endphp @endif @endisset
                    @isset($name72) @if ($name72=="on") @php $array[]="Koran" @endphp @endif @endisset
                    @isset($name73) @if ($name73=="on") @php $array[]="Majalah" @endphp @endif @endisset
                    @isset($name74) @if ($name74=="on") @php $array[]="Selebaran" @endphp @endif @endisset
                    @isset($name75) @if ($name75=="on") @php $array[]="Internet" @endphp @endif @endisset
                    @isset($name77) @if ($name77=="on") @isset($name76) @php $array[]=$name76 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score19) {{ $score19 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.5. Program peningkatan kesadaran hukum masyarakat desa/kelurahan</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">1.5.1. Kegiatan peningkatan kesadaran hukum di sekolah</td>
            </tr>
            <tr>
                <td>1. Berapa jumlah anak usia sekolah (7 Tahun s/d 18 Tahun) di Desa/Kelurahan?</td>
                <td>@isset($name79) @if ($name79=="on") @isset($name78) {{ $name78 }} orang @endisset @endif @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score20) {{ $score20 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Apakah semua anak usia sekolah (7 Tahun s/d 18 Tahun) di desa/kelurahan telah mendapatkan pendidikan atau bersekolah baik tingkat SD, SMP maupun SLTA?</td>
                <td>@isset($name80) {{ $name80 }} @endisset</td>
                <td>Dinas Pendidikan Kecamatan</td>
                <td>@isset($score21) {{ $score21 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Apakah di sekolah ada kegiatan penyuluhan hukum? Jika ada siapa yang melakukan kegiatan tersebut?</td>
                <td>@isset($name81) {{ $name81 }} @endisset
                    <br>
                    @php $array=[] @endphp
                    @isset($name82) @if ($name82=="on") @php $array[]="Guru" @endphp @endif @endisset
                    @isset($name83) @if ($name83=="on") @php $array[]="Penyuluh Hukum" @endphp @endif @endisset
                    @isset($name84) @if ($name84=="on") @php $array[]="Polisi" @endphp @endif @endisset
                    @isset($name86) @if ($name86=="on") @isset($name85) @php $array[]=$name85 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                </td>
                <td>Dinas Pendidikan Kecamatan</td>
                <td>@isset($score22) {{ $score22 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2. Implementasi Hukum</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.1. Kewajiban Membayar PBB</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.1.1. Jumlah Wajib pajak yang memiliki Nomor Pokok Wajib Pajak (NPWP)</td>
            </tr>
            <tr>
                <td>1. Berapa jumlah penduduk Desa/Kelurahan?</td>
                <td>@isset($name88) @if ($name88=="on") @isset($name87) {{ $name87 }} orang @endisset @endif @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score23) {{ $score23 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Berapa jumlah warga desa/kelurahan yang sudah memiliki Nomor Pokok Wajib Pajak (NPWP)?</td>
                <td>@isset($name90) @if ($name90=="on") @isset($name89) {{ $name89 }} orang @endisset @endif @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score24) {{ $score24 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.1.2 Persentase pelunasan Pembayaran PBB</td>
            </tr>
            <tr>
                <td>1. Berapa persen jumlah warga desa/kelurahan yang telah melunasi kewajiban membayar pajak bumi dan pembangunan (PBB) dalam tahun ini?</td>
                <td>@isset($name91) {{ $name91 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score25) {{ $score25 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.2. Perkawinan di Bawa Umur</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.2.1. Pelaksanaan Perkawinan</td>
            </tr>
            <tr>
                <td>1. Apakah ada warga desa/kelurahan (perempuan) yang telah menikah namun belum berumur 16 Tahun?</td>
                <td>@isset($name92) {{ $name92 }} @endisset</td>
                <td>Kepala KUA<br>Kepala Desa/Lurah</td>
                <td>@isset($score26) {{ $score26 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Apakah ada warga desa/kelurahan (laki-laki) yang telah menikah namun belum berumur 18 Tahun?</td>
                <td>@isset($name93) {{ $name93 }} @endisset</td>
                <td>Kepala KUA<br>Kepala Desa/Lurah</td>
                <td>@isset($score27) {{ $score27 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.2.2. Pencatatan Perkawinan</td>
            </tr>
            <tr>
                <td>1. Apakah ada warga desa/kelurahan (perempuan) yang belum berumur 16 Tahun dicatat di KUA atau Catatan Sipil?</td>
                <td>@isset($name94) {{ $name94 }} @endisset</td>
                <td>Kepala KUA<br>Kepala Desa/Lurah</td>
                <td>@isset($score28) {{ $score28 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Apakah ada warga desa/kelurahan (laki-laki) yang belum berumur 18 Tahun dicatat di KUA atau Catatan Sipil?</td>
                <td>@isset($name95) {{ $name95 }} @endisset</td>
                <td>Kepala KUA<br>Kepala Desa/Lurah</td>
                <td>@isset($score29) {{ $score29 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.3. Kasus Narkoba</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.3.1. Penyalahgunaan Narkoba</td>
            </tr>
            <tr>
                <td>1. Dalam periode 1 (satu) tahun terakhir apakah di desa/ Kelurahan ada kasus penyalahgunaan Narkoba?</td>
                <td>@isset($name96) {{ $name96 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score30) {{ $score30 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Siapakah pelaku kasus penyalahgunaan narkoba tersebut?</td>
                <td>@isset($name97) {{ $name97 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score31) {{ $score31 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Jika pelakunya adalah warga desa apa bentuk tindakan penyalagunaan narkoba yang dilakukan oleh warga desa/ kelurahan tersebut</td>
                <td>@php $array=[] @endphp
                    @isset($name98) @if ($name98=="on") @php $array[]="Sebagai Pengguna" @endphp @endif @endisset
                    @isset($name99) @if ($name99=="on") @php $array[]="Sebagai Pengedar" @endphp @endif @endisset
                    @isset($name100) @if ($name100=="on") @php $array[]="Sebagai Bandar" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score32) {{ $score32 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.3.2. Upaya pencegahan penyalahgunaan narkoba oleh Masyarakat</td>
            </tr>
            <tr>
                <td>1. Apakah warga desa/kelurahan memberikan laporan/informasi adanya kasus penyalahgunaan narkoba kepada aparat desa/kelurahan atau pihak kepolisian?</td>
                <td>@isset($name101) {{ $name101 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score33) {{ $score33 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Apakah pelaku kasus penyalahgunaan narkoba itu telah diberikan sanksi atau hukuman?</td>
                <td>@isset($name102) {{ $name102 }} @endisset
                    <br>
                    @php $array=[] @endphp
                    @isset($name103) @if ($name103=="on") @php $array[]="Direhabilitasi" @endphp @endif @endisset
                    @isset($name104) @if ($name104=="on") @php $array[]="Ditahan/penjara" @endphp @endif @endisset
                    @isset($name106) @if ($name106=="on") @isset($name105) @php $array[]=$name105 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score34) {{ $score34 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Bagaimana sikap warga desa/kelurahan dan aparat desa/kelurahan terhadap warga yang pernah terlibat kasus penyalahgunaan narkoba?</td>
                <td>@isset($name107) {{ $name107 }} @endisset
                    <br>
                    @php $array=[] @endphp
                    @isset($name108) @if ($name108=="on") @php $array[]="Mengucilkan" @endphp @endif @endisset
                    @isset($name109) @if ($name109=="on") @php $array[]="Menerima kembali" @endphp @endif @endisset
                    @isset($name111) @if ($name111=="on") @isset($name110) @php $array[]=$name110 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score35) {{ $score35 }} @endisset</td>
            </tr>
            <tr>
                <td>4. Apakah di desa/kelurahan telah dibentuk relawan anti narkoba oleh BNN Kabupaten/Kota atau instansi lainnya sebagai upaya pencegahan peredaran narkoba?</td>
                <td>@isset($name112) {{ $name112 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Ka BNN Kabupaten/Kota</td>
                <td>@isset($score36) {{ $score36 }} @endisset</td>
            </tr>
            <tr>
                <td>5. Bila ada, apa saja bentuk kegiatan yang dilakukan oleh relawan anti narkoba tersebut?</td>
                <td>@isset($name113) {{ $name113 }} @endisset
                    @php $array=[] @endphp
                    @isset($name114) @if ($name114=="on") @php $array[]="Sosialisasi" @endphp @endif @endisset
                    @isset($name115) @if ($name115=="on") @php $array[]="Pendampingan Terhadap Pelaku/Korban" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td></td>
                <td>@isset($score37) {{ $score37 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.4. Kasus Perdagangan orang</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.4.1. Pencegahan dan Penanggulangan Perdagangan orang di desa/kelurahan</td>
            </tr>
            <tr>
                <td>1. Apakah di desa/kelurahan pernah terjadi kasus pengiriman tenaga kerja ke luar daerah/negeri yang selanjutnya diperjualbelikan atau dipekerjakan dalam kurun waktu 1 (satu) tahun terakhir?</td>
                <td>@isset($name116) {{ $name116 }} @endisset
                    <br>
                    @php $array=[] @endphp
                    @isset($name117) @if ($name117=="on") @php $array[]="Mengucilkan" @endphp @endif @endisset
                    @isset($name118) @if ($name118=="on") @php $array[]="Menerima kembali" @endphp @endif @endisset
                    @isset($name120) @if ($name120=="on") @isset($name119) @php $array[]=$name119 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score38) {{ $score38 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Kalau ada berapa orang korbannya?</td>
                <td>@isset($name121) {{ $name121 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score39) {{ $score39 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Berapa usia korban dan apa jenis kelamin mereka?</td>
                <td>@php $array=[] @endphp
                    @isset($name122) @if ($name122=="on") @php $array[]="Anak-anak perempuan" @endphp @endif @endisset
                    @isset($name123) @if ($name123=="on") @php $array[]="Anak-anak laki-laki" @endphp @endif @endisset
                    @isset($name124) @if ($name124=="on") @php $array[]="Perempuan dewasa" @endphp @endif @endisset
                    @isset($name125) @if ($name125=="on") @php $array[]="Laki-laki dewasa" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score40) {{ $score40 }} @endisset</td>
            </tr>
            <tr>
                <td>4. Apakah dalam kasus tersebut pelakunya adalah warga desa/kelurahan sendiri</td>
                <td>@isset($name126) {{ $name126 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score41) {{ $score41 }} @endisset</td>
            </tr>
            <tr>
                <td>5. Terhadap pelakunya apakah sudah diproses secara hukum?</td>
                <td>@isset($name127) {{ $name127 }} @endisset
                    <br>
                    @php $array=[] @endphp
                    @isset($name128) @if ($name128=="on") @php $array[]="Tidak ditahan" @endphp @endif @endisset
                    @isset($name129) @if ($name129=="on") @php $array[]="Ditahan/penjara" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score42) {{ $score42 }} @endisset</td>
            </tr>
            <tr>
                <td>6. Upaya apa saja yang telah dilakukan aparat/warga desa/kelurahan dalam menanggulangi masalah perdagangan orang di desa/keluraan</td>
                <td>@php $array=[] @endphp
                    @isset($name130) @if ($name130=="on") @php $array[]="Tidak ditahan" @endphp @endif @endisset
                    @isset($name131) @if ($name131=="on") @php $array[]="Ditahan/penjara" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Tokoh Agama/Tokoh Masyarakat</td>
                <td>@isset($score43) {{ $score43 }} @endisset</td>
            </tr>
            <tr>
                <td>7. Apakah kegiatan-kegiatan tersebut di atas disediakan anggarannya?</td>
                <td>@isset($name132) {{ $name132 }} @endisset</td>
                <td></td>
                <td>@isset($score44) {{ $score44 }} @endisset</td>
            </tr>
            <tr>
                <td>8. Sumber dananya berasal darimana?</td>
                <td>@php $array=[] @endphp
                    @isset($name133) @if ($name133=="on") @php $array[]="Dana desa/kelurahan" @endphp @endif @endisset
                    @isset($name134) @if ($name134=="on") @php $array[]="Swadaya masyarakat" @endphp @endif @endisset
                    @isset($name135) @if ($name135=="on") @php $array[]="Bantuan pihak ketiga" @endphp @endif @endisset
                    @isset($name137) @if ($name137=="on") @isset($name136) @php $array[]=$name136 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td></td>
                <td>@isset($score45) {{ $score45 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.5. Perlindungan Anak</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.5.1. Kasus kekerasan terhadap anak</td>
            </tr>
            <tr>
                <td>1. Apakah di desa/kelurahan pernah ada kasus kekerasan terhadap anak selama kurun waktu 1 (satu) tahun terakhir</td>
                <td>@isset($name138) {{ $name138 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score46) {{ $score46 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Bila ada, siapa pelaku kekerasan terhadap anak tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name139) @if ($name139=="on") @php $array[]="Orang tua kandung" @endphp @endif @endisset
                    @isset($name140) @if ($name140=="on") @php $array[]="Orang tua tiri" @endphp @endif @endisset
                    @isset($name141) @if ($name141=="on") @php $array[]="Saudara kandung" @endphp @endif @endisset
                    @isset($name142) @if ($name142=="on") @php $array[]="Saudara tiri" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score47) {{ $score47 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Apakah kasus kekerasan terhadap anak tersebut dilaporkan ke aparat desa/kelurahan atau polisi?</td>
                <td>@isset($name143) {{ $name143 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score48) {{ $score48 }} @endisset</td>
            </tr>
            <tr>
                <td>4. Apa alasan aparat desa/kelurahan atau warga masyarakat tidak melaporkan kasus kekerasan terhadap anak tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name144) @if ($name144=="on") @php $array[]="Aib keluarga" @endphp @endif @endisset
                    @isset($name145) @if ($name145=="on") @php $array[]="Tidak tahu prosedur" @endphp @endif @endisset
                    @isset($name146) @if ($name146=="on") @php $array[]="Takut kepada pelaku" @endphp @endif @endisset
                    @isset($name147) @if ($name147=="on") @php $array[]="Tidak peduli" @endphp @endif @endisset
                    @isset($name149) @if ($name149=="on") @isset($name148) @php $array[]=$name148 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score49) {{ $score49 }} @endisset</td>
            </tr>
            <tr>
                <td>5. Pada kasus yang dilaporkan, apakah pelaku kasus kekerasan tersebut telah diproses secara hukum?</td>
                <td>@isset($name150) {{ $name150 }} @endisset<br>
                    @php $array=[] @endphp
                    @isset($name151) @if ($name151=="on") @php $array[]="Tidak ditahan" @endphp @endif @endisset
                    @isset($name152) @if ($name152=="on") @php $array[]="Ditahan/penjara" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score50) {{ $score50 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.5.2. Upaya penanggulangan kasus kekerasan terhadap anak sebagai pelaku/korban</td>
            </tr>
            <tr>
                <td>1. Upaya apa yang dilakukan aparat desa/kelurahan dan warga dalam menanggulangi kasus kekerasan terhadap anak?</td>
                <td>@php $array=[] @endphp
                    @isset($name153) @if ($name153=="on") @php $array[]="Membentuk kelompok anti kekerasan terhadap anak" @endphp @endif @endisset
                    @isset($name154) @if ($name154=="on") @php $array[]="Melakukan kegiatan penyuluhan hukum" @endphp @endif @endisset
                    @isset($name155) @if ($name155=="on") @php $array[]="Membangun posyandu" @endphp @endif @endisset
                    @isset($name157) @if ($name157=="on") @isset($name156) @php $array[]=$name156 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score51) {{ $score51 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Apakah desa/kelurahan menyediakan anggaran untuk mencegah teradinya kekerasan terhadap anak?</td>
                <td>@isset($name158) {{ $name158 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score52) {{ $score52 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Sumber dananya berasal dari mana?</td>
                <td>@php $array=[] @endphp
                    @isset($name159) @if ($name159=="on") @php $array[]="Dana desa/kelurahan" @endphp @endif @endisset
                    @isset($name160) @if ($name160=="on") @php $array[]="Swadaya masyarakat" @endphp @endif @endisset
                    @isset($name161) @if ($name161=="on") @php $array[]="Bantuan pihak ketiga" @endphp @endif @endisset
                    @isset($name163) @if ($name163=="on") @isset($name162) @php $array[]=$name162 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score53) {{ $score53 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.6. Mewujudkan Keamanan dan Ketertiban Masyarakat (Kamtibnas)</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.6.1. Kasus-kasus Kriminalitas yang terjadi di desa/kelurahan antara kurun waktu 1 (satu) tahun terakhir</td>
            </tr>
            <tr>
                <td>1. Apakah dalam kurun waktu 1 (satu) tahun terakhir di desa/kelurahan ini ada kasus-kasus kriminalitas antara lain; pencurian, pembunuhan, perampokan, perkosaan, penipuan, penggelapan dan korupsi?</td>
                <td>@isset($name164) {{ $name164 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score54) {{ $score54 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Kasus tindak kriminalitas apa yang paling banyak terjadi?</td>
                <td>@php $array=[] @endphp
                    @isset($name166) @if ($name166=="on") @isset($name165) @php $array[]="Pencurian ".$name165." kali" @endphp @endisset @endif @endisset
                    @isset($name168) @if ($name168=="on") @isset($name167) @php $array[]="Pembunuhan ".$name167." kali" @endphp @endisset @endif @endisset
                    @isset($name170) @if ($name170=="on") @isset($name169) @php $array[]="Perampokan ".$name169." kali" @endphp @endisset @endif @endisset
                    @isset($name172) @if ($name172=="on") @isset($name171) @php $array[]="Perkosaan ".$name171." kali" @endphp @endisset @endif @endisset
                    @isset($name174) @if ($name174=="on") @isset($name173) @php $array[]="Penipian ".$name173." kali" @endphp @endisset @endif @endisset
                    @isset($name176) @if ($name176=="on") @isset($name175) @php $array[]="Penggelapan ".$name175." kali" @endphp @endisset @endif @endisset
                    @isset($name178) @if ($name178=="on") @isset($name177) @php $array[]="Korupsi ".$name177." kali" @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td></td>
                <td>@isset($score55) {{ $score55 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Siapa pelaku dan korbannya?</td>
                <td>@php $array=[] @endphp
                    @isset($name179) @if ($name179=="on") @php $array[]="Pelakunya warga desa/kelurahan" @endphp @endif @endisset
                    @isset($name180) @if ($name180=="on") @php $array[]="Pelakunya bukan warga desa/kelurahan" @endphp @endif @endisset
                    @isset($name181) @if ($name181=="on") @php $array[]="Korbannya warga desa/kelurahan" @endphp @endif @endisset
                    @isset($name182) @if ($name182=="on") @php $array[]="Korbannya bukan warga desa/kelurahan" @endphp @endif @endisset
                    @isset($name184) @if ($name184=="on") @isset($name183) @php $array[]=$name183 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score56) {{ $score56 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.6.2. Proses Hukum terhadap para pelaku tindak kriminalitas</td>
            </tr>
            <tr>
                <td>1. Apakah pelaku kasus-kasus di atas telah diproses secara hukum oleh pihak berwajib (Polisi)?</td>
                <td>@isset($name185) {{ $name185 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score57) {{ $score57 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.6.3. Upaya menekan angka kriminalitas di desa/kelurahan</td>
            </tr>
            <tr>
                <td>1. Kegiatan apa saja yang dilakukan/kelurahan dan aparat desa/kelurahan dalam mendukung terwujudnya Keamanan dan Ketertiban Masyarakat dan menekan angka kriminalitas di desa/kelurahan</td>
                <td>@php $array=[] @endphp
                    @isset($name186) @if ($name186=="on") @php $array[]="Siskamling/Ronda" @endphp @endif @endisset
                    @isset($name187) @if ($name187=="on") @php $array[]="Membentuk Kelompok Sadar Kamtibnas" @endphp @endif @endisset
                    @isset($name189) @if ($name189=="on") @isset($name188) @php $array[]=$name188 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Wawancara Tokoh Masyarakat/Agama</td>
                <td>@isset($score58) {{ $score58 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Berapa kali dalam 1 tahun aparat kepolisian melakukan pembinaan kepada warga atau aparat desa/kelurahan terkait upaya mencegah terjadinya tindakan kriminalitas?</td>
                <td>@isset($name190) {{ $name190 }} @endisset</td>
                <td>Buku kunjungan di buku tamu kantor desa/kelurahan/polisi<br>Wawancara Tokoh Masyarakat/Agama</td>
                <td>@isset($score59) {{ $score59 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Apakah ada wadah kerja-sama perangkat desa/kelurahan dengan kepolisian dalam mewujudkan ketertiban masyarakat?</td>
                <td>@isset($name191) {{ $name191 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>Wawancara Tokoh Masyarakat/Agama</td>
                <td>@isset($score60) {{ $score60 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.7. Kekerasan Dalam Rumah Tangga</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.7.1. Kasus kekerasan Dalam Rumah Tangga</td>
            </tr>
            <tr>
                <td>1. Apakah selama kurun waktu 1 (satu) tahun terakhir ini ada kasus kekerasan dalam rumah tangga di desa/kelurahan ini?</td>
                <td>@isset($name192) {{ $name192 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>B2TP2</td>
                <td>@isset($score61) {{ $score61 }} @endisset</td>
            </tr>
            <tr>
                <td>2.a. Bila pernah ada, siapa pelaku kekerasan dalam rumah tangga tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name193) @if ($name193=="on") @php $array[]="Suami" @endphp @endif @endisset
                    @isset($name194) @if ($name194=="on") @php $array[]="Isteri" @endphp @endif @endisset
                    @isset($name195) @if ($name195=="on") @php $array[]="Orang tua" @endphp @endif @endisset
                    @isset($name196) @if ($name196=="on") @php $array[]="Anak" @endphp @endif @endisset
                    @isset($name198) @if ($name198=="on") @isset($name197) @php $array[]=$name197 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek<br>B2TP2</td>
                <td>@isset($score62) {{ $score62 }} @endisset</td>
            </tr>
            <tr>
                <td>2.b. Bila pernah ada, siapa korban kekerasan dalam rumah tangga tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name199) @if ($name199=="on") @php $array[]="Suami" @endphp @endif @endisset
                    @isset($name200) @if ($name200=="on") @php $array[]="Isteri" @endphp @endif @endisset
                    @isset($name201) @if ($name201=="on") @php $array[]="Orang tua" @endphp @endif @endisset
                    @isset($name202) @if ($name202=="on") @php $array[]="Anak" @endphp @endif @endisset
                    @isset($name204) @if ($name204=="on") @isset($name203) @php $array[]=$name203 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score63) {{ $score63 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Apakah kasus kekerasan dalam rumah tangga tersebut dilaporkan ke aparat desa/kelurahan atau polisi?</td>
                <td>@isset($name205) {{ $name205 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score64) {{ $score64 }} @endisset</td>
            </tr>
            <tr>
                <td>4. Apa alasan warga masyarakat atau aparat desa/kelurahan tidak melaporkan kasus kekerasan dalam rumah tersebut?</td>
                <td>@php $array=[] @endphp
                    @isset($name206) @if ($name206=="on") @php $array[]="Aib keluarga" @endphp @endif @endisset
                    @isset($name207) @if ($name207=="on") @php $array[]="Tidak tahu prosedur" @endphp @endif @endisset
                    @isset($name208) @if ($name208=="on") @php $array[]="Takut kepada pelaku" @endphp @endif @endisset
                    @isset($name209) @if ($name209=="on") @php $array[]="Tidak peduli" @endphp @endif @endisset
                    @isset($name211) @if ($name211=="on") @isset($name210) @php $array[]=$name210 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score65) {{ $score65 }} @endisset</td>
            </tr>
            <tr>
                <td>5. Terhadap kasus yang dilaporkan, apakah pelakunya telah diproses secara hukum?</td>
                <td>@isset($name212) {{ $name212 }} @endisset <br>
                    @php $array=[] @endphp
                    @isset($name213) @if ($name213=="on") @php $array[]="Tidak ditahan" @endphp @endif @endisset
                    @isset($name214) @if ($name214=="on") @php $array[]="Ditahan/penjara" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score66) {{ $score66 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.7.2. Upaya Pencegahan Dalam Rumah Tangga</td>
            </tr>
            <tr>
                <td>1. Upaya apa yang dilakukan warga masyarakat dan aparat desa/kelurahan dalam mencegah terjadinya kasus kekerasan dalam rumah tangga?</td>
                <td>@php $array=[] @endphp
                    @isset($name215) @if ($name215=="on") @php $array[]="Membentuk Kelompok Anti Kekerasan" @endphp @endif @endisset
                    @isset($name216) @if ($name216=="on") @php $array[]="Melakukan Penyuluhan Hukum" @endphp @endif @endisset
                    @isset($name218) @if ($name218=="on") @isset($name217) @php $array[]=$name217 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Ka. Polsek</td>
                <td>@isset($score67) {{ $score67 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.8. Pengelolaan Lingkungan Hidup</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">2.8.1. Upaya pengelolaan lingkungan hidup</td>
            </tr>
            <tr>
                <td>1. Apakah masalah pengelolaan lingkungan hidup telah diatur melalui Peraturan Desa/Kelurahan?</td>
                <td>@isset($name219) {{ $name219 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score68) {{ $score68 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Upaya atau langkah apa saja yang dilakukan warga Desa/Kelurahan dan aparat desa dalam rangka menjaga lingkungan hidup?</td>
                <td>@php $array=[] @endphp
                    @isset($name220) @if ($name220=="on") @php $array[]="Membentuk Kelompok Pelestari Lingkungan Hidup" @endphp @endif @endisset
                    @isset($name221) @if ($name221=="on") @php $array[]="Melakukan kegiatan Penyuluhan Hukum" @endphp @endif @endisset
                    @isset($name223) @if ($name223=="on") @isset($name222) @php $array[]=$name222 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score69) {{ $score69 }} @endisset</td>
            </tr>
            <tr>
                <td>3. Apakah desa/kelurahan menyediakan anggaran untuk menjaga lingkungan hidup?</td>
                <td>@isset($name224) {{ $name224 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score70) {{ $score70 }} @endisset</td>
            </tr>
            <tr>
                <td>4. Apakah di desa/kelurahan ada kegiatan gotong royong terkait kebersihan lingkungan yang dilakukan secara rutin? Berapa kali dilaksanakan dalam 1 tahun?</td>
                <td>@isset($name225) {{ $name225 }} @endisset<br>
                    @php $array=[] @endphp
                    @isset($name226) @if ($name226=="on") @php $array[]="1 kali s/d 5 kali" @endphp @endif @endisset
                    @isset($name227) @if ($name227=="on") @php $array[]="5 kali s/d 10 kali" @endphp @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score71) {{ $score71 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3. Akses Keadilan</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.1. Ketersediaan lembaga penyelesaian sengketa di luar proses hukum di desa/kelurahan</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.1.1. Lembaga adat untuk penyelesaian masalah hukum di desa/kelurahan</td>
            </tr>
            <tr>
                <td>1. Apakah ada lembaga adat atau pemuka masyarakat yang berperan menyelesaikan sengketa antar warga masyarakat di desa/kelurahan di luar pihak berwajib (polisi)?</td>
                <td>@isset($name228) {{ $name228 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score72) {{ $score72 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.2. Ketersediaan mekanisme penyelesaian sengketa di luar proses hukum di desa/kelurahan</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.2.1. Mediator yang memiliki peran dalam menyelesaikan sengketa</td>
            </tr>
            <tr>
                <td>Siapakah yang biasanya bertindak sebagai penengah atau mediator untuk menyelesaikan sengketa yang terjadi antar warga di lingkungan desa/kelurahan?</td>
                <td>@php $array=[] @endphp
                    @isset($name229) @if ($name229=="on") @php $array[]="Tokoh adat" @endphp @endif @endisset
                    @isset($name230) @if ($name230=="on") @php $array[]="Tokoh agama" @endphp @endif @endisset
                    @isset($name231) @if ($name231=="on") @php $array[]="Tokoh masyarakat" @endphp @endif @endisset
                    @isset($name232) @if ($name232=="on") @php $array[]="Kepala desa" @endphp @endif @endisset
                    @isset($name234) @if ($name234=="on") @isset($name233) @php $array[]=$name233 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score73) {{ $score73 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.3. Peran masyarakat dalam memanfaatkan kketersediaan lembaga /tokoh/mekanisme penyelesaian sengketa di luar proses hukum di desa/kelurahan</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.3.1. Jenis kasus yang paling banyak diselesaikan melalui penyelesaian sengketa di luar proses hukum di tingkat desa/kelurahan</td>
            </tr>
            <tr>
                <td>1. Jenis kasus apa yang paling banyak diselesaikan oleh tokoh-tokoh tersebut di luar proses hukum?</td>
                <td>@php $array=[] @endphp
                    @isset($name235) @if ($name235=="on") @php $array[]="Kasus Rumah Tangga" @endphp @endif @endisset
                    @isset($name236) @if ($name236=="on") @php $array[]="Perceraian" @endphp @endif @endisset
                    @isset($name237) @if ($name237=="on") @php $array[]="Pencurian" @endphp @endif @endisset
                    @isset($name238) @if ($name238=="on") @php $array[]="Penipuan" @endphp @endif @endisset
                    @isset($name240) @if ($name240=="on") @isset($name239) @php $array[]=$name239 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score74) {{ $score74 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.3.2. Jumlah kasus yang diselesaikan melalui mekanisme penyelesaian sengketa di luar proses hukum</td>
            </tr>
            <tr>
                <td>1. Apakah kasus yang diselesaikan melalui mekanisme di luar proses hukum di desa/kelurahan dapat diterima oleh masyarakat?</td>
                <td>@isset($name241) {{ $name241 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score75) {{ $score75 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.3.3. Kepuasan masyarakat mengenai hasil penyelesaian sengketa di luar proses hukum</td>
            </tr>
            <tr>
                <td>1. Apakah masyarakat puas akan hasil penyelesaian sengke di luar proses hukum?</td>
                <td>@isset($name242) {{ $name242 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score76) {{ $score76 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.4. Layanan Bantuan Hukum di desa/kelurahan</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.4.1. Informasi Program Bantuan Hukum di desa/kelurahan</td>
            </tr>
            <tr>
                <td>1. Apakah masyarakat dan aparat desa/kelurahan telah mengetahui adanya Program Bantuan Hukum secara gratis bagi orang miskin dari pemerintah?</td>
                <td>@isset($name243) {{ $name243 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score77) {{ $score77 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.4.2. Peran aktif forum koordinasi aparan penegak hukum</td>
            </tr>
            <tr>
                <td>1. Apakah ada wadah atau forum koordinasi antara aparat desa/kelurahan dengan kepolisisan, kejaksaan dalam rangka mendukung pelaksanaan bantuan hukum?</td>
                <td>@isset($name244) {{ $name244 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score78) {{ $score78 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.4.3. Pelaksanaan Bantuan Hukum di desa/kelurahan</td>
            </tr>
            <tr>
                <td>1. Dalam kurun waktu 1 (satu) tahun terakhir, apakah ada kasus hukum yang dihadapi masyarakat miskin di desa/kelurahan dan telah memperoleh bantuan hukum melalui Program Bantuan Hukum secara gratis?</td>
                <td>@isset($name245) {{ $name245 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat<br>Ka. Polsek</td>
                <td>@isset($score79) {{ $score79 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">3.4.4. Ketersediaan dana desa/kelurahan untuk peningkatan kapasitas bantuan hukum</td>
            </tr>
            <tr>
                <td>1. Apakah desa/kelurahan menyediakan anggaran untuk peningkatan pelaksanaan bantuan hukum kepada warga desa?</td>
                <td>@isset($name246) {{ $name246 }} @endisset</td>
                <td>Kepala Desa/Lurah</td>
                <td>@isset($score80) {{ $score80 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4. Akses Demokrasi dan Regulasi</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4.1. Peraturan desa sebagai pelaksanaan UU Desa</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4.1.1. Ketersediaan Peraturan Desa sebagai pelaksanaan Undang-Undang Desa</td>
            </tr>
            <tr>
                <td>1. Berapa jumlah Peraturan Desa yang telah dibuat sebagai pelaksanaan UU Desa?</td>
                <td>@isset($name247) {{ $name247 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score81) {{ $score81 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4.1.2. Materi Perdes sebagai Pelaksanaan UU Desa</td>
            </tr>
            <tr>
                <td>2. Peraturan Desa tentang apa saja yang telah dibuat? Sebutkan perdes tersebut</td>
                <td>@isset($name250) @if ($name250=="on") @isset($name249) {{ $name249 }} @endisset @endif @endisset<br>
                    @isset($name252) @if ($name252=="on") @isset($name251) {{ $name251 }} @endisset @endif @endisset<br>
                    @isset($name254) @if ($name254=="on") @isset($name253) {{ $name253 }} @endisset @endif @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score82) {{ $score82 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4.2. Partisipasi Masyarakat dalam Pembuatan Peraturan Desa</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4.2.1. Peran masyarakat dalam pembuatan Perdes</td>
            </tr>
            <tr>
                <td>1. Apakah masyarakat dilibatkan dalam pembuatan Peraturan Desa?</td>
                <td>@isset($name255) {{ $name255 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score83) {{ $score83 }} @endisset</td>
            </tr>
            <tr style="background: #eee">
                <td colspan="4">4.2.2. Inisiatif Pembuatan Peraturan Desa</td>
            </tr>
            <tr>
                <td>1. Siapakah yang mengusulkan untuk dibuat Peraturan Desa</td>
                <td>@php $array=[] @endphp
                    @isset($name256) @if ($name256=="on") @php $array[]="Aparat Desa" @endphp @endif @endisset
                    @isset($name257) @if ($name257=="on") @php $array[]="Tokoh Masyarakat" @endphp @endif @endisset
                    @isset($name258) @if ($name258=="on") @php $array[]="Tokoh Adat/Agama" @endphp @endif @endisset
                    @isset($name259) @if ($name259=="on") @php $array[]="Masyarakat Umum" @endphp @endif @endisset
                    @isset($name261) @if ($name261=="on") @isset($name260) @php $array[]=$name260 @endphp @endisset @endif @endisset
                    {{ implode(", ", $array) }}
                </td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score84) {{ $score84 }} @endisset</td>
            </tr>
            <tr>
                <td>2. Apakah setiap Peraturan Desa yang telah dibentuk diinformasikan atau disosialisasikan ke seluruh warga desa/keluraha</td>
                <td>@isset($name262) {{ $name262 }} @endisset</td>
                <td>Kepala Desa/Lurah<br>Tokoh masyarakat</td>
                <td>@isset($score85) {{ $score85 }} @endisset</td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<!-- <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script> -->
<!-- <script src="/html2canvas/html2canvas.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
<!-- <script src="/jspdf/jspdf.umd.min.js"></script> -->
<script type="text/javascript">
    function printPDF() {
        var divContents = $("#pdf").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><style>body {margin: 0; font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";} table, th, td {border: 1px solid #777; border-collapse: collapse; padding: 5px 10px;} th {text-align: left; font-size: 1rem; font-weight: 400;}</style></head><body>');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>
@endsection