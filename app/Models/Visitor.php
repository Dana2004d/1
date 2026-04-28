<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    public function user(){
        return $this->morphOne(User::class, 'actor' , 'actor_type' , 'actor_id' , 'id' );
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
