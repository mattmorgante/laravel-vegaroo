@extends('layouts.app')

<title>Easy & Cheap Vegan Recipes With {{ $food->name }}</title>
<meta name="description" content="Vegaroo has easy and nutritious plant-based recipes containing {{ $food->name }} you can prepare in 30 minutes or less without using any fancy ingredients "/>

@include('partials.nav')
@section('content')

<div class="container">
  <h1 style="margin: 10px;">{{ $food->name}}</h1>

    <h3 class="food-description">{{ $food->description }}</h3>

  <div class="flexible_row">
    <div class="row_item">
      <h2>Examples</h2>
      <p>{{ ucwords($food->examples) }}</p>
    </div>

    <div class="row_item">
      <h2>Serving Size</h2>
      <p>{{ $food->servingSize}}</p>
      <h2>Recommended Servings Per Day: {{ $food->recommended }}</h2>
    </div>
  </div>

  <h3>Recipes containing {{ $food->name }}</h3>
      @foreach ($recipes as $recipe)
        @if ($loop->iteration % 4 == 1 )
        <div class="flexible_row">
          @endif

          @include('partials.recipe-box')
          @if ( ($loop->iteration % 4 ==0) or ($loop->last) )
            </div>
          @endif
      @endforeach
</div>

@endsection
