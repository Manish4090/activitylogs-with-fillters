<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $hidden = ['created_at','updated_at'];

     
    public function blogs(){ 
       // return $this->belongsToMany('App\Models\Blog');
        //  return $this->belongsToMany('App\Models\Blog','table','currentmodel_fk','fk');
     return $this->belongsToMany('App\Models\Blog','tagblog','t_id','b_id');
    }
    

    public function blogss()
    {
        return $this->morphedByMany('App\Models\Blog', 'taggable');
    } 
    public function videos()
    {
        return $this->morphedByMany('App\Models\Video', 'taggable');
    }
}
