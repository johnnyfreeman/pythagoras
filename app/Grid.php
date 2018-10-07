<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grid extends Model
{
    public $fillable = [
        'name',
    ];

    public static function generate($name, $multipliers, $multiplicands)
    {
        $grid = static::create(compact('name'));

        foreach ($multipliers as $value) {
            $grid->multipliers()->create(compact('value'));
        }

        foreach ($multiplicands as $value) {
            $grid->multiplicands()->create(compact('value'));
        }

        return $grid;
    }

    public function multipliers()
    {
        return $this->hasMany(Multiplier::class);
    }

    public function multiplicands()
    {
        return $this->hasMany(Multiplicand::class);
    }

    public function randomProduct()
    {
        return $this->products()->inRandomOrder()->first();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
