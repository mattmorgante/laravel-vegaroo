@extends('layouts.app')

@include('partials.nav')

<div class="article_wrapper">
    <div class="article_container">
        <h1 class="title">The Essentials For A Vegan Pantry</h1>
        <h3 class="content"><i>In order to easily maintain a vegan lifestyle, it helps to stock your cupboard well. Consider these the non-perishable essentials, making the recipes on vegaroo easier to manage.</i></h3>
    </div>
</div>

<img class="article_header_image" src="/img/berries.jpeg" alt="The essentials for a simple vegan pantry">

<div class="article_wrapper">
    <div class="article_container">

        <h2 class="subtitle">For Cooking</h2>

        <li class="content">Garlic</li>
        <li class="content">Onions</li>
        <li class="content">Olive Oil</li>
        <li class="content">Vegetable Oil</li>
        <li class="content">Coconut Oil</li>
        <li class="content">Coconut Milk</li>

        <h2 class="subtitle">Spices</h2>

        <li class="content">Salt & Pepper</li>
        <li class="content">Cayenne Pepper</li>
        <li class="content">Ginger Powder</li>
        <li class="content">Oregano</li>
        <li class="content">Dried Mint</li>
        <li class="content">Turmeric</li>
        <li class="content">Curry Powder</li>

        <h2 class="subtitle">Toppings</h2>

        <li class="content">Chia Seeds</li>
        <li class="content">Flax Seeds</li>
        <li class="content">Balsamic Vinegar</li>

        <h2 class="subtitle">Grains & Legumes</h2>
        <li class="content">Brown Rice</li>
        <li class="content">Quinoa</li>
        <li class="content">Oatmeal</li>
        <li class="content">Any Variety of Beans</li>
        <li class="content">Chickpeas</li>
        <li class="content">Lentils</li>
    </div>
</div>

<div class="footer_wrapper">
    <div class="footer_container">
        @include('partials.why')
        <br>
        <div class="btn-wrapper">
            <a target="_blank" class="btn" href="/recipes">All Recipes</a>
        </div>
    </div>
</div>