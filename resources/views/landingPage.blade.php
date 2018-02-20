@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easier</title>

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero">
    <h1 class="title">Tools, recipes and resources to help you eat more plant-based foods.</h1>
  </div>
  <br>

    <h2 style="margin: 20px;">Track the <a href="/vegan-foods">Daily Dozen</a>: what have you eaten today?</h2>
  @if ( Auth::guest() )
      @include('partials.daily-dozen')
        <div class="hero">

            <h1 class="title">Why Join Vegaroo?</h1>

            <div class="hero-list-wrapper">
                <ul class="hero-list">
                    <li>&#x2705	Track the <a href="/vegan-foods">Daily Dozen</a></li>
                    <li>&#x1F4C8 Get Weekly Nutrition Reports</li>
                    <li>&#x2B50 Save Favorite Recipes</li>
                    <li>&#x1F477 Influence new feature development</li>
                </ul>
            </div>
        </div>
      <div class="btn-wrapper">
        <a class="btn" href="/register">Join Vegaroo</a>
      </div>
  @else
    <div class="btn-wrapper">
      <a class="btn" href="/home">My Dashboard</a>
    </div>
  @endif
    <br>

    <h2>What are you in the mood for?</h2>
    <ul class="flexible_row">
        <div class="row_item"><a href="/vegan-recipes#grainbowls">Grain Bowls</a></div>
        <div class="row_item"><a href="/vegan-recipes#curry">Curries</a></div>
        <div class="row_item"><a href="/vegan-recipes#stir-fries">Stir Fries</a></div>
        <div class="row_item"><a href="/vegan-recipes/popular">Most Popular</a></div>
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
