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
                      <li>&#x2705 Track food groups</li>
                      <li>&#x1F60B Get recipe recommendations</li>
                      <li>&#x1F4C8 Analyze your diet</li>
                      <li>&#x1F64C Achieve your goals</li>
                  </ul>
              </div>
          </div>
      </div>
        <br><br>
    </div>
</div>


<div class="homepage_container_grey">
    <div class="container">
        <div class="hero">
            <h2 class="title">Eating less animal products helps you...</h2>
        </div>

        <div class="custom-flex-grid">
            <div class="col homepage_goals">
                <p>Lose weight</p>
            </div>
            <div class="col homepage_goals">
                <p>Lower the risk of disease</p>
            </div>

            <div class="col homepage_goals">
                <p>Have more energy</p>
            </div>
        </div>
        <div class="custom-flex-grid">
            <div class="col homepage_goals">
                <p>Protect the environment</p>
            </div>
            <div class="col homepage_goals">
                <p>Reduce animal suffering</p>
            </div>
        </div>
        <br><br>
    </div>
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
                <h3>Vegaroo has a strict no-tolerance policy</h3>
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
       <div class="hero">
        <div class="title" id="subtitle">How does it work?</div>
       </div>
       <div class="features-wrapper">
           <div>
               <h2 class="landing-page-h2">1. Track &nbsp;&#x2705</h2>
               <p class="features-text">It can be tough to get enough nutrients on a plant-based diet. Vegaroo has you
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
        <div style="padding: 30px;">
            <h2 class="landing-page-h2">2. Eat &nbsp;&#x1F60B</h2>
            <p class="recipes-text">Based on your diet and goals, Vegaroo will provide
                personalized recipe
                recommendations.
                <br>Here are some of the most popular:</p>
            <ul class="flexible_row">
                @foreach ($recipes as $recipe)
                @include('partials.recipe-box')
                @endforeach
            </ul>
            <div class="read-more">
                <a href="/vegan-recipes">All Recipes<i style="margin-left: 6px;" class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <br>
</div>

<div class="homepage_container_grey">
    <div class="container">
        <div class="features-wrapper" id="desktop-wrapper">
            <div>
                <h2 class="landing-page-h2">3. Improve &nbsp;&#x1F4C8</h2>
                <p class="features-text">Need to eat more fruits? More nuts? Vegaroo's nutrition reporting helps you to
                    identify the holes in your diet and find ways to improve.</p>

            </div>
            <img id="desktop-pic" src="/img/desktop.png">
            </div>
        <div class="btn-wrapper">
            <a id="call_to_action_btn" class="btn" href="/register">Get started for free</a>
        </div>
        <br>
    </div>
</div>
@endsection

<script>
    var keywords = ["healthy", "sustainable", "conscious", "cheap", "simple"];
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