<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_text',
        'visitor_id'


    ];
    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }
}
