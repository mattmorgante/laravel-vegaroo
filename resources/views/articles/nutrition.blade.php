@extends('layouts.app')

@section('content')

@include('partials.nav')

<div class="article_wrapper">
    <div class="article_container">
        <h1 class="title">The Vegaroo Nutrition Manifesto</h1>
        <h3 class="content"><i>Nutrition is an evolving science. Despite vast progress, we still don't know everything about what constitutes the word "healthy." That being said, we can set some ground rules based on the scientific knowledge currently available.</i></h3>
    </div>
</div>
<br>
<img class="article_header_image" src="/img/veg.jpeg" alt="What to eat and why: the Vegaroo Nutrition Manifesto">

<div class="article_wrapper">
    <div class="article_container">
        <h2 class="subtitle">Fruits, Vegetables & Whole Grains: Eat As Much As You Want</h2>
        <p class="content">1% of americans receive recommended daily servings</p>
        <p class="content">The healthiest foods are unprocessed and plant-based (think fruits, vegetables, legumes and whole grains)</p>

        <p class="content">Dont sleep on spices!</p>

        <p class="content">To understand more about the positive health effects of vegetables, please read <a href="/health-benefits-long-term">Our Article On Health</a></p>

        <h2 class="content"></h2>

        <h2 class="subtitle"></h2>

        <h2 class="subtitle">Processed Plant-Foods: Eat Sparingly</h2>

        <p class="content">Processed plant-based foods can be unhealthy, depending on how they are prepared (don't forget that a diet consisting of beer, doritos, oreos, and french fries cooked in vegetable oil is vegan!)
            - Unprocessed animal foods are not healthy, but better than processed ones (like chicken breast, natural yogurt)</p>

        <h2 class="subtitle">Fish, Poultry & Dairy: Harmful, But Better Than Eating Carcinogens</h2>

        <h2 class="subtitle">Red Meat: Almost Carcinogens</h2>

        <h2 class="subtitle">Processed Meats: They Literally Cause Cancer</h2>

        <p class="content">Processed animal foods should be avoided at all costs (for example: hot dogs, lunch meats, flavored yogurts)
        </p>

        <p class="content">Replacing vegetables cures heart disease, cancer, diabetes, etc. (link to health-long-term)</p>

        <p class="content">To understand more about the negative health effects of meat and dairy products, please read <a href="/health-benefits-long-term">Our Article On Health</a></p>

        <h2 class="subtitle">Carbs, Fats & Protein</h2>

        <h2 class="subtitle">Fiber & Sugar</h2>

        <h2 class="subtitle">Environment First</h2>

        <h2 class="subtitle">Adapted from How Not To Die (link) </h2>
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