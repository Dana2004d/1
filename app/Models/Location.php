<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
     protected $fillable = [
        'name',
        'governorate_id'


    ];
    public function governorate(){
        return $this->belongsTo(Governorate::class);
    }
}
