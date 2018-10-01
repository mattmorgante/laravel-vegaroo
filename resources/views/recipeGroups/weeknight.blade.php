@extends('layouts.app')

<title>6 Easy Weeknight Vegan Dinner Recipes</title>
<meta name="description" content="ToDo"/>

@section('content')

@include('partials.nav')

<div class="container">
    @foreach ($recipes as $recipe)
        @include('partials.full-screen-recipe')
    @endforeach
</div>
@endsection
