@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="homepage_container_white">
<div class="container">
  <div class="hero homepage-header">
    <div class="wrapper">
    <h1 class="landing-page-title title" style="margin: 0">Vegaroo makes it easier to eat a <br><span class="keyword"
                style="color: #26ce81;">healthy</span><br> plant-based diet</h1>
      <br><br>
        </div>
      <div class="hero">
          <div class="hero-list-wrapper" style="text-align: center">
              <h3>How does it work?</h3>
              <ul class="hero-list">
                  <li>&#x2705 Track your foods</li>
                  <li>&#x1F60B Get recipe recommendations</li>
                  <li>&#x1F4C8 Analyze your diet</li>
                  <li>&#x1F64C Achieve your goals</li>
              </ul>
          </div>
      </div>
  </div>
    <br>
    <br>
    <br><br>
</div>
</div>


<div class="homepage_container_grey">

    <div class="hero">
        <h2 class="title">Eating less animal products helps you...</h2>
    </div>

    <div class="custom-flex-grid">
        <div class="col homepage_goals">
            <p>Lose Weight</p>
        </div>
        <div class="col homepage_goals">
            <p>Lower your risk of disease</p>
        </div>

        <div class="col homepage_goals">
            <p>Have More Energy</p>
        </div>
    </div>
    <div class="custom-flex-grid">
        <div class="col homepage_goals">
            <p>Protect The Environment</p>
        </div>
        <div class="col homepage_goals">
            <p>Reduce Animal Suffering</p>
        </div>
    </div>
    <br><br>
</div>

<div class="homepage_container_white">
    <div class="container">
        <div class="quotes">
            <h4 class="homepage-quote">"But I'm too busy to cook vegan meals!"</h4>
            <h4 class="homepage-quote">"But I can't find those fancy vegan ingredients at my grocery store!"</h4>
            <h4 class="homepage-quote">"But vegan food is bland!"</h4>
            <h4 class="homepage-quote">"But vegan recipes are always so complicated!"</h4>
        </div>

        <div class="hero">
            <div class="hero-list-wrapper">
                <h3>Vegaroo recipes have a strict no-tolerance policy</h3>
                <ul class="hero-list">
                    <li>&#x23F1 <strong>No</strong> recipes longer than 30 minutes</li>
                    <li>&#x1F644 <strong>No</strong> fancy ingredients</li>
                    <li>&#x1F35A <strong>No</strong> tasteless meals</li>
                    <li>&#x1F914 <strong>No</strong> complicated cooking techniques</li>
                    <li>&#x1F346 <strong>No</strong> food porn</li>
                </ul>
            </div>
        </div>
    </div>
    <br>
</div>

<div class="homepage_container_grey">
   <div class="container">
       <div class="landing-page-title" style="text-align: center;">How does it work?</div>
       <div class="features-wrapper">
           <div>
               <h2 class="landing-page-h2">&#x2705 Track</h2>
               <h3 class="features-text">It can be tough to get enough nutrients on a Vegan diet. Vegaroo has you
                   covered with food group tracking to make sure you get enough Protein, Iron, B12, and more.</h3>
           </div>
           <div class="photo">
               <img id="phone-pic" src="/img/iphone-3.png">
           </div>
       </div>
   </div>
</div>

    <div class="homepage_container_white">
        <div class="container">
            <div class="hero">
                <h2 class="landing-page-h2">&#x1F60B Eat</h2>
                <h3 style="font-size: 24px; line-height: 2;">Based on your diet and goals, Vegaroo will provide personalized recipe
                    recommendations.
                    <br>Here are
                    some of the most popular:</h3>
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
    <div class="features-wrapper">
        <div>
            <h2 class="landing-page-h2">&#x1F4C8 Improve</h2>
            <p class="features-text">Need to eat more fruits? More nuts? Vegaroo's nutrition reporting helps you to
                identify the holes in your diet and find recipes to improve.</p>

        </div>
        <img id="desktop-pic" src="/img/desktop.png">
        </div>
    <div class="btn-wrapper">
        <a class="btn" href="/register">Get Started For Free</a>
    </div>
    <br>
</div>




@endsection

<script>
    var keywords = ["healthy", "sustainable", "ethical", "cheap"];
    var colours = ["#26ce81", "#26ce81", "#26ce81", "#26ce81"];
    var count = 1;
    setInterval(function(){
        $("span.keyword").fadeOut(400, function(){
            $(this).html(keywords[count]).css("color", colours[count]);
            count++;
            if(count === keywords.length)
                count = 0;
            $(this).fadeIn(400);
        });
    }, 2000);
</script>
