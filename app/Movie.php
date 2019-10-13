<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
    	'title', 
    	'description', 
    	'duration',
    	'rating',
    	'release_date',
    	'cover'
    ];

    public function genres()
    {
    	return $this->belongsToMany('App\Genre')->withTimestamps();
    }
}
