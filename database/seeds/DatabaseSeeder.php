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
        Grid::generate('Beginner (6-10)', range(1,5), range(1, 5));
        Grid::generate('Beginner (6-10)', range(6, 10), range(6, 10));
        Grid::generate('Intermediate (1-12)', range(1, 12), range(1, 12));
        Grid::generate('Advanced (6-18)', range(6, 18), range(6, 18));
        Grid::generate('Prime (Primes 2-29)', [2,3,5,7,11,13, 17, 19, 23, 29], [2,3,5,7,11,13, 17, 19, 23, 29]);
    }
}
