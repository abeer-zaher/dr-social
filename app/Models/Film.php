<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $fillable = [
         
        'name',
        'description',
        'date-show',
        'director',
        'prod-company',
        'cast',
        'photo'
    ];
    public function geners(){
        return $this->belongsToMany('APP\Models\Gener');
     }
}
