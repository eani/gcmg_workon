<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    //
    protected $fillable=[
    	'file_id',
    	'file_type',
    	'file_name',
    ];

}
