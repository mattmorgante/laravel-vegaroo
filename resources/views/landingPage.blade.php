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
            <h3><a href="/vegan-recipes"></a>Recipes</h3>
            <p>Deadly simple and lightning quick vegan recipes that won't break the bank</p>
        </div>

        <div class="homepage-hero" id="homepage-2">
            <h3><a href="/resources"></a>Resources</h3>
            <p>Why should you consider eating more plant-based foods? How is it even possible?</p>
        </div>

        <div class="homepage-hero" id="homepage-3">
            <h3><a href="/tools"></a>Tools</h3>
            <p>Reduce your environmental impact and improve your health starting today</p>
        </div>
    </div>
    <div class="hero">
        <h2 class="landing-page-title title">Why?</h2>
    </div>

    <div class="flexible_row">
        <ul class="flexible_row">
            <li class="row_item article_item"><a class="large_title" href="/environmental-benefits">For the planet<img
                            class="tiny_img" src="/img/plants_tn.jpg" alt="Plants reduce carbon dioxide in the
                            atmosphere"></a></li>
            <li class="row_item article_item"><a class="large_title" href="/health-benefits-long-term">For your health<img
                            class="tiny_img" src="/img/berries_tn.jpg" alt="Eating Vegan is the easiest way to avoid
                            disease"></a></li>
            <li class="row_item article_item"><a class="large_title" href="/stop-animal-cruelty">
                    <span class="homepage_articles_text">For the
                    animals</span><br><img
                            class="tiny_img" src="/img/cow_tn.jpg" alt="Billions of animals are killed each year to
                            feed humans"></a></li>
        </ul>
    </div>

    <div class="hero">
        <h2 class="landing-page-title title">Vegaroo is here to help</h2>
    </div>

    @include('partials.tools')
    <br>
    <!--    Links to calculator, quiz, one line of sample recipes (random??), one sample article -->
</div>



@endsection
