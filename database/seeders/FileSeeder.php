<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\File;

class FileSeeder extends Seeder
{
    public function run(){
        $data = [
            [
                'name'=>'SK Bupati/Walikota',
                'is_multiple'=>'0',
                'is_questionaire'=>'0',
                'description'=>'',
                'requirement'=>'hasil scan dalam format berkas berekstensi .pdf dengan ukuran tidak lebih dari 2048 KB (2 MB)',
                'max_size'=>2,
                'allowed_ext'=>'pdf',
                'accept'=>'application/pdf',
            ],[   
                'name'=>'SK Kepala Desa/Lurah',
                'is_multiple'=>'0',
                'is_questionaire'=>'0',
                'description'=>'',
                'requirement'=>'hasil scan dalam format berkas berekstensi .pdf dengan ukuran tidak lebih dari 2048 KB (2 MB)',
                'max_size'=>2,
                'allowed_ext'=>'pdf',
                'accept'=>'application/pdf',
            ],[   
                'name'=>'Dokumentasi',
                'is_multiple'=>'1',
                'is_questionaire'=>'0',
                'description'=>'selama satu tahun',
                'requirement'=>'berkas berupa foto berekstensi .jpg, .jpeg, .png, atau .bmp dengan ukuran tidak lebih dari 1024 MB (1 MB) sebanyak minimal 2',
                'max_size'=>1,
                'allowed_ext'=>'jpg,jpeg,png,bmp',
                'accept'=>'image/*',
            ],[   
                'name'=>'Laporan',
                'is_multiple'=>'0',
                'is_questionaire'=>'0',
                'description'=>'',
                'requirement'=>'hasil scan dalam format berkas berekstensi .pdf dengan ukuran tidak lebih dari 2048 KB (2 MB)',
                'max_size'=>2,
                'allowed_ext'=>'pdf',
                'accept'=>'application/pdf',
            ],[   
                'name'=>'Absensi',
                'is_multiple'=>'0',
                'is_questionaire'=>'0',
                'description'=>'',
                'requirement'=>'hasil scan dalam format berkas berekstensi .pdf dengan ukuran tidak lebih dari 2048 KB (2 MB)',
                'max_size'=>2,
                'allowed_ext'=>'pdf',
                'accept'=>'application/pdf',
            ],[   
                'name'=>'Kuesioner',
                'is_multiple'=>'0',
                'is_questionaire'=>'1',
                'description'=>'',
                'requirement'=>'diisi di dalam aplikasi web ini',
                'max_size'=>0,
                'allowed_ext'=>'',
                'accept'=>'',
            ],[
                'name'=>'Lampiran',
                'is_multiple'=>'1',
                'is_questionaire'=>'0',
                'description'=>'pelengkap/pendukung',
                'requirement'=>'hasil scan dalam format berkas berekstensi .pdf dengan ukuran tidak lebih dari 2048 KB (2 MB)',
                'max_size'=>2,
                'allowed_ext'=>'pdf',
                'accept'=>'application/pdf',
            ],
        ];
        $files = File::get()->pluck('name')->toArray();
        $init_size = count($data);
        for ($i=0; $i < $init_size; $i++) { 
            if (in_array($data[$i]['name'], $files)) {
                unset($data[$i]);
            }
        }
        File::insert($data);
    }
}
