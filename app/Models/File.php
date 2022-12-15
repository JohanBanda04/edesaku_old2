<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class File extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;

    public static function getAllCombination(){
        return DB::table('villages')
        ->crossJoin('files')
        ->leftJoin('districts', 'districts.id', '=', 'villages.district_id')
        ->leftJoin('cities', 'cities.id', '=', 'districts.city_id')
        ->leftJoin('users', 'users.id', '=', 'villages.user_id')
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
            'files.is_multiple as is_multiple'
        )
        ->get()
        ->groupBy('village_id');
    }
}
