@extends('layouts.app')

<title>10 Vegan Recipes Compatabile With A Raw Food Diet</title>
<meta name="description" content="ToDo"/>

@section('content')

@include('partials.nav')

<div class="container">
    @foreach ($recipes as $recipe)
        @include('partials.full-screen-recipe')
    @endforeach
</div>
@endsection
