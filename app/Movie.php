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
    	return $this->belongsToMany('App\Genre');
    }

    public function cast()
    {
        return $this->belongsToMany('App\Cast');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function ratings()
    {
        return $this->morphToMany('App\Rating', 'rateable');
    }

    public function getCoverAttribute($cover)
    {
        return asset('/images/uploads') . '/' . $cover;
    }

}
