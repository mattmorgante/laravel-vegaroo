@extends('layouts.app')

@include('includes.seo')

@section('content')

@include('partials.nav')
<div class="container">
    <div class="hero">
        <h1 class="title">Easy, cheap, nutritious and delicious plant-based meals</h1>
    </div>

    <div class="hero">
        <div class="hero-list-wrapper">
            <h3>Vegaroo recipes have a strict no-tolerance policy</h3>
            <ul class="hero-list">
                <li>&#x23F1 <strong>No</strong> recipes longer than 30 minutes</li>
                <li>&#x1F644 <strong>No</strong> fancy ingredients</li>
                <li>&#x1F35A <strong>No</strong> tasteless meals</li>
                <li>&#x1F914 <strong>No</strong> complicated cooking techniques</li>
                <li>&#x1F346 <strong>No</strong> food porn</li>
            </ul>
        </div>
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
    @if ( Auth::guest() )
        <h2 class="other-recipes">Tools, recipes and resources to help you eat more plant-based foods.</h2>
        <div class="btn-wrapper">
            <a class="btn" href="/register">Join Vegaroo</a>
        </div>
    @endif

    @include('partials.stir-fries')

    @include('partials.salads')

    @include('partials.breakfasts')

    @include('partials.snacks')

    @include('partials.smoothies')
</div>

@endsection
