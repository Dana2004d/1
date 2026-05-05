<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
 use SoftDeletes;
    protected $fillable = [
        'comment_text',
        'visitor_id'


    ];
    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }
}
