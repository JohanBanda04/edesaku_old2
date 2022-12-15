<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VillageFile extends Model
{

    public static function getAllCombination(){
        return DB::table('villages')
        ->crossJoin('files')
        ->leftJoin('districts', 'districts.id', '=', 'villages.district_id')
        ->leftJoin('cities', 'cities.id', '=', 'districts.city_id')
        ->leftJoin('users', 'users.id', '=', 'villages.user_id')
        ->leftJoin('village_has_files', function($join)
        {
            $join->on('village_has_files.village_id', '=', 'villages.id');
            $join->on('village_has_files.file_id', '=', 'files.id');
        })
        ->leftJoin('users as uploaders', 'uploaders.id', '=', 'village_has_files.user_id')
        ->select(
            'villages.id as village_id',
            'villages.name as village_name',
            'districts.id as district_id',
            'districts.name as district_name',
            'cities.id as city_id',
            'cities.name as city_name',
            'users.id as user_id',
            'users.username as username',
            'files.id as file_id',
            'files.name as file_name',
            'files.description as file_description',
            'files.is_multiple as is_multiple',
            'files.is_questionaire as is_questionaire',
            'village_has_files.id as real_file_id',
            'village_has_files.name as real_file_name',
            'village_has_files.extension as extension',
            'village_has_files.is_verified as is_verified',
            'village_has_files.size as size',
            'village_has_files.created_at as created_at',
            'village_has_files.updated_at as updated_at',
            'uploaders.id as uploader_id',
            'uploaders.username as uploader_username',
        );
    }
}
