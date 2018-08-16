@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
  <div class="hero homepage-header">
    <div class="wrapper">
    <h1 class="landing-page-title title" style="margin: 0">Vegaroo Makes It Easier To Eat Plant-Based Foods</h1>
      <h3>Simple resources, easy recipes, and useful tools to help you on your vegan journey</h3>
      <br><br>
        </div>
      <div class="hero">
          <div class="hero-list-wrapper" style="text-align: center">
              <h3>How does it work?</h3>
              <ul class="hero-list">
                  <li>&#x1F914 Pick your goals</li>
                  <li>&#x1F914 Track your foods</li>
                  <li>&#x1F4C8 Find the holes in your diet</li>
                  <li>&#x1F64C Get personalized recommendations</li>
              </ul>
          </div>
      </div>
  </div>
    <br>

</div>


<div class="homepage_container_grey">
    <div class="container">
        <div class="hero">
            <h2 class="title">What do you want to achieve?</h2>
        </div>

        <div class="custom-flex-grid">
            <div class="col homepage_goals">
                <p>Lose Weight</p>
            </div>
            <div class="col homepage_goals">
                <p>Reduce Animal Suffering</p>
            </div>
            <div class="col homepage_goals">
                <p>Save The Environment</p>
            </div>
        </div>

        <div class="custom-flex-grid">
            <div class="col homepage_goals">
                <p>Have More Energy</p>
            </div>
            <div class="col homepage_goals">
                <p>Get Enough Nutrients</p>
            </div>
        </div>

        <div class="btn-wrapper">
            <a class="btn" href="/register">Get Started</a>
        </div>
        <br><br>
    </div>
</div>

@endsection
