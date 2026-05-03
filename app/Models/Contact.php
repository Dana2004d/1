<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'message_type',
        'message',
        'visitor_id'
    ];


    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
