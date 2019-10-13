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
    
}
