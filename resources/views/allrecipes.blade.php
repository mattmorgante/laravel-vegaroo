@extends('layouts.app')

<title>Easy cheap delicious and nutritious vegan meals</title>
<meta name="description" content="Vegaroo has easy and nutritious plant-based meals you can prepare in 30 minutes or less without using any fancy ingredients "/>

@section('content')

@include('partials.nav')

<h2 class="other-recipes">Breakfasts</h2>
@foreach ($breakfasts as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
<br>

<h2 class="other-recipes">Grain Bowls</h2>
@foreach ($bowls as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>

<h2 class="other-recipes">Curries</h2>
@foreach ($curries as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>

<h2 class="other-recipes">Stir Fries</h2>
@foreach ($stirFries as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>

<h2 class="other-recipes">Snacks</h2>
@foreach ($snacks as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>

<h2 class="other-recipes">Salads</h2>
@foreach ($salads as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>

<h2 class="other-recipes">Smoothies</h2>
@foreach ($smoothies as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p style="color:black;">{{ $recipe->description }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
<br>




@endsection