<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Car;
use App\Models\Machanic;

class OwnerController extends Controller
{
    public function add_owner($id){
		$machanic = Car::find($id);
		$owner = new Owner();
		$owner->name = "Manj";
		$machanic->owner()->save($owner);
	}
	
	public function show_owner1($id){
		$owner = Machanic::find($id)->owner;
		return $owner;
		
	}
}
