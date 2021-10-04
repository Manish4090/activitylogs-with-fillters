<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use App\Models\Student; 
use Illuminate\Support\Facades\Http;
use stdClass;

class Students extends Controller
{
    //
    public function index(){
        echo "Yes I am Index.";
    }

    public function test(){
        echo "Yes I am Test.";
    }
    public function studentPage(){

        $data = [];
        $data['name'] = 'Code Improve';
        $data['test'] = 'Code Improve Test'; 
        $data['num'] = 2; 
        $data['list'] =  ['Vishnu','Hariom','Mahesh'];
        return view('student',$data);
    } 
    public  function mystudent($id){
        echo "yes myfunction ".$id;
        return view('mystudent');
    }

    public  function mytestdata($id){
        echo  $id; 
    }
    public  function userName($id){
        echo  $id; 
    }

    public  function userInfo($name,$id){
        echo  "name is ".$name.' And sid is :-'.$id; 
    }
    
    public function getListData(){
        $data = DB::connection('mysql2')->select('select * from user_info');
      // $data = Student::all();
       //$data = Student::find([1,2,3]); 
       return $data;
    }
 
    public function getFirstLayout(){
        return view('student-record');
    }
    public function getSecondLayout(){
        return view('student-list');
    }

    public function createSession(Request $request){
         $data = [
            'user_id'=>12,
            'user_name'=>'Vishnu'
        ];
      //  session($data); 
        $request->session()->put($data); 
        $messageArray = [
            'msj'=>'Added successfully',
            'class'=>'alert alert-danger'
        ];
        $request->session()->flash('message', $messageArray);
        echo "session set";
    }

    public function showSession(Request $request){ 
        //echo session('user_id').'=='.session('user_name');
      //  echo "<pre>"; print_r($request->session()->all());
        echo $request->session()->get('user_name'); 
        if($request->session()->has('user_id')){
            echo "Yes set";
        }
        if($request->session()->has('message')){
            echo session('message')['msj'];
        }
         
        return view('student-list');
    }

    public function deleteSession(Request $request){
      //  $request->session()->flush();
       // $request->session()->forget(['user_id','user_name']);
       $request->session()->forget('user_id');
    }


    public function queryBuilder(){
        $model = new Student();
        return $model->getRecord();
    }

      
    public function modelBindData(Student $val){ 
        return $val;
    }

    public function getAccessors(){
        return  Student::all();
    }


    public function setMutator(){
         $std = new Student();
         $std->name ='mtest';
         $std->email_id = 'mtest@gmail.com';
         $std->phone_no = '9809878900';
         $std->save();
         echo "save";
    }
  
   
    public function addTask(Request $request){
        //echo $request->path();
     //   echo $request->method();

     if($request->method() =='POST'){

        /*  echo $request->input('name');
        $validatedData = $request->validate([
            'name' => 'required',
            'emailId' => 'required',
        ],[
            'name.required' =>'sssss'
        ]);   */
 
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'emailId' => 'required',
        ]);
        if ($validator->fails()) {
             echo "yessss";
             $validator->errors()->add('name', 'Something is wrong with this field!');
        }
        $errors = $validator->errors();

        echo $errors->first('name');
      /*     $model = new Task();
        $model->name = 'aa';
        $model->email_id = 'aa';
        $model->phone_no = '666';
        $model->save();   */
        /* $datas =  Task::create([
            'name'=>'me',
            'email_id'=>'me@gmail.com',
            'phone_no'=>'9898899'
        ]); */
        echo "yes";
     }
       
    
        return view('add-task' );
    }
}
