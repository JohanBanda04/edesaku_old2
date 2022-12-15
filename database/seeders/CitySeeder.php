<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(){
        $data = [
            ['name'=>'Kota Mataram'],
            ['name'=>'Kabupaten Lombok Barat'],
            ['name'=>'Kabupaten Lombok Tengah'],
            ['name'=>'Kabupaten Lombok Utara'],
            ['name'=>'Kabupaten Sumbawa Barat'],
            ['name'=>'Kabupaten Bima'],
            ['name'=>'Kabupaten Dompu'],
        ];
        $cities = City::get()->pluck('name')->toArray();
        $init_size = count($data);
        for ($i=0; $i < $init_size; $i++) { 
            if (in_array($data[$i]['name'], $cities)) {
                unset($data[$i]);
            }
        }
        City::insert($data);
    }
}
