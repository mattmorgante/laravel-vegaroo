@extends('layouts.app')

@section('content')

@include('partials.nav')

    <div class="flexible_row">
        <div class="row_item">
            <h1>{{ $recipe->title }}</h1>
            <p>{{ $recipe->description }}</p>
            <div class="recipe_extras">

                <p>Cost: <br>{{ $recipe->cost }}</p>
                <p>Time: <br>{{ $recipe->time }}</p>
                <p>Nutritional Quality: <br>{{ $recipe->score }} / 10</p>
            </div>
        </div>
        <div class="row_item">
            <h2>Nutritional Information</h2>
            <p>Fat: {{ $recipe->fat }}</p>
            <p>Protein: {{ $recipe->protein }}</p>
            <p>Carbs: {{ $recipe->carbs }}</p>
            <p>Sugar: {{ $recipe->sugar }}</p>
            <p>Fiber: {{ $recipe->fiber }}</p>
        </div>
    </div>

    <div class="flexible_row">
        <div class="row_item">
            <h2>Ingredients: </h2>
            @foreach($ingredients as $ingredient )
                <ul>
                    <li>{{ $ingredient }}</li>
                </ul>
            @endforeach
        </div>
        <div class="row_item">
            <h2>Instructions: </h2>
            @foreach($instructions as $i=>$instruction)
                <p>{{$i+1}}. {{$instruction}}</p>
            @endforeach
        </div>
        <div class="row_item">
            <h2>5</h2>
        </div>
    </div>

    <div class="notes">
        <h4>Additional Notes</h4>
    <ul>
        @foreach($notes as $note)
            <li>{{$note}}</li>
        @endforeach
    </ul>
    </div>

    <div class="related">
        <h4>Related Links</h4>
        <ul>
            <li>Either from around the web or internal links? .... not sure yet , probably both</li>
        </ul>
    </div>
@endsection