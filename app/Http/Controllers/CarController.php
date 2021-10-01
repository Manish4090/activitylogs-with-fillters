<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Car;
use App\Models\Machanic;

class CarController extends Controller
{
    public function add_car($id){
		$machanic = Machanic::find($id);
		$car = new Car();
		$car->model = "i10";
		$machanic->car()->save($car);
	}
}
