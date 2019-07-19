<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BooksMedia extends Model
{
    protected $fillable=[
		'file',
    	'original_file',
    	'code',
    	'priority',
    	'book_id',	
    ];
}
