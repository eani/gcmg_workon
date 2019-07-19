<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
    	'name',
    	'type',
        'icon',
    	'description',
    ];

    protected $with = ['category'];

    public function category()
    {
    	// return $this->belongsTo(Category::class);
    	return $this->belongsTo('App\Category');
    }

    public function applications() {
        return $this->hasMany('App\Application', 'category_id');

    }
    public function audios() {
        return $this->hasMany('App\Audio', 'category_id');

    }
    public function books() {
        return $this->hasMany('App\Book', 'category_id');

    }
    public function videos() {
        return $this->hasMany('App\Video', 'category_id');

    }


}
