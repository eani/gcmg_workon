<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
    	'name',
    	'category_id',
    	'description',
    ];

    protected $with = ['category','booksmedia'];

    public function category()
    {
    	// return $this->belongsTo(Category::class);
    	return $this->belongsTo('App\Category','category_id');
    }

    public function booksmedia()
    {
    	return $this->hasMany('App\BooksMedia','book_id');
    }
}
