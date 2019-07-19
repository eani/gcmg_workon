<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideosMedia extends Model
{
    protected $fillable=[
		'file',
    	'original_file',
    	'code',
    	'priority',
		'file',
    	'original_file',
    	'video_id',
    ];
}
