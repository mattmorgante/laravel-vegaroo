@extends('layouts.app')

<title>Easy cheap delicious and nutritious vegan meals</title>
<meta name="description" content="Vegaroo has easy and nutritious plant-based meals you can prepare in 30 minutes or less without using any fancy ingredients "/>

@section('content')

    @include('partials.nav')

    <h2 class="other-recipes">Recipes</h2>
    @foreach ($recipes as $recipe)
        <div class="container">
            <div class="flexible_row">
                <div class="row_item">
                    <a href="/vegan-recipes/{{$recipe->category}}/{{ $recipe->slug }}">
                        <h1>{{ $recipe->title }}</h1>
                        <p>Upvotes: {{ $recipe->upvotes }}</p>
                        <p style="color:black;">{{ $recipe->description }}</p>
                    </a>
                </div>
            </div>
        </div>
        </div>
    @endforeach
    <br>


@endsection