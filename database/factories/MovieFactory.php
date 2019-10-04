<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'duration' => $faker->numberBetween(60, 240),
        'rating' => $faker->randomFloat(1, 1, 5),
        'release_date' => $faker->date,
        'cover' => $faker->sentence
    ];
});
