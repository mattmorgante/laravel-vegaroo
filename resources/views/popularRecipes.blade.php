@extends('layouts.app')

<title>Easy cheap delicious and nutritious vegan meals</title>
<meta name="description" content="Vegaroo has easy and nutritious plant-based meals you can prepare in 30 minutes or less without using any fancy ingredients "/>

@section('content')

@include('partials.nav')
<div class="header-inline">
  <h2 class="other-recipes">Most Popular Recipes</h2>
</div>
<div class="container">
@foreach($recipes as $recipe)
    @if ($loop->iteration % 4 == 1 )
        <div class="flexible_row">
            @endif
            <li class="row_item">
                <h3># {{ $loop->iteration }}</h3>
                <a class="article_link" href="/vegan-recipes/{{ $recipe->category }}/{{ $recipe->slug }}">{{ $recipe->title }}</a><br>
                <div class="recipe_extras">
                    <span class="upvotes">Upvotes: {{ $recipe->upvotes }}</span><br>
                    <span class="price">Calories: {{ $recipe->calories }}</span><br>
                    <span class="time">Time: {{ $recipe->time }}</span>
                </div>
            </li>

            @if ( ($loop->iteration % 4 ==0) or ($loop->last) )
        </div>
    @endif
@endforeach
</div>
<br>


@endsection
