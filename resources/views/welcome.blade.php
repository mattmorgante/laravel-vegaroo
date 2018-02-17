@extends('layouts.app')

@include('partials.nav')
@section('content')

<div class="container">
  <div class="user-nav">
    <a href="/home">Daily</a>
    <a href="/weekly">Weekly</a>
    <a class="active-nav-item" href="#">Profile</a>
  </div>
  <h2>Welcome To Vegaroo, {{  Auth::user()->name }}!</h2>

  <h2 class="btn-wrapper">My Favorite Recipes</h2>
  @foreach($savedRecipes as $recipe)
    @if ($loop->iteration % 4 == 1 )
      <div class="flexible_row">
        @endif

        @include('partials.recipe-box')
        @if ( ($loop->iteration % 4 ==0) or ($loop->last) )
      </div>
    @endif
  @endforeach
  <h2 class="btn-wrapper">FAQ</h2>
  <h3>Wut da heck is this?</h3>
  <ul>
    <li>Vegaroo is my attempt to use technology to make it easier for people to eat more fruits, vegetables and other plant-based foods.</li>
  <br>

  <li>Is there something you'd like to see? Feel free to check out the
    <a href="https://trello.com/b/x8TcQZOi/vegaroo-pipeline">Feature Pipeline</a> or <a href="mailto:matthewmorgante@gmail.com?Subject=Vegaroo" target="_top">get in touch</a>.</li>
      </ul>

  <h3>Why should I eat these foods?</h3>

  <ul>
    <li>At the simplest possible level, these foods are scientifically proven to prevent the leading causes of death, as documented in the book <a target="_blank" href="http://amzn.to/2AZGPxU">How Not To Die</a></li>
    <br>
    <li>However, there's a multitude of reasons to consider eating more plants and fewer animal products. Maybe you're interested in <a href="/environmental-benefits">fighting back against climate change,</a>
      <a href="/health-benefits-long-term">improving your health</a> or <a href="/stop-animal-cruelty"> preventing animal cruelty.</a> Whatever your reason, I'm glad to have you here at Vegaroo!</li>
  </ul>

  <h3>This shit is tough, I need help going Vegan!</h3>
  <ul>
    <li>May I not so humbly suggest our <a href="/resources">Vegan Resources</a> or <a href="/recipes">Vegan Recipes</a> to get you started in the right direction?</li>


  </ul>

  <div class="btn-wrapper">
    <a class="btn" href="/home">
      My Dashboard
    </a>
  </div>

  <br>

  </div>
</div>


@endsection
