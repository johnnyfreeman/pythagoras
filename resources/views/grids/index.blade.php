@extends('layouts.app')

@section('content')
<table class="w-full">
    <tr>
        <th class="py-1 text-left">Name</th>
        <th class="py-1 text-left"></th>
    </tr>
    @foreach($grids as $grid)
    <tr>
        <td class="py-1"><a class="text-indigo" href="{{ route('grids.show', compact('grid'))}}">{{ $grid->name }}</a></td>
        <td class="py-1"><a class="inline-block p-3 bg-indigo hover:bg-indigo-dark text-white no-underline rounded" href="{{ route('grids.play', compact('grid'))}}">Play</a></td>
    </tr>
    @endforeach
</table>
@endsection
