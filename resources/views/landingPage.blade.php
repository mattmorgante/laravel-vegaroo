@extends('layouts.app')

<title>Tools, recipes and resources to make going plant-based easier</title>

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero">
    <h1 class="title">Easy recipes, helpful tools, and simple resources to help you eat more plant-based foods.</h1>
  </div>

  <h3>What are you in the mood for?</h3>
  <ul class="flexible_row">
      <div class="row_item"><a href="/vegan-recipes#grainbowls">Grain Bowls</a></div>
      <div class="row_item"><a href="/vegan-recipes#curry">Curries</a></div>
      <div class="row_item"><a href="/vegan-recipes#stir-fries">Stir Fries</a></div>
  </ul>
  <ul class="flexible_row">
      <div class="row_item"><a href="/vegan-recipes#salads">Salads</a></div>
      <div class="row_item"><a href="/vegan-recipes#breakfasts">Breakfasts</a></div>
      <div class="row_item"><a href="/vegan-recipes#snacks">Snacks</a></div>
      <div class="row_item"><a href="/vegan-recipes#smoothies">Smoothies</a></div>
  </ul>

  <div class="btn-wrapper">
    <a class="btn" href="/vegan-recipes">All Recipes</a>
  </div>
  @include('partials.why')

  <div class="flexible_row">
      <div class="row_item">
          <h3><a href="/calculator">Calculate The Environmental Impact Of Your Diet</a></h3>
      </div>
      <div class="row_item">
          <h3><a href="/values">Understand Vegaroo's Values</a></h3>
      </div>
  </div>

  @include('partials.how')

  <div class="btn-wrapper">
    <a class="btn" href="/resources">All Resources</a>
  </div>
  <br>

</div>




@endsection
