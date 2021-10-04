<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Client;
class Blog extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

    public function client(){
     ///   return $this->belongsTo('App\Models\Client');
     //return $this->belongsTo('App\Models\Client','fk','ownerKey');
     // return $this->belongsTo('App\Models\Client','client_id','id');
    /// return $this->belongsTo('App\Models\Client','cc_id','c_id');
    return $this->belongsTo('App\Models\Client');
    }
 
    public function tags(){ 
       // return $this->belongsToMany('App\Models\Tag');
     //  return $this->belongsToMany('App\Models\Tag','table','currentmodel_fk','fk');
     return $this->belongsToMany('App\Models\Tag','tagblog','b_id','t_id');
    }
    

    public function image(){
      return $this->morphOne('App\Models\Image','imageable');
    }

    public function images(){
      return $this->morphMany('App\Models\Image','imageable');
    }

    public function tagss()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
   
}
