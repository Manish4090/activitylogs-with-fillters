<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Car;
use App\Models\Machanic;

class MachanicController extends Controller
{
    public function add_machanic(){
		$machanic = new Machanic();
		$machanic->name = "Manish kumarff";
		$machanic->save();
		return "data save";
	}
	public function show_owner($id){
		$owner = Machanic::find($id)->owner;
		return $owner;
		
	}
}
