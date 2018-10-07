<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'grid_id', 'multiplier_id', 'multiplicand_id', 'value',
    ];

    public function grid()
    {
        return $this->belongsTo(Grid::class);
    }

    public function multiplicand()
    {
        return $this->belongsTo(Multiplicand::class);
    }

    public function multiplier()
    {
        return $this->belongsTo(Multiplier::class);
    }
}
