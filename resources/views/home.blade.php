@extends('layouts.app')

@include('includes.seo')

@section('content')

@include('partials.nav')
<div class="container">
    <div class="hero">

        <h1 class="title">Simple, easy, cheap, nutritious and delicious plant-based meals</h1>

        <div class="hero-list-wrapper">
            <h3>Vegaroo has a strict no-tolerance policy</h3>
            <ul class="hero-list">
                <li>&#x1F644 <strong>No</strong> fancy ingredients</li>
                <li>&#x23F1 <strong>No</strong> recipes longer than 30 minutes</li>
                <li>&#x1F35A <strong>No</strong> bland meals</li>
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
    <h2 class="other-recipes">Tools, recipes, and resources to help aspiring vegans</h2>
    <div class="btn-wrapper">
      <a class="btn" href="/register">Join Vegaroo</a>
    </div>

    @include('partials.stir-fries')

    @include('partials.salads')

    @include('partials.breakfasts')

    @include('partials.snacks')

    @include('partials.smoothies')


    {{--<h3>Classics</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($classics as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    {{--<div id="footer"><!-- flex container -->--}}
        {{--<div class="join_slack"><!-- flex item -->--}}
            {{--<h3><a class="article_link" href="https://vegaroo.slack.com">Join The Community</a></h3>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<h3>Sides</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($sides as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

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
</div>

@endsection
