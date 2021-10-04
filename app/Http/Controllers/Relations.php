<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog; 
use App\Models\Client; 
use App\Models\Tag; 
use App\Models\Country;  
use App\Models\Image; 
use App\Models\Video; 

class Relations extends Controller
{
    //
 
    public function oneToOne(){
        $data = Client::find(2)->blog;
        //echo $data->description;
        dd($data);
        return 'o';
    }

    public function inverseOneToOne(){
        $data = Blog::find(3)->client;
        dd($data);
        return 'i';
    }
   
    public function oneToMany(){
        $data = Client::find(2)->blogs;
         
        foreach($data as $val){
            echo $val->title.'<br/>';
        }
        dd($data);
        return 'o';
    }

    public function manyToManyBlog(){
        $data = Blog::find(2)->tags;
         
        foreach($data as $val){
            echo $val->name.'<br/>';
        }
        dd($data);
        return 'o';
    }

    public function manyToManyTag(){
        $data = Tag::find(2)->blogs;
         
        foreach($data as $val){
            echo $val->title.'<br/>';
        }
        dd($data);
        return 'o';
    }
    public function oneToManyThrough(){
        $data = Country::find(5)->blog;
         
       /*  foreach($data as $val){
            echo $val->title.'<br/>';
        } */
        dd($data);
        return 'o';
    }

    public function manyToManyThrough(){
        $data = Country::find(1)->blogs;
         
          foreach($data as $val){
            echo $val->title.'<br/>';
        }  
        dd($data);
        return 'o';
    }


    public function oneToOnePloyBlog(){
        $data = Blog::find(1)->image;
           
        dd($data);
        return 'o';
    }

    public function oneToOnePloyClient(){
        $data = Client::find(1)->image;
           
        dd($data);
        return 'o';
    }

    public function oneToOnePloyImage(){
        $data = Image::find(2)->imageable;
           
        dd($data);
        return 'o';
    }
    
    public function oneToOnePloyBlogs(){
        $data = Blog::find(2)->images;
           
        dd($data);
        return 'o';
    }

    public function oneToOnePloyClients(){
        $data = Client::find(1)->images;
           
        dd($data);
        return 'o';
    }

    

    public function manyToManyPloyBlog(){
        $data = Blog::find(1)->tagss;
           
        dd($data);
        return 'o';
    }

    public function manyToManyPloyVideo(){
        $data = Video::find(2)->tagss;
           
        dd($data);
        return 'o';
    }

    public function manyToManyPloyTag(){
        $data = Tag::find(2)->videos;
           
        dd($data);
        return 'o';
    }
   
    

   
   
    

}
