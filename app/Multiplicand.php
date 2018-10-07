<?php

namespace App;

class Multiplicand extends Factor
{
    public function compute()
    {
        foreach ($this->grid->multipliers as $multiplier) {
            $product = Product::firstOrNew([
                'grid_id' => $this->grid_id,
                'multiplier_id' => $multiplier->id,
                'multiplicand_id' => $this->id
            ]);

            $product->value = $multiplier->value * $this->value;

            $product->save();
        }
    }
}
