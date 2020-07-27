<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Release::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date' => $faker->dateTimeBetween('now', '+1 year')
    ];
});
