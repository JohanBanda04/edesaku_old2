<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['username' => 'developer', 'password' => Hash::make('iQ_FFhExT'), 'role_id' => '1'],
            ['username' => 'admin1', 'password' => Hash::make('edesaku2022'), 'role_id' => '2'],
            ['username' => 'admin2', 'password' => Hash::make('sasambo2022'), 'role_id' => '2'],
            ['username' => 'admin3', 'password' => Hash::make('sadarhukum'), 'role_id' => '2'],
            ['username' => 'admin4', 'password' => Hash::make('pengurus'), 'role_id' => '2'],
            ['username' => 'admin5', 'password' => Hash::make('kemenkumham'), 'role_id' => '2'],
            ['username' => 'admin6', 'password' => Hash::make('menjangan'), 'role_id' => '2'],
            ['username' => 'admin7', 'password' => Hash::make('nusatenggara'), 'role_id' => '2'],
            ['username' => 'admin8', 'password' => Hash::make('pancasila'), 'role_id' => '2'],
            ['username' => 'admin9', 'password' => Hash::make('17081945'), 'role_id' => '2'],

            ['username' => 'pejanggik', 'password'=> Hash::make('373666'), 'role_id' => '3'],
            ['username' => 'banjar', 'password'=> Hash::make('295334'), 'role_id' => '3'],
            ['username' => 'tanjung_karang_permai', 'password'=> Hash::make('464047'), 'role_id' => '3'],
            ['username' => 'monjok', 'password'=> Hash::make('840647'), 'role_id' => '3'],
            ['username' => 'cakranegara_timur', 'password'=> Hash::make('737444'), 'role_id' => '3'],
            ['username' => 'selagalas', 'password'=> Hash::make('852063'), 'role_id' => '3'],
            ['username' => 'jembatan_kembar', 'password'=> Hash::make('227715'), 'role_id' => '3'],
            ['username' => 'lembar_selatan', 'password'=> Hash::make('942816'), 'role_id' => '3'],
            ['username' => 'lembar_utara', 'password'=> Hash::make('325265'), 'role_id' => '3'],
            ['username' => 'tanak_berak', 'password'=> Hash::make('950112'), 'role_id' => '3'],
            ['username' => 'krama_jaya', 'password'=> Hash::make('581114'), 'role_id' => '3'],
            ['username' => 'golong', 'password'=> Hash::make('779814'), 'role_id' => '3'],
            ['username' => 'badrain', 'password'=> Hash::make('949500'), 'role_id' => '3'],
            ['username' => 'suranadi', 'password'=> Hash::make('280971'), 'role_id' => '3'],
            ['username' => 'sesaot', 'password'=> Hash::make('865859'), 'role_id' => '3'],
            ['username' => 'batu_kumbung', 'password'=> Hash::make('629910'), 'role_id' => '3'],
            ['username' => 'sigerongan', 'password'=> Hash::make('283855'), 'role_id' => '3'],
            ['username' => 'passwordk', 'password'=> Hash::make('874592'), 'role_id' => '3'],
            ['username' => 'gelogor', 'password'=> Hash::make('261430'), 'role_id' => '3'],
            ['username' => 'banyumulek', 'password'=> Hash::make('302146'), 'role_id' => '3'],
            ['username' => 'gunungsari', 'password'=> Hash::make('866360'), 'role_id' => '3'],
            ['username' => 'sesela', 'password'=> Hash::make('640843'), 'role_id' => '3'],
            ['username' => 'merembu', 'password'=> Hash::make('882947'), 'role_id' => '3'],
            ['username' => 'kuripan', 'password'=> Hash::make('954421'), 'role_id' => '3'],
            ['username' => 'tempos', 'password'=> Hash::make('856242'), 'role_id' => '3'],
            ['username' => 'dasan_geres', 'password'=> Hash::make('994798'), 'role_id' => '3'],
            ['username' => 'desa_ganti', 'password'=> Hash::make('851069'), 'role_id' => '3'],
            ['username' => 'kidang', 'password'=> Hash::make('448298'), 'role_id' => '3'],
            ['username' => 'darmaji', 'password'=> Hash::make('374618'), 'role_id' => '3'],
            ['username' => 'sukarara', 'password'=> Hash::make('861956'), 'role_id' => '3'],
            ['username' => 'rambitan', 'password'=> Hash::make('702493'), 'role_id' => '3'],
            ['username' => 'tiwugalih', 'password'=> Hash::make('955848'), 'role_id' => '3'],
            ['username' => 'pemenang_barat', 'password'=> Hash::make('609833'), 'role_id' => '3'],
            ['username' => 'tanjung', 'password'=> Hash::make('567976'), 'role_id' => '3'],
            ['username' => 'bentek', 'password'=> Hash::make('146931'), 'role_id' => '3'],
            ['username' => 'santong', 'password'=> Hash::make('776327'), 'role_id' => '3'],
            ['username' => 'desa_bayan', 'password'=> Hash::make('455949'), 'role_id' => '3'],
            ['username' => 'kel_bugis', 'password'=> Hash::make('704730'), 'role_id' => '3'],
            ['username' => 'sermong', 'password'=> Hash::make('363740'), 'role_id' => '3'],
            ['username' => 'desaberu', 'password'=> Hash::make('336694'), 'role_id' => '3'],
            ['username' => 'dasan_anyar', 'password'=> Hash::make('293478'), 'role_id' => '3'],
            ['username' => 'sekongkang_atas', 'password'=> Hash::make('853044'), 'role_id' => '3'],
            ['username' => 'mataiyang', 'password'=> Hash::make('629098'), 'role_id' => '3'],
            ['username' => 'senayan', 'password'=> Hash::make('401690'), 'role_id' => '3'],
            ['username' => 'mantun', 'password'=> Hash::make('144618'), 'role_id' => '3'],
            ['username' => 'seteluk_tengah', 'password'=> Hash::make('953314'), 'role_id' => '3'],
            ['username' => 'nangawera', 'password'=> Hash::make('579552'), 'role_id' => '3'],
            ['username' => 'desa_wora', 'password'=> Hash::make('679545'), 'role_id' => '3'],
            ['username' => 'mandala', 'password'=> Hash::make('722157'), 'role_id' => '3'],
            ['username' => 'sori_sakolo', 'password'=> Hash::make('164370'), 'role_id' => '3'],
            ['username' => 'desa_katua', 'password'=> Hash::make('592162'), 'role_id' => '3'],
            ['username' => 'desa_jambu', 'password'=> Hash::make('536471'), 'role_id' => '3'],
            ['username' => 'tembalae', 'password'=> Hash::make('351394'), 'role_id' => '3'],
            ['username' => 'rasabou', 'password'=> Hash::make('287041'), 'role_id' => '3'],
            ['username' => 'serakapi', 'password'=> Hash::make('535112'), 'role_id' => '3'],
            ['username' => 'tekasire', 'password'=> Hash::make('935379'), 'role_id' => '3'],
            ['username' => 'desa_kiwu', 'password'=> Hash::make('838297'), 'role_id' => '3'],
            ['username' => 'desa_soro', 'password'=> Hash::make('998407'), 'role_id' => '3'],
            ['username' => 'dorokobo', 'password'=> Hash::make('515811'), 'role_id' => '3'],
            ['username' => 'calabai', 'password'=> Hash::make('905840'), 'role_id' => '3'],
        ];
        $users = User::get()->pluck('username')->toArray();
        $init_size = count($data);
        for ($i = 0; $i < $init_size; $i++) {
            if (in_array($data[$i]['username'], $users)) {
                unset($data[$i]);
            }
        }
        User::insert($data);
    }
}
