<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLogs extends Model
{
    use HasFactory;
	
	
	protected $table = 'activity_log';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
		 'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'created_at',
        'updated_at',
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];
	
	
}
