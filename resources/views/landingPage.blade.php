@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero">
    <h1 class="landing-page-title title">Vegaroo Makes It Easier To Eat Plant-Based Foods</h1>

      <div class="hero">
          <div class="hero-list-wrapper">
              <h3>Recipes, information, and tools for the aspiring vegan</h3>
              <ul class="hero-list">
                  <li>Lose weight</li>
                  <li>Eat ethically</li>
                  <li>Clear up your skin</li>
                  <li>Lower your body fat</li>
                  <li>Save the environment</li>
              </ul>
          </div>
      </div>
  </div>
    <br>

</div>

<div class="homepage_container_grey">
    <div class="container">
        <div class="hero">
            <h2 class="title">Eating vegan should be easy, cheap, nutritious and delicious
                    </h2>
        </div>
        <ul class="flexible_row">
            @foreach ($recipes as $recipe)
                @include('partials.recipe-box')
            @endforeach
        </ul>
        <div class="read-more">
            <a href="/vegan-recipes">All Recipes<i style="margin-left: 6px;" class="fas fa-arrow-right"></i></a>
        </div>
    </div>
    <br>
</div>

<div class="homepage_container_grey">
    <div class="container">
    <div class="hero">
        <h2 class="title">Tools to get you started</h2>
    </div>
    <div class="flexible_row">
        <ul class="flexible_row">
            <li class="row_item article_item"><a class="large_title" href="/dashboard">Am I Getting Enough
                    Nutrients?<img
                            class="tiny_img" src="/img/veg_tn.jpg" alt="Track
    Your Progress with the Daily Dozen"></a></li>
            <li class="row_item article_item"><a class="large_title" href="/calculator">Environmental
                    Impact Calculator
                    <img class="tiny_img" src="/img/charts_tn.jpg" alt="Calculate The Environmental Impact Of Your Dieto"></a></li>
            <li class="row_item article_item"><a class="large_title" href="/small-steps">
                    <span class="homepage_articles_text">7 Small Steps To Begin Your Vegan Journey</span><br><img
                            class="tiny_img" src="/img/step_tn.jpg" alt="Taking small steps towards veganism can easily add up over time"></a></li>
        </ul>
    </div>

    <br>

</div>


<div class="homepage_container_white">
    <div class="container">
        <div class="hero">
            <h2 class="title">Why should you consider eating more plant-based foods?</h2>
        </div>
        <div class="flexible_row">
            <ul class="flexible_row">
                <li class="row_item article_item"><a class="large_title" href="/environmental-benefits">For our
                        planet<img
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
        <div class="read-more">
            <a href="/resources">All Resources<i style="margin-left: 6px;" class="fas fa-arrow-right"></i></a>
        </div>
        <br>
    </div>
</div>

@endsection
