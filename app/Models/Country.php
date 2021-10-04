<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];


    public function blog(){
        //return $this->hasOneThrough('App\Models\Blog','App\Models\Client');
        //return $this->hasOneThrough('App\Models\Blog','App\Models\Client','fk','fk','lk','lk');

        return $this->hasOneThrough('App\Models\Blog','App\Models\Client','country_id','client_id','id','id');
    } 
    public function blogs(){
        return $this->hasManyThrough('App\Models\Blog','App\Models\Client');
        //return $this->hasManyThrough('App\Models\Blog','App\Models\Client','country_id','client_id','id','id');
    } 
}
