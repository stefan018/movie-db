<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'duration',
    	'rating',
    	'release_date',
    	'premiere',
    	'seasons',
    	'episodes_per_season',
    	'cover'
    ];

    public function genres()
    {
        return $this->belongsToMany('App\Genre')->withTimestamps();
    }
}
