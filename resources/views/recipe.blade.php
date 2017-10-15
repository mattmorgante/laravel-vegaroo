@extends('layouts.app')

@section('content')
    <h1>{{ $recipe->title }}</h1>

    <h2>Cost: </h2>
    {{ $recipe->cost }}
    <h2>Time: </h2>
    {{ $recipe->time }}
    <h2>Ingredients: </h2>
    @foreach($ingredients as $ingredient )
    <ul>
        <li>{{ $ingredient }}</li>
    </ul>
    @endforeach
    <h2>Instructions: </h2>
    @foreach($instructions as $i=>$instruction)
        <p>{{$i+1}}. {{$instruction}}</p>
    @endforeach

    <h2>Nutritional Information</h2>
    <p>Fat: {{ $recipe->fat }}</p>
    <p>Protein: {{ $recipe->protein }}</p>
    <p>Carbs: {{ $recipe->carbs }}</p>
    <p>Sugar: {{ $recipe->sugar }}</p>
    <p>Fiber: {{ $recipe->fiber }}</p>
@endsection