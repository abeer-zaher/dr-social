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
        'dateshow',
        'director',
        'prodcompany',
        'cast',
        'photo'
    ];
    public function geners(){
        return $this->belongsToMany('App\Models\Gener');
     }
}
