<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\VillageFile;
use App\Models\Village;
use App\Models\File;

class VillageController extends Controller
{
    public static function view_village_messages(Request $request){
        $villageFiles = VillageFile::getAllCombination()->where('villages.id', $request->route('village_id'))->get()->groupBy('village_id');
        $messages = Comment::get();
        $villageFiles = $villageFiles->map(function($villageFile, $key) use ($messages){
            return $villageFile->map(function($file, $key) use ($messages){
                if($file->real_file_id){
                    if(count($messages->where('village_has_file_id', $file->real_file_id)->all()) > 0){
                        $file->messages = $messages->where('village_has_file_id', $file->real_file_id)->all();
                    }
                }
                return $file;
            });
        });
        return view('view_village_messages', [
            'villageFiles' => $villageFiles]
        );
    }

    public static function view_village_files(Request $request){
        $villageFiles = VillageFile::getAllCombination()->where('villages.id', $request->route('village_id'))->get()->groupBy('village_id');
        return view('table', [
            'villageFiles' => $villageFiles]
        );
    }

    public static function view_village_files_status(Request $request){
        $villages = Village::with(['village_has_file', 'district', 'district.city'])->get();
        $files = File::get();
        $villages = $villages->map(function($village, $key) use ($files){
            $file_counter = 0;
            $verified_files_counter = 0;
            foreach($files as $file){
                // if($file->is_multiple){
                if($file->name == "Dokumentasi"){
                    if(count($village->village_has_file->where('file_id', "$file->id")->all()) > 1){
                        $file_counter += 1;
                    }
                    if(count($village->village_has_file->where('file_id', "$file->id")->where('is_verified', '1')->all()) > 1){
                        $verified_files_counter += 1;
                    }
                } else {
                    if(count($village->village_has_file->where('file_id', "$file->id")->all()) > 0){
                        $file_counter += 1;
                    }
                    if(count($village->village_has_file->where('file_id', "$file->id")->where('is_verified', '1')->all()) > 0){
                        $verified_files_counter += 1;
                    }
                }
                
            }
            $village->status = ($verified_files_counter == 7)? "Berkas Lengkap dan Terverifikasi" : (($file_counter == 7)? 'Berkas Sudah Lengkap': (($file_counter > 0)? 'Berkas Belum Lengkap' : 'Berkas Kosong'));
            $village->panel_class = ($verified_files_counter == 7)? "panel-completed" : (($file_counter == 7)? 'panel-verified': (($file_counter > 0)? "panel-uploaded" : "panel-empty"));
            $village->files_count = $file_counter;
            $village->verified_files_count = $verified_files_counter;
            return $village;
        });
        return view('village_files_status', [
            "villages" => $villages
        ]);
    }
}
