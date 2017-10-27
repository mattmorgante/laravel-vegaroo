@extends('layouts.app')

@include('partials.nav')
<div class="container">
    <div class="hero">
        <h2>Easy, Cheap, and Delicious Plant-Based Meals</h2><h4>Because eating more vegetables can't hurt!</h4>
        <hr>
    </div>

    <h3>Breakfasts</h3>
    <ul class="flexible_row">
        @foreach ($breakfasts as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3>Grain Bowls</h3>
    <ul class="flexible_row">
        @foreach ($bowls as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3>Why Vegaroo?</h3>
    <ul class="flexible_row">
        <li class="row_item article_item"><a class="article_link" href="/environmental-benefits">Join the #resistance against Climate Change</a></li>
        <li class="row_item article_item"><a class="article_link" href="/health-benefits-short-term">Lose Weight and Gain More Energy</a></li>
        <li class="row_item article_item"><a class="article_link" href="/health-benefits-long-term">Prevent Heart Disease, Cancer & more</a></li>
    </ul>

    <div class="flexible_row">
        <div class="row_item article_item"><a class="article_link" href="/about">About Vegaroo</a></div>

        <div class="row_item article_item">
            <a href="/stop-animal-cruelty" class="article_link">
                Stop Animal Cruelty</a>
        </div>
    </div>

    <h3>Salads</h3>
    <ul class="flexible_row">
        @foreach ($salads as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3>Climate Calculator</h3>
    <div class="flexible_row">
        <div class="row_item article_item">
            <a href="/calculator" class="article_link">
            Understand The Environmental Impact Of Your Diet</a>
        </div>
    </div>


    <h3>Curries</h3>
    <ul class="flexible_row">
        @foreach ($curry as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>


    <h3>Stir-Fry</h3>
    <ul class="flexible_row">
        @foreach ($stirFry as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3>Learn More</h3>
    <ul class="flexible_row">
        <li class="row_item article_item"><a class="article_link" href="/vegan-on-a-budget">How To Eat Vegan On A Budget</a></li>
        <li class="row_item article_item"><a class="article_link" href="/pantry">The Pantry Checklist</a></li>
        <li class="row_item article_item"><a class="article_link" href="/about">Learn More About Vegaroo</a></li>
    </ul>

    <h3>Classics</h3>
    <ul class="flexible_row">
        @foreach ($classics as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3>Snacks</h3>
    <ul class="flexible_row">
        @foreach ($snacks as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <div class="flexible_row">
        <div class="row_item">
            <a href="https://vegaroo.slack.com">Join The Community</a>
        </div>
    </div>

    <h3>Smoothies</h3>
    <ul class="flexible_row">
        @foreach ($smoothies as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <h3>Sides</h3>
    <ul class="flexible_row">
        @foreach ($sides as $recipe)
            @include('partials.recipe-box')
        @endforeach
    </ul>

    <br>
    <br>

    <div class="footer">
        <p>Made with plants in Amsterdam by <a href="https://www.mattmorgante.com">Matt</a></p>
    </div>




</div>