<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Village;

class VillageSeeder extends Seeder
{
    public function run(){
        $data = [
            ['name'=>'Kelurahan Pejanggik', 'district_id'=>'1', 'user_id'=>'11'],
            ['name'=>'Kelurahan Banjar', 'district_id'=>'2', 'user_id'=>'12'],
            ['name'=>'Kelurahan Tanjung Karang Permai', 'district_id'=>'3', 'user_id'=>'13'],
            ['name'=>'Kelurahan Monjok', 'district_id'=>'4', 'user_id'=>'14'],
            ['name'=>'Kelurahan Cakranegara Timur', 'district_id'=>'5', 'user_id'=>'15'],
            ['name'=>'Kelurahan Selagalas', 'district_id'=>'6', 'user_id'=>'16'],
            ['name'=>'Desa Jembatan Kembar', 'district_id'=>'7', 'user_id'=>'17'],
            ['name'=>'Desa Lembar Selatan', 'district_id'=>'7', 'user_id'=>'18'],
            ['name'=>'Desa Lembar Utara', 'district_id'=>'7', 'user_id'=>'19'],
            ['name'=>'Desa Tanak Berak', 'district_id'=>'8', 'user_id'=>'20'],
            ['name'=>'Desa Krama Jaya', 'district_id'=>'8', 'user_id'=>'21'],
            ['name'=>'Desa Golong', 'district_id'=>'8', 'user_id'=>'22'],
            ['name'=>'Desa Badrain', 'district_id'=>'8', 'user_id'=>'23'],
            ['name'=>'Desa Suranadi', 'district_id'=>'8', 'user_id'=>'24'],
            ['name'=>'Desa Sesaot', 'district_id'=>'8', 'user_id'=>'25'],
            ['name'=>'Desa Batu Kumbung', 'district_id'=>'9', 'user_id'=>'26'],
            ['name'=>'Desa Sigerongan', 'district_id'=>'9', 'user_id'=>'27'],
            ['name'=>'Desa Sandik', 'district_id'=>'10', 'user_id'=>'28'],
            ['name'=>'Desa Gelogor', 'district_id'=>'11', 'user_id'=>'29'],
            ['name'=>'Desa Banyumulek', 'district_id'=>'11', 'user_id'=>'30'],
            ['name'=>'Desa Gunungsari', 'district_id'=>'12', 'user_id'=>'31'],
            ['name'=>'Desa Sesela', 'district_id'=>'12', 'user_id'=>'32'],
            ['name'=>'Desa Merembu', 'district_id'=>'13', 'user_id'=>'33'],
            ['name'=>'Desa Kuripan', 'district_id'=>'14', 'user_id'=>'34'],
            ['name'=>'Desa Tempos', 'district_id'=>'15', 'user_id'=>'35'],
            ['name'=>'Kelurahan Dasan Geres', 'district_id'=>'15', 'user_id'=>'36'],
            ['name'=>'Desa Ganti', 'district_id'=>'16', 'user_id'=>'37'],
            ['name'=>'Desa Kidang', 'district_id'=>'16', 'user_id'=>'38'],
            ['name'=>'Desa Darmaji', 'district_id'=>'17', 'user_id'=>'39'],
            ['name'=>'Desa Sukarara', 'district_id'=>'18', 'user_id'=>'40'],
            ['name'=>'Desa Rambitan', 'district_id'=>'19', 'user_id'=>'41'],
            ['name'=>'Kelurahan Tiwugalih', 'district_id'=>'20', 'user_id'=>'42'],
            ['name'=>'Desa Pemenang Barat', 'district_id'=>'21', 'user_id'=>'43'],
            ['name'=>'Desa Tanjung', 'district_id'=>'22', 'user_id'=>'44'],
            ['name'=>'Desa Bentek', 'district_id'=>'23', 'user_id'=>'45'],
            ['name'=>'Desa Santong', 'district_id'=>'24', 'user_id'=>'46'],
            ['name'=>'Desa Bayan', 'district_id'=>'25', 'user_id'=>'47'],
            ['name'=>'Kelurahan Bugis', 'district_id'=>'26', 'user_id'=>'48'],
            ['name'=>'Desa Sermong', 'district_id'=>'26', 'user_id'=>'49'],
            ['name'=>'Desa Desaberu', 'district_id'=>'27', 'user_id'=>'50'],
            ['name'=>'Desa Dasan Anyar', 'district_id'=>'28', 'user_id'=>'51'],
            ['name'=>'Desa Sekongkang Atas', 'district_id'=>'29', 'user_id'=>'52'],
            ['name'=>'Desa Mataiyang', 'district_id'=>'30', 'user_id'=>'53'],
            ['name'=>'Desa Senayan', 'district_id'=>'31', 'user_id'=>'54'],
            ['name'=>'Desa Mantun', 'district_id'=>'32', 'user_id'=>'55'],
            ['name'=>'Desa Seteluk Tengah', 'district_id'=>'33', 'user_id'=>'56'],
            ['name'=>'Desa Nangawera', 'district_id'=>'34', 'user_id'=>'57'],
            ['name'=>'Desa Wora', 'district_id'=>'34', 'user_id'=>'58'],
            ['name'=>'Desa Mandala', 'district_id'=>'34', 'user_id'=>'59'],
            ['name'=>'Desa Sori Sakolo', 'district_id'=>'35', 'user_id'=>'60'],
            ['name'=>'Desa Katua', 'district_id'=>'35', 'user_id'=>'61'],
            ['name'=>'Desa Jambu', 'district_id'=>'36', 'user_id'=>'62'],
            ['name'=>'Desa Tembalae', 'district_id'=>'36', 'user_id'=>'63'],
            ['name'=>'Desa Rasabou', 'district_id'=>'37', 'user_id'=>'64'],
            ['name'=>'Desa Serakapi', 'district_id'=>'38', 'user_id'=>'65'],
            ['name'=>'Desa Tekasire', 'district_id'=>'39', 'user_id'=>'66'],
            ['name'=>'Desa Kiwu', 'district_id'=>'40', 'user_id'=>'67'],
            ['name'=>'Desa Soro', 'district_id'=>'41', 'user_id'=>'68'],
            ['name'=>'Desa Dorokobo', 'district_id'=>'41', 'user_id'=>'69'],
            ['name'=>'Desa Calabai', 'district_id'=>'42', 'user_id'=>'70'],
        ];
        $villages = Village::get()->pluck('name')->toArray();
        $init_size = count($data);
        for ($i=0; $i < $init_size; $i++) {
            if (in_array($data[$i]['name'], $villages)) {
                unset($data[$i]);
            }
        }
        Village::insert($data);
    }
}
