<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable=[
		'name',
    	'category_id',
    	'description',
    ];

    protected $with = ['category','applicationsmedia'];

    public function category()
    {   
    	// return $this->belongsTo(Category::class);
    	return $this->belongsTo('App\Category','category_id');
    }

    public function applicationsmedia()
    {
    	return $this->hasMany('App\ApplicationsMedia','application_id');
    }
}
