<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudiosMedia extends Model
{
    protected $fillable=[
		'file',
    	'original_file',
    	'code',
    	'priority',
    	'audio_id',
    ];

    public function downloads()
    {
    	return $this->hasMany('App\Download','file_id')->where('file_type','audio');
    }
}