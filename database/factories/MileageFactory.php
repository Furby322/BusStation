<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Mileage::class, function (Faker $faker) {
    return [
        'id_car' => rand(1,9),
        'mileage' => rand(10,150),
        'date' => $faker->dateTimeBetween('-2 months','-1 days')
    ];
});
