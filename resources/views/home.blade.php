@extends('layouts.app')

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
        <div class="row_item"><a href="#breakfasts">Breakfasts</a></div>
        <div class="row_item"><a href="#grainbowls">Grain Bowls</a></div>
        <div class="row_item"><a href="#curry">Curries</a></div>
        {{--<div class="row_item"><a href="#salads">Salads</a></div>--}}
    </ul>


    <div class="btn-wrapper">
        <a class="btn" href="/recipes">All Recipes</a>
    </div>

    @include('partials.why')

    <div class="btn-wrapper">
        <a class="btn" href="/calculator">Calculate The Environmental Impact Of Your Diet</a>
    </div>

    @include('partials.how')

    <h3 class="section-title" id="breakfasts">Breakfasts</h3>
    <ul class="flexible_row">
        @foreach ($breakfasts as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3 class="section-title" id="grainbowls">Grain Bowls</h3>
    <ul class="flexible_row">
        @foreach ($bowls as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3 class="section-title" id="curry">Curries</h3>
    <ul class="flexible_row">
        @foreach ($curries as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    {{--<h3 class="section-title" id="salads">Salads</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($salads as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}


    {{--<h3>Stir-Fry</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($stirFries as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    {{--<h3>Classics</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($classics as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    {{--<h3>Snacks</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($snacks as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    {{--<div id="footer"><!-- flex container -->--}}
        {{--<div class="join_slack"><!-- flex item -->--}}
            {{--<h3><a class="article_link" href="https://vegaroo.slack.com">Join The Community</a></h3>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<h3>Smoothies</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($smoothies as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    {{--<h3>Sides</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($sides as $recipe)--}}
            {{--@include('partials.recipe-box')--}}
        {{--@endforeach--}}
    {{--</ul>--}}

    <br>
</div>

@endsection