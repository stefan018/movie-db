<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
	protected $table = 'cast';

    protected $fillable = [
    	'name',
    	'gender', 
    	'biography', 
    	'birth_date', 
    	'birth_place', 
    	'photo'
    ];
	
	public function movies()
	{
		return $this->belongsToMany('App\Movie');
	}

    public function series()
    {
        return $this->belongsToMany('App\Serie');
    }

    public function getPhotoAttribute($photo)
    {
        return asset('/images/uploads') . '/' . $photo;
    }

}
