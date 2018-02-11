@extends('layouts.app')

@include('partials.nav')
@section('content')

<div class="container">
  <h1>{{ $food->name}}</h1>

  <div class="flexible_row">
    <div class="row_item">
      <h2>Examples</h2>
      <p>{{ $food->examples }}</p>
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
