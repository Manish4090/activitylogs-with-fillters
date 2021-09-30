<?php
namespace App;
use App\Models\User;



class Helpers
{
    public static function userDetails($userId)
    {
		$userDetails = User::where('id',$userId)->first();
		
        return $userDetails->name;
    }
}