<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		//activity('properties')->log('Look mum, I logged something');
		$allActivitys = Activity::get();
		$allActivitysDatas = Activity::groupBy('description')->get();
        return view('home',compact(['allActivitys','allActivitysDatas']));
    }
	
	public function getactivitylogs(Request $request){
		$data = $request->all();
		 $getdata = Activity::where('description', $request->filter_role )->where('subject_id', $request->filter_name)->get();
		 $getdataActivity = view('activityfilter',compact('getdata'))->render();
		 
		return $getdataActivity;
	}
}
