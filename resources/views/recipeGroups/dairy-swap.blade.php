@extends('layouts.app')

<title>5 Vegan Recipes With Plant-Based Dairy Alternatives</title>
<meta name="description" content="ToDo"/>

@section('content')

@include('partials.nav')

<div class="container">
    @foreach ($recipes as $recipe)
        @include('partials.full-screen-recipe')
    @endforeach
</div>
@endsection
