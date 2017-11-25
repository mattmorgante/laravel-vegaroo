@extends('layouts.app')

@section('content')

@include('partials.nav')

<div class="article_wrapper">
    <div class="article_container">
        <h1 class="title">10 Small Steps You Can Take Today To Begin Your Vegan Journey</h1>
        <h3 class="content"><i>Even though the rise of plant-based meat and dairy substitutes has made reducing your animal product intake easier than ever, it can be daunting to make a big change. Here are ten small actions you can take today to get you moving in the right direction.</i></h3>
    </div>
</div>

<br>

<img class="article_header_image" src="/img/step.jpg" alt="Eating Vegan is the easiest way to avoid disease">

<div class="article_wrapper">
    <div class="article_container">
        <p>Over time, small daily actions can create big differences in your well-being and environmental impactO</p>
        <ol>
            <li class="research">Milk to Almond Milk</li>
            <li class="research">Beef to Chicken</li>
            <li class="research">Yogurt to Soy Yogurt</li>
            <li class="research">Regular Meat to Organic</li>
            <li class="research">Cheese to Vegan Mozzarella</li>
            <li class="research">Cook A Vegetarian Dinner</li>
            <li class="research">Eat Out At A Vegetarian Restuarant</li>
            <li class="research">Meatballs to Falafel</li>
            <li class="research">Butter to Plant-Based Butter</li>
            <li class="research">Meatless Monday</li>
        </ol>

        * take small steps
        * build positive momentum with the habit loop
        * prepare your responses to common questions

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

@endsection