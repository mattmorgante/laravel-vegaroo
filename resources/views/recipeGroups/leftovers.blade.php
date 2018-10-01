@extends('layouts.app')

<title>6 Vegan Recipes Perfect For Leftovers</title>
<meta name="description" content="ToDo"/>

@section('content')

@include('partials.nav')

<div class="container">
    @foreach ($recipes as $recipe)
        @include('partials.full-screen-recipe')
    @endforeach
</div>
@endsection
