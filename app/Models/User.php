<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Models\ActivityLogs;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,LogsActivity;

	protected static $logAttributes = ['name', 'email','password','text'];
	
	protected static $recordEvents = ['created','updated'];
	
	protected static $logFillable = true;
	
	
	//protected static $logName = 'user';
	protected static $logOnlyDirty = true;
	
	public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName}";
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
		'phone',
    ];
	
	

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	
}
