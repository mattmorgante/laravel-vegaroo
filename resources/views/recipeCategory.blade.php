@extends('layouts.app')

<title>Vegan {{ $category }} recipes</title>
<meta name="description" content="Vegaroo has easy and nutritious plant-based {{ $category }} you can prepare in 30 minutes or less without using any fancy ingredients "/>

@section('content')
    @include('partials.nav')
<h1 class="category_title">{{ $category }}</h1>
@foreach ($recipes as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h2>{{ $recipe->title }}</h2>
                    <div class="recipe-info-wrapper">
                        <p>Calories: {{ $recipe->calories }}</p>
                        <p>Time: {{ $recipe->time }}</p>
                    </div>
                    <p class="recipe-info">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>
@endsection