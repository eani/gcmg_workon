<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    protected $fillable=[
		'name',
    	'category_id',
    	'description',
    ];

    protected $with = ['category','audiosmedia'];

    public function category()
    {
    	// return $this->belongsTo(Category::class);
    	return $this->belongsTo('App\Category','category_id');
    }

    public function audiosmedia()
    {
    	return $this->hasMany('App\AudiosMedia','audio_id');
    }
}
		