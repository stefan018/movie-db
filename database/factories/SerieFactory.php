<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Serie;
use Faker\Generator as Faker;

$factory->define(Serie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'duration' => $faker->numberBetween(60, 240),
        'rating' => $faker->randomFloat(1, 1, 5),
        'release_date' => $faker->date,
        'premiere' => $faker->dateTimeBetween('now', '+3 years'),
        'seasons' => $faker->numberBetween(1, 10),
        'episodes_per_season' => $faker->numberBetween(5, 22),
        'cover' => $faker->sentence
    ]; 
});
