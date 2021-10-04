<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

     public function blog(){
        // return $this->hasOne('App\Models\Blog');
      //  return $this->hasOne('App\Models\Blog','fk','localkey');
     // return $this->hasOne('App\Models\Blog','cc_id','c_id');
     return $this->hasOne('App\Models\Blog');
     }  
     
     
     public function blogs(){ 
        //return $this->hasMany('App\Models\Blog','fk','localkey');
        return $this->hasMany('App\Models\Blog');
     }   
 

    public function image(){
      return $this->morphOne('App\Models\Image','imageable');
    }


    public function images(){
      return $this->morphMany('App\Models\Image','imageable');
    }
   
}
