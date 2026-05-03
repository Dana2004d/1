<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AidRequest extends Model
{
    /** @use HasFactory<\Database\Factories\AidRequestFactory> */
    use HasFactory;


      use SoftDeletes;

   protected $fillable = [
    'name',
    'phone',
    'company_name',
    'aid_type',
    'link',
    'notes',
    'category_id',
];
    public function visitors(){
    return $this->belongsToMany(Visitor::class);
}
public function category(){
    return $this->belongsTo(Category::class);
}
}
