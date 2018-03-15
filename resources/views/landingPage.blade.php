@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easier</title>

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero">
    <h1 class="title">Tools, recipes and resources to help you eat more plant-based foods.</h1>
  </div>
  <br>

  @if ( Auth::guest() )
        <div class="hero">
            <div class="hero-list-wrapper">
                <ul class="hero-list">
                    <li>&#x2705	Track the <a href="/vegan-foods">Daily Dozen</a></li>
                    <li>&#x1F4A1 Receive personalized recipe suggestions</li>
                    <li>&#x1F4C8 Track weekly nutrition reports</li>
                    <li>&#x2B50 Save favorite recipes</li>
                    <li>&#x1F477 Influence new feature development</li>
                </ul>
            </div>
        </div>
    <h2 style="margin: 20px;">What have you eaten today?</h2>
      @include('partials.daily-dozen')
      <div class="btn-wrapper">
        <a class="btn" href="/register">Join Vegaroo</a>
      </div>
  @else
    <div class="btn-wrapper">
      <a class="btn" href="/home">My Dashboard</a>
    </div>
  @endif
    <br>

    <div class="hero">

        <h1 class="title">Vegaroo has only simple, easy, cheap, nutritious and delicious plant-based meals</h1>

        <div class="hero-list-wrapper">
            <h3>Vegaroo recipes have a strict no-tolerance policy</h3>
            <ul class="hero-list">
                <li>&#x1F644 <strong>No</strong> fancy ingredients</li>
                <li>&#x23F1 <strong>No</strong> recipes longer than 30 minutes</li>
                <li>&#x1F35A <strong>No</strong> bland meals</li>
                <li>&#x1F914 <strong>No</strong> complicated cooking techniques</li>
                <li>&#x1F346 <strong>No</strong> food porn</li>
            </ul>
        </div>
    </div>

    <h2 style="margin: 20px;">What are you in the mood for?</h2>
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




    @include('partials.grain-bowls')
    @include('partials.curries')
    @include('partials.stir-fries')

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
