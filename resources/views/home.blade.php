@extends('layouts.app')

@include('partials.nav')
<div class="container">
    <div class="hero">

        <h1>Vegaroo: Not Another Vegan Food Blog</h1>
        <h2>Simple, easy, cheap, nutritious, and delicious plant-based meals</h2>
        <hr>

        <h2>Vegaroo has a strict no-tolerance policy</h2>
        <ul class="hero-list">
            <li><strong>No</strong> fancy ingredients</li>
            <li><strong>No</strong> recipes longer than 30 minutes</li>
            <li><strong>No</strong> bland meals</li>
            <li><strong>No</strong> complicated cooking techniques</li>
            <li><strong>No</strong> food porn</li>
        </ul>
    </div>
    <hr>

    <h3>What are you in the mood for?</h3>
    <ul class="flexible_row">
        <div class="row_item"><a href="#breakfasts">Breakfasts</a></div>
        <div class="row_item"><a href="#grainbowls">Grain Bowls</a></div>
        <div class="row_item"><a href="#curry">Curries</a></div>
        <div class="row_item"><a href="#salads">Salads</a></div>
    </ul>

    <div id="footer"><!-- flex container -->
        <div class="join_slack"><!-- flex item -->
            <h3><a class="article_link" href="/recipes">All Recipes</a></h3>
        </div>
    </div>

    <h3>Why To Eat More Fruits and Vegetables</h3>
    <ul class="flexible_row">
        <li class="row_item article_item"><a class="article_link" href="/environmental-benefits">Join the #resistance against Climate Change</a></li>
        <li class="row_item article_item"><a class="article_link" href="/health-benefits-short-term">Lose Weight and Gain More Energy</a></li>
    </ul>

    <div class="flexible_row">
        <div class="row_item article_item"><a class="article_link" href="/health-benefits-long-term">Prevent Heart Disease, Cancer & more</a></div>
        <div class="row_item article_item">
            <a href="/stop-animal-cruelty" class="article_link">
                Stop Animal Cruelty</a>
        </div>
    </div>

    <h3>How To Eat More Fruits and Vegetables</h3>
    <ul class="flexible_row">
        <li class="row_item article_item"><a class="article_link" href="/vegan-on-a-budget">How To Eat Vegan On A Budget</a></li>
        <li class="row_item article_item"><a class="article_link" href="/pantry">How To Stock Your Pantry As A Vegan</a></li>
    </ul>

    <h3>Climate Calculator</h3>
    <div class="flexible_row">
        <div class="row_item article_item">
            <a href="/calculator" class="article_link">
            Understand The Environmental Impact Of Your Diet</a>
        </div>
    </div>

    <h3 id="breakfasts">Breakfasts</h3>
    <ul class="flexible_row">
        @foreach ($breakfasts as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3 id="grainbowls">Grain Bowls</h3>
    <ul class="flexible_row">
        @foreach ($bowls as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3 id="curry">Curries</h3>
    <ul class="flexible_row">
        @foreach ($curry as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3 id="salads">Salads</h3>
    <ul class="flexible_row">
        @foreach ($salads as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>


    {{--<h3>Stir-Fry</h3>--}}
    {{--<ul class="flexible_row">--}}
        {{--@foreach ($stirFry as $recipe)--}}
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

    <div id="footer"><!-- flex container -->
        <div class="join_slack"><!-- flex item -->
            <h3><a class="article_link" href="https://www.slack.vegaroo.com">Join The Community</a></h3>
        </div>
    </div>

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

    <div class="footer">
        <p>Made with &#x2615 & &#x1F34E & &#x1F346 in Amsterdam by <a href="https://www.mattmorgante.com">Matt</a></p>
    </div>
</div>