@extends('layouts.app')

@include('partials.nav')
@section('content')

<div class="container">
  <h1>{{ $food->name}}</h1>

  <div class="flexible_row">
    <div class="row_item">
      <h2>Examples</h2>
    </div>

    <div class="row_item">
      <h2>Serving Size</h2>
      <p>{{ $food->servingSize}}</p>
      <h2>Recommended Servings Per Day</h2>
      <p>{{ $food->recommended }}</p>
    </div>

  </div>

  <div class="flexible_row">
    <div class="row_item">
        <h2>Health benefits</h2>
    </div>

  </div>

  <p>images</p>

  <h3>Recipes containing {{ $food->name }}</h3>
  <div class="flexible_row">
      @foreach ($recipes as $recipe)
          @include('partials.recipe-box')
      @endforeach
  </div>






</div>

@endsection
