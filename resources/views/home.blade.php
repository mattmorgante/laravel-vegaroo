@extends('layouts.app')

@include('includes.seo')

@section('content')

@include('partials.nav')
<div class="container">
    <div class="hero">
        <h1 class="title">Simple, easy, cheap, nutritious and delicious plant-based meals</h1>
    </div>

    <h3>What are you in the mood for?</h3>
    <ul class="flexible_row">
        <div class="row_item"><a href="#grainbowls">Grain Bowls</a></div>
        <div class="row_item"><a href="#curry">Curries</a></div>
        <div class="row_item"><a href="#stir-fries">Stir Fries</a></div>
        <div class="row_item"><a href="/vegan-recipes/popular">Most Popular</a></div>
    </ul>
    <ul class="flexible_row">
        <div class="row_item"><a href="#salads">Salads</a></div>
        <div class="row_item"><a href="#breakfasts">Breakfasts</a></div>
        <div class="row_item"><a href="#snacks">Snacks</a></div>
        <div class="row_item"><a href="#smoothies">Smoothies</a></div>
    </ul>


    @include('partials.grain-bowls')

    @include('partials.curries')

<br>
    <h2 class="other-recipes">Tools, recipes and resources to help you eat more plant-based foods.</h2>
    <div class="btn-wrapper">
      <a class="btn" href="/register">Join Vegaroo</a>
    </div>

    @include('partials.stir-fries')

    @include('partials.salads')

    @include('partials.breakfasts')

    @include('partials.snacks')

    @include('partials.smoothies')
</div>

@endsection
