@extends('layouts.app')

@section('content')
<form action="{{ route('grids.check', compact('grid', 'value')) }}" method="post">
    @csrf

    <div class="flex mb-8">
        <div class="w-4/5">
            <div class="py-5">
                <div class="mb-1 text-2xl text-black">{{ $grid->name }}</div>
                <div class="text-xs uppercase text-grey-darker">Grid</div>
            </div>
        </div>
        <div class="w-1/5">
            <div class="py-5 bg-blue text-center rounded">
                <div class="mb-1 text-2xl text-white">{{ $value }}</div>
                <div class="text-xs uppercase text-blue-lighter">Product</div>
            </div>
        </div>
    </div>

    <table class="w-full mb-8 text-sm">
        <tr>
            <th class="p-1 text-grey-dark"></th>
            @foreach($grid->multipliers as $multiplier)
            <th class="p-1 text-grey-dark">{{ $multiplier->value }}</th>
            @endforeach
        </tr>
        @foreach($grid->multiplicands as $multiplicand)
        <tr>
            <th class="p-1 text-grey-dark">{{ $multiplicand->value }}</th>
            @foreach($grid->multipliers as $multiplier)
            <td class="p-1">
                <label class="w-full block p-2 bg-grey-lighter hover:bg-grey-light text-grey-darkest rounded uppercase">
                    <input name="products[]" type="checkbox" value="{{ $grid->products()->where('multiplier_id', $multiplier->id)->where('multiplicand_id', $multiplicand->id)->value('id') }}">
                    <span>{{ $multiplier->value }} &times; {{ $multiplicand->value }}</span>
                </label>
            </td>
            @endforeach
        </tr>
        @endforeach
    </table>

    <button class="w-full p-3 p-3 bg-green hover:bg-green-dark text-white rounded uppercase" type="submit">Check</button>
</form>
@endsection
