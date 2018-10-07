<?php

use Faker\Generator as Faker;

$factory->define(App\Multiplier::class, function (Faker $faker) {
    return [
        'grid_id' => function () {
            return factory(Grid::class)->create()->id;
        },
        'value' => rand(),
    ];
});
