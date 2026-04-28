<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    protected $fillable = [
        'name',


    ];
    public function locations(){
        return $this->hasMany(Location::class);
    }
    protected static function boot()
{
    parent::boot();

    static::deleting(function ($governorate) {
        $governorate->locations()->delete();
    });
}
}
