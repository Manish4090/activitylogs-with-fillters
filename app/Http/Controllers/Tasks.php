<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request; 
use App\Models\Task; 
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Redirect; 
class Tasks extends Controller
{
    //

    public function index(Request $request){ 
        //echo $request->path(); 
        $data['lists'] = Task::withoutTrashed()->paginate(4);  
        return view('task',$data);
    }

    public function addTask(Request $request,$id=""){ 
         
        $data = [];
        $data['type'] = 'Add'; 
        if($id !=''){
            $data['detail'] = Task::find($id); 
            $data['id'] = $id;
            $data['type'] = 'Update'; 
        }
        
         if($request->method() =='POST'){
                //$request->file('profilePic')->store('img');
            $nameImg =  time();
            $ext = $request->file('profilePic')->guessExtension();
            $imageName = $nameImg.'.'.$ext;
            $file = $request->file('profilePic')->storeAs('img',$imageName);
             
            $validationData = $request->validate([
                'name'=>'required',
                'emailId'=>'required|email',
                'phoneNo'=>'required'
            ],[
                'name.required'=>'Please must be filled',
                'email' =>'Please enter valid emdataail',
                'phoneNo.required'=>'Enter phone no'
            ]); 
            $responseArray = [
                'name'=>$request->input('name'),
                'email_id'=>$request->input('emailId'),
                'phone_no'=>$request->input('phoneNo'),
                'image'=>$imageName
               ]; 
            if($id !=''){ 
                Task::where('id',$id)->update($responseArray);
                $request->session()->flash('message','Updated Successfully');
            }else{
                $insert = Task::create($responseArray); 
                $request->session()->flash('message','Added Successfully');
            } 
            return Redirect::to('task');
           /*  $data = new Task();
            $data->name = $request->input('name');
            $data->email_id = $request->input('emailId');
            $data->phone_no = $request->input('phoneNo'); 
            $data->save(); */
                 
         }
    
        return view('add-task' ,$data);
    }
    
    public function deleteTask(Request $request,$id){ 
        Task::where('id',$id)->delete();
        //Task::where('id',$id)->forceDelete();
        $request->session()->flash('message','Deleted Successfully');
        return Redirect::to('task'); 
    }

    public function restoreTask(Request $request,$id){
        
        Task::onlyTrashed()->find($id)->restore();
        return 'Done';
    }
}
