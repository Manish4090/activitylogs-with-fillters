<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Illuminate\Support\Facades\DB; 
class Student extends Model
{
    use HasFactory;
    //protected $table = 'user_info';
    //protected $connection = 'mysql2';
    protected $updated_at = false;
    protected $hidden = ['created_at','updated_at','admission_no'];
 
    public function getNameAttribute($value){
        return ucfirst($value);
    }
    public function getPhoneNoAttribute($value){
        return  $value.' Phone no';
    }

    public function setNameAttribute($val){
        return $this->attributes['name'] = $val.'  Singh';
    }

    public function setPhoneNoAttribute($value){
        return  $this->attributes['phone_no'] = '+91'.$value;
    }
    public function getRecord(){

       // $builder = DB::table('user_info')->get();

       // return $builder;

       ############# multiple insert
     /*   $insert = DB::table('user_info')->insert(
        [
            [
                'email_id' => 'codeImprove20@example.com', 'name' => 'code','admission_no'=>'111',
                'phone_no'=>'8909890989'
            ],
            [
                'email_id' => 'codeImprove10@example.com', 'name' => 'code','admission_no'=>'111',
                'phone_no'=>'8909890989'
            ]
        ]
       ); */


       ##### last insert ID #######
      /*  $insert = DB::table('user_info')->insertGetId( 
            [
                'email_id' => 'demo@example.com', 'name' => 'code','admission_no'=>'111',
                'phone_no'=>'8909890989'
            ] 
       ); 
       echo $insert; */

       ######### UPDATE ######
      /*  $data  = DB::table('user_info')->where('id', 57)->update(['name'=>'demo last']); */

      ###### DELETE ####
     /*  $data  = DB::table('user_info')->where('id', 55)->delete(); */

     ##### SELECT ######
    /*  $builder = DB::table('user_info')
                 ->where('user_info.name', 'test')
                ->where('user_info.id', 56); */

                $builder = DB::table('user_info') 
                            ->select('user_info.*','students.id')
                           /*  ->join('students','students.id','=','user_info.id','right') */
                           ->leftjoin('students','students.id','=','user_info.id' )
                            //->whereIn('user_info.id',[1,2,3])
                           // ->whereNotIn('user_info.id',[1,2,3])
                            ->where('user_info.name','like','%M%')
                            ->where([
                                'user_info.name'=> 'test',
                                'user_info.id'=>56
                                ])
                                /* ->orWhere('user_info.name','>=','demo')
                                ->orWhere(function($query) {
                                    $query->where('name', 'Abigail')
                                          ->where('phone_no', '>', 50);
                                }) */
                                ->groupBy('user_info.id')
                                ->having('user_info.id','>=',2)
                                ->orderBy('user_info.name','DESC')
                                ->limit('2')
                                 ;


       //echo $builder->toSql();
     $query = str_replace(array('?'), array('\'%s\''), $builder->toSql());
     $query = vsprintf($query, $builder->getBindings());

     echo $query;  

    $result = $builder->get();
     


       return '';
    }
}   
