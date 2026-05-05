<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{
        use SoftDeletes;
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
