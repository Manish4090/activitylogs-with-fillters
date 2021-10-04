<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];


    public function tagss()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
   
}
