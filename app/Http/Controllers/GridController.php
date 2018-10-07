<?php

namespace App\Http\Controllers;

use App\Grid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GridController extends Controller
{
    public function index(Request $request)
    {
        return view('grids.index', [
            'grids' => Grid::paginate(),
        ]);
    }

    public function play(Request $request, Grid $grid)
    {
        return redirect()
            ->route('grids.play.value', [
                'grid' => $grid,
                'value' => $grid->randomProduct()->value,
            ]);
    }

    public function check(Request $request, Grid $grid, $value)
    {
        $this->validate($request, [
            'products' => 'required|array',
        ]);

        $points = 0;
        foreach ($request->products as $id) {
            if ($grid->products()->where('id', $id)->where('value', $value)->exists()) {
                $points++;
            }
        }

        return redirect()
            ->route('grids.play.value', [
                'grid' => $grid,
                'value' => $grid->randomProduct()->value,
            ])
            ->with('status', "{$points} points!");
    }

    public function show(Grid $grid, $value)
    {
        return view('grids.show', compact('grid', 'value'));
    }
}
