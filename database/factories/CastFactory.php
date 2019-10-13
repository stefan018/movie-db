<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cast;
use Faker\Generator as Faker;

$factory->define(Cast::class, function (Faker $faker) {
    return [
       'name' => $faker->name,
       'gender' => $faker->randomLetter,
       'biography' => $faker->paragraph,
       'birth_date' => $faker->date,
       'birth_place' => $faker->country . ', ' . $faker->city,
       'photo' => $faker->imageUrl
    ];
});
