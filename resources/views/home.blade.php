@extends('layouts.app')

<div class="container">
    <div class="hero">
        <h1>Vegaroo</h1>
        <br>
        <h2>Easy, Cheap, and Delicious Vegetarian and Vegan meals</h2><h4>Because we could all use a few more fruits and vegetables</h4>
        <hr>
    </div>

    <h3>What are you in the mood for?</h3>
    <ul class="flexible_row">
        <li class="row_item">Breakfasts</li>
        <li class="row_item">Grain Bowls</li>
        <li class="row_item">Curries</li>
        <li class="row_item">Salads</li>
    </ul>
    <ul class="flexible_row">
        <li class="row_item">Stir Fries</li>
        <li class="row_item">Snacks</li>
        <li class="row_item">Smoothies</li>
        <li class="row_item">Classics</li>
    </ul>


    <h3>Breakfasts</h3>
    <ul class="flexible_row">
        <li class="row_item"><a href="/recipes/oatmeal-fruits">Oatmeal & Fruits</a><br>
            <div class="recipe_extras">
                <span class="price">$2.45</span>
                <span class="time">< 5 mins</span>
                <span class="nutrition_score">7/10</span>
            </div>
        </li>

        <li class="row_item"><a href="/recipes/granola-berries">Granola with Berries</a><br>
            <div class="recipe_extras">
                <span class="price">$2.45</span>
                <span class="time">< 5 mins</span>
                <span class="nutrition_score">4/10</span>
            </div>
        </li>

        <li class="row_item"><a href="/recipes/avocado-toast">Avocado on Toast</a><br>
            <div class="recipe_extras">
                <span class="price">$2.45</span>
                <span class="time">< 5 mins</span>
                <span class="nutrition_score">6/10</span>
            </div>
        </li>

        <li class="row_item"><a href="/recipes/protein-smoothie">Oatmeal Protein Smoothie</a><br>
            <div class="recipe_extras">
                <span class="price">$2.45</span>
                <span class="time">< 5 mins</span>
                <span class="nutrition_score">9/10</span>
            </div>
        </li>
    </ul>

    <h3>Why plant-based?</h3>
    <ul class="flexible_row">
        <li class="row_item"><a href="/health-benefits">Improve Your Health</a></li>
        <li class="row_item"><a href="/environmental-benefits">Prevent Climate Change</a></li>
        <li class="row_item"><a href="/stop-animal-cruelty">Stop Animal Cruelty</a></li>
    </ul>

    <h3>Salads</h3>
    <ul class="flexible_row">
        <li class="row_item"><a href="/recipes/oatmeal-fruits">Oatmeal & Fruits</a></li>
        <li class="row_item"><a href="/recipes/granola-berries">Granola with Berries</a></li>
        <li class="row_item"><a href="/recipes/avocado-toast">Avocado on Toast</a></li>
        <li class="row_item"><a href="/recipes/protein-smoothie">Oatmeal Protein Smoothie</a></li>
    </ul>

</div>