<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = false;
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function village_has_file(){
        return $this->hasMany(VillageHasFile::class);
    }
}
