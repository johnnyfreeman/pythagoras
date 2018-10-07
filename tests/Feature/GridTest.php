<?php

namespace Tests\Feature;

use App\Grid;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GridTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanSeeGrids()
    {
        $user = factory(User::class)->create();
        $grid1 = Grid::generate('Test 1', [1,2], [3,4]);
        $grid2 = Grid::generate('Test 2', [1,2], [3,4]);

        $response = $this
            ->actingAs($user)
            ->get(route('grids.index'));

        $response->assertSuccessful();
        $response->assertViewIs('grids.index');
    }

    public function testUserCanSeeGrid()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $grid = Grid::generate('Test', [1,2], [3,4]);

        $response = $this
            ->actingAs($user)
            ->get(route('grids.play.value', [
                'grid' => $grid,
                'value' => $grid->randomProduct()->value,
            ]));

        $response->assertSuccessful();
        $response->assertViewIs('grids.show');
        foreach ($grid->multipliers as $multiplier) {
            $response->assertSee($multiplier->value);
        }
        foreach ($grid->multiplicands as $multiplicand) {
            $response->assertSee($multiplicand->value);
        }
    }

    public function testUserCanCheckAnswer()
    {
        $user = factory(User::class)->create();
        $grid = Grid::generate('Testing', range(1, 3), range(1, 3));
        $product = $grid->randomProduct();

        $response = $this
            ->actingAs($user)
            ->from(route('grids.play.value', [
                'grid' => $grid,
                'value' => $product->value,
            ]))
            ->post(route('grids.check', [
                'grid' => $grid,
                'value' => $product->value,
            ]));

        $response->assertRedirect();
    }
}
