<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    public function run(){
        $data = [
            ['name'=>'Kecamatan Mataram', 'city_id'=>'1'],
            ['name'=>'Kecamatan Ampenan', 'city_id'=>'1'],
            ['name'=>'Kecamatan Sekarbela', 'city_id'=>'1'],
            ['name'=>'Kecamatan Selaparang', 'city_id'=>'1'],
            ['name'=>'Kecamatan Cakranegara', 'city_id'=>'1'],
            ['name'=>'Kecamatan Sandubaya', 'city_id'=>'1'],
            ['name'=>'Kecamatan Lembar', 'city_id'=>'2'],
            ['name'=>'Kecamatan Narmada', 'city_id'=>'2'],
            ['name'=>'Kecamatan Lingsar', 'city_id'=>'2'],
            ['name'=>'Kecamatan Batulayar', 'city_id'=>'2'],
            ['name'=>'Kecamatan Kediri', 'city_id'=>'2'],
            ['name'=>'Kecamatan Gunungsari', 'city_id'=>'2'],
            ['name'=>'Kecamatan Labuapi', 'city_id'=>'2'],
            ['name'=>'Kecamatan Kuripan', 'city_id'=>'2'],
            ['name'=>'Kecamatan Gerung', 'city_id'=>'2'],
            ['name'=>'Kecamatan Praya Timur', 'city_id'=>'3'],
            ['name'=>'Kecamatan Kopang', 'city_id'=>'3'],
            ['name'=>'Kecamatan Jonggat', 'city_id'=>'3'],
            ['name'=>'Kecamatan Pujut', 'city_id'=>'3'],
            ['name'=>'Kecamatan Praya', 'city_id'=>'3'],
            ['name'=>'Kecamatan Pemenang', 'city_id'=>'4'],
            ['name'=>'Kecamatan Tanjung', 'city_id'=>'4'],
            ['name'=>'Kecamatan Gangga', 'city_id'=>'4'],
            ['name'=>'Kecamatan Kayangan', 'city_id'=>'4'],
            ['name'=>'Kecamatan Bayan', 'city_id'=>'4'],
            ['name'=>'Kecamatan Taliwang', 'city_id'=>'5'],
            ['name'=>'Kecamatan Brang Rea', 'city_id'=>'5'],
            ['name'=>'Kecamatan Jereweh', 'city_id'=>'5'],
            ['name'=>'Kecamatan Sekongkang', 'city_id'=>'5'],
            ['name'=>'Kecamatan Brang Ene', 'city_id'=>'5'],
            ['name'=>'Kecamatan Poto Tano', 'city_id'=>'5'],
            ['name'=>'Kecamatan Maluk', 'city_id'=>'5'],
            ['name'=>'Kecamatan Seteluk', 'city_id'=>'5'],
            ['name'=>'Kecamatan Wera', 'city_id'=>'6'],
            ['name'=>'Kecamatan Dompu', 'city_id'=>'7'],
            ['name'=>'Kecamatan Pajo', 'city_id'=>'7'],
            ['name'=>'Kecamatan Hu\'u', 'city_id'=>'7'],
            ['name'=>'Kecamatan Woja', 'city_id'=>'7'],
            ['name'=>'Kecamatan Manggalewa', 'city_id'=>'7'],
            ['name'=>'Kecamatan Kilo', 'city_id'=>'7'],
            ['name'=>'Kecamatan Kempo', 'city_id'=>'7'],
            ['name'=>'Kecamatan Pekat', 'city_id'=>'7'],
        ];
        $districs = District::get()->pluck('name')->toArray();
        $init_size = count($data);
        for ($i=0; $i < $init_size; $i++) { 
            if (in_array($data[$i]['name'], $districs)) {
                unset($data[$i]);
            }
        }
        District::insert($data);
    }
}
