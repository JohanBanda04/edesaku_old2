<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageHasFile extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function village(){
        return $this->belongsTo(Village::class);
    }
    public function file(){
        return $this->belongsTo(File::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
