<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function movies()
    {
    	return $this->belongsToMany('App\Movie');
    }

    public function series()
    {
    	return $this->belongsToMany('App\Serie');
    }
}
