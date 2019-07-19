<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationsMedia extends Model
{
    protected $fillable=[
		'file',
    	'original_file',
    	'code',
    	'priority',
    	'application_id',
    ];

}
