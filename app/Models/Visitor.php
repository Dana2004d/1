<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitor extends Model
{
     use SoftDeletes;
        protected $fillable = [
            'name',
            'email',
            'phone',
            'address',
        ];




    public function user(){
        return $this->morphOne(User::class, 'actor' , 'actor_type' , 'actor_id' , 'id' );
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function aidRequests(){
    return $this->belongsToMany(AidRequest::class);
}
public function contacts()
{
    return $this->hasMany(Contact::class);
}

}
