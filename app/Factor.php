<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    public $fillable = [
        'value'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($factor) {
            $factor->compute();
        });
    }

    public function grid()
    {
        return $this->belongsTo(Grid::class);
    }
}
