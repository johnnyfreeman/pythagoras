<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'grid_id' => function () {
            return factory(Grid::class)->create()->id;
        },
        'multiplier_id' => function () {
            return factory(Multiplier::class)->create()->id;
        },
        'multiplicand_id' => function () {
            return factory(Multiplicand::class)->create()->id;
        },
        'value' => rand(),
    ];
});
