@extends('layouts.app')

<title>8 High Protein Vegan Recipes</title>
<meta name="description" content="ToDo"/>

@section('content')

@include('partials.nav')

<div class="container">
    @foreach ($recipes as $recipe)
        @include('partials.full-screen-recipe')
    @endforeach
</div>
@endsection
