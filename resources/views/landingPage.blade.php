@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero">
    <h1 class="landing-page-title title">Vegaroo Makes It Easier To Eat More Plant-Based Foods</h1>
  </div>

    <div class="btn-wrapper">
        <a class="btn" href="/register">Join Vegaroo</a>
    </div>

    <div class="homepage-hero-wrapper" id="homepage-1">
        <div class="homepage-hero">
            <h3>Recipes</h3>
            <p>Deadly simple and lightning quick vegan recipes that won't break the bank</p>
            <a href="/vegan-recipes">Let's Get Cooking!</a>
        </div>

        <div class="homepage-hero" id="homepage-2">
            <h3>Resources</h3>
            <p>Why should you consider eating more plant-based foods? How is it even possible?</p>
            <a href="/resources">Start Here!</a>
        </div>

        <div class="homepage-hero" id="homepage-3">
            <h3>Tools</h3>
            <p>Reduce your environmental impact and improve your health starting today</p>
            <a href="/tools">Feel Better!</a>
        </div>
    </div>
    <br>

</div>



@endsection
