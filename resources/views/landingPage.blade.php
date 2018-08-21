@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero homepage-header">
    <div class="wrapper">
    <h1 class="landing-page-title title" style="margin: 0">Vegaroo Makes It Easier To Eat A <span
                style="color: #26ce81;">Healthy</span> Plant-Based Diet</h1>
      <br><br>
        </div>
      <div class="hero">
          <div class="hero-list-wrapper" style="text-align: center">
              <h3>How does it work?</h3>
              <ul class="hero-list">
                  <li>&#x2705 Track your foods</li>
                  <li>&#x1F4C8 Analyze your diet</li>
                  <li>&#x1f4A1 Get recipe recommendations</li>
                  <li>&#x1F64C Achieve your goals</li>
              </ul>
          </div>
      </div>
  </div>
    <br>
    <br>
    <br><br>
</div>

<div class="homepage_container_grey">
    <div class="container">
        <div class="hero">
            <div class="homepage-flex-wrapper">
                <div>
                    <img id="phone-pic" src="/img/phone.png">
                </div>
                <div class="text_wrapper">
                    <h2 class="title">1. Track</h2>
                    <p>Make sure you are getting enough nutrients</p>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="homepage_container_white">
    <div class="container">
        <div class="hero">
            <div class="homepage-flex-wrapper">
                <div class="text_wrapper">
                    <h2 class="title">2. Analyze</h2>
                    <p>Find the holes in your diet</p>
                </div>

                <img id="desktop-pic" src="/img/desktop.png">
            </div>
        </div>
    </div>
</div>


<div class="homepage_container_grey">
    <div class="container">
        <div class="hero">
            <h2 class="title">3. Get Personalized Recipe Recommendations
                    </h2>
            <h3>All Vegaroo recipes are easy, cheap, nutritious and delicious</h3>
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

<div class="homepage_container_white">
    <div class="container">
        <div class="hero">
            <h2 class="title">4. Achieve your goals</h2>
            <h3>Why do you want to go Vegan?</h3>
        </div>

        <div class="custom-flex-grid">
            <div class="col homepage_goals" id="box-1" onclick="selectBox(1)">
                <p>Lose Weight</p>
            </div>
            <div class="col homepage_goals" id="box-1" onclick="selectBox(1)">
                <p>Save The Environment</p>
            </div>
            <div class="col homepage_goals" id="box-3" onclick="selectBox(3)">
                <p>Have More Energy</p>
            </div>
        </div>
        <div class="custom-flex-grid">
            <div class="col homepage_goals" id="box-1" onclick="selectBox(1)">
                <p>Reduce Animal Suffering</p>
            </div>
            <div class="col homepage_goals" id="box-3" onclick="selectBox(3)">
                <p>Lose Body Fat</p>
            </div>
        </div>

        <div class="btn-wrapper">
            <a class="btn" href="/register">Get Started</a>
        </div>
        <br><br>
    </div>
</div>

@endsection

<script>
//
//    function selectBox(box) {
//        var element = document.getElementById('box-' + box);
//        element.style.backgroundColor = "#26ce81";
//    }
</script>
