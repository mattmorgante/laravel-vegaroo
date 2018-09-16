@extends('layouts.app')

<title>Vegaroo User Profile</title>
<meta name="description" content="Access all your personal account information on Vegaroo"/>

@include('partials.nav')
@section('content')

<div class="container">
  <div class="user-nav">
    <a href="/home">Daily</a>
    <a href="/weekly">Weekly</a>
    <a class="active-nav-item" href="#">Saved Recipes</a>
  </div>
  <h2 class="btn-wrapper">My Favorite Recipes</h2>
  @if(count($savedRecipes) == 0 )
    <h2>Head on over to the <a href="/vegan-recipes">recipes page</a> and save your favorites to see them here</h2>
  @endif

  @foreach($savedRecipes as $recipe)
    @if ($loop->iteration % 4 == 1 )
      <div class="flexible_row">
        @endif

        @include('partials.recipe-box')
        @if ( ($loop->iteration % 4 ==0) or ($loop->last) )
      </div>
    @endif
  @endforeach
  <br>
  </div>
</div>
@endsection