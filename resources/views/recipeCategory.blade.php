@extends('layouts.app')

<title>Simple & Cheap Vegan {{ $category }} Recipes</title>
<meta name="description" content="Vegaroo has easy and nutritious plant-based {{ $category }} recipes you can prepare in 30 minutes or less without using any fancy ingredients "/>

@section('content')
    @include('partials.nav')
<h1 class="category_title">{{ $category }}</h1>
@foreach ($recipes as $recipe)
    @include('partials.full-screen-recipe')
@endforeach
<br>
@endsection