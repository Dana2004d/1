<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
      use SoftDeletes;

     protected $fillable = [
        'name',
        'governorate_id'


    ];
    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
}
