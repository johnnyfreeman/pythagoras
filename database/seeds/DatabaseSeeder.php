<?php

use App\Grid;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Grid::generate('Beginner', range(1,5), range(1, 5));
        Grid::generate('Intermediate', range(1,12), range(1, 12));
        Grid::generate('Advanced', range(6, 18), range(6, 18));
        Grid::generate('Prime', [2,3,5,7,11,13, 17, 19, 23, 29], [2,3,5,7,11,13, 17, 19, 23, 29]);
    }
}
