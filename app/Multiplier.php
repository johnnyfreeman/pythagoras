<?php

namespace App;

class Multiplier extends Factor
{
    public function compute()
    {
        foreach ($this->grid->multiplicands as $multiplicand) {
            Product::create([
                'grid_id' => $this->grid_id,
                'multiplier_id' => $this->id,
                'multiplicand_id' => $multiplicand->id,
                'value' => $this->value * $multiplicand->value,
            ]);
        }
    }
}
