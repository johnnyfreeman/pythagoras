<?php

use Faker\Generator as Faker;

$factory->define(App\Multiplicand::class, function (Faker $faker) {
    return [
        'grid_id' => function () {
            return factory(Grid::class)->create()->id;
        },
        'value' => rand(),
    ];
});
