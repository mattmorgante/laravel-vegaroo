@extends('layouts.app')

<title>Vegaroo is home to meals and resources for the aspiring vegan.</title>
<meta name="description" content="Vegaroo aims to improve the health of people, the planet, and all the animals we share the earth with through making it easy to go vegan."/>

@section('content')

@include('partials.nav')


<div class="container">
    <h2>About Vegaroo</h2>
    <p>Vegaroo is to help people who are interested in consuming fewer animal products and more fruits, vegetables, and whole grains. It is not the intention of Vegaroo to tell anyone what they should or should not eat.</p>

    <p>Whether it is because you want to improve your health, reduce your environmental impact, stop causing harm to animals, or for any other religious, cultural, or moral reasons, Vegaroo is here to help you on your plant-based journey.</p>

    <h2>Vegaroo Recipes Are:</h2>
    <ul>
        <li class="values"><span class="bold">Environmentally Friendly:</span> Vegaroo began as a desire to preserve the environment from the effects of climate change. To understand how what you eat effects the environment, please read our <a href="/environmental-benefits"><span class="link">environment manifesto</span></a> or play with our <a href="/calculator"><span class="link">climate calculator</span></a>.
        <li class="values"><span class="bold">Fast:</span> Every recipe on Vegaroo is ready in less than 30 minutes.</li>
        <li class="values"><span class="bold">Easy:</span> No recipes are dependent on complicated cooking techniques or special kitchen items. If you have a knife, cutting board, pots and pans, and an oven, you can make every recipe on Vegaroo!</li>
        <li class="values"><span class="bold">Accessible:</span> None of our recipes are dependent on special ingredients like hemp seed oil, nutritional yeast, or xantham gum. (WTF is that?) Everything should be available in a normal grocery store. If you encounter any items that you cannot find at your local grocery store, please contact us!</li>
        <li class="values"><span class="bold">Delicious:</span> Eating more vegetables should be enjoyable! We don't want to feel like you're missing out on something, so we've taken care to assemble excellent combinations of flavors that we love too.</li>
        <li class="values"><span class="bold">Nutritious:</span> People have different definitions of what a nutritious meal is. Here at Vegaroo, we believe that nutrition is an evolving science and are always open to learning new things about what constitutes a healthy diet. That being said, we believe that unprocessed plant-based foods are the healthiest foods to live a long and healthy life. For more, please read our <a href="/nutrition"><span class="link">nutrition manifesto.</span></a></li>
        <li class="values"><span class="bold">Flexible:</span> Many of our recipes are based on simple blueprints and can be edited to match whatever seasonal vegetables you have available</li>
        <li class="values"><span class="bold">No Food Porn:</span> we will never upload stylized and edited photos of otherwise perfectly normal dishes.
        </li>
    </ul>
</div>

@endsection