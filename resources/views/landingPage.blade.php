@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero">
    <h1 class="title">Recipes, tools, and resources to help you eat more plant-based foods.</h1>
  </div>
  <br>

    <div class="hero">
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
    @include('partials.salads')
    @include('partials.breakfasts')
    @include('partials.snacks')
    @include('partials.smoothies')

    <div class="btn-wrapper">
        <a class="btn" href="/vegan-recipes">All Recipes</a>
    </div>

  @include('partials.tools')

  @include('partials.why')

  @include('partials.how')

  <div class="btn-wrapper">
    <a class="btn" href="/resources">All Resources</a>
  </div>
  <br>

</div>



@endsection
