<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable=[
		'name',
    	'category_id',
    	'description',
    ];

    protected $with = ['category','videosmedia'];

    public function category()
    {
    	// return $this->belongsTo(Category::class);
    	return $this->belongsTo('App\Category','category_id');
    }

    public function videosmedia()
    {
    	return $this->hasMany('App\VideosMedia','video_id');
    }
}
