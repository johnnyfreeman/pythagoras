<?php

use Faker\Generator as Faker;

$factory->define(App\Grid::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
