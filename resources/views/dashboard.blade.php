@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
      @if ( Auth::guest() )
        @include('partials.daily-dozen')
        <h2>How does this work?</h2>

        <p>The <a href="/vegan-foods">Daily Dozen</a> is a collection of daily recommendations to prevent the 14 biggest causes of death and improve your health. Get started by filling in what you've eaten today!<p>


        <div class="btn-wrapper">
            <a class="btn" href="/register">Want to save your progress? Join Vegaroo</a>
        </div>
        @else
        <h2>Looks like you're already signed in. Go to your dashboard to keep track of your progress over time!</h2>
        <div class="btn-wrapper">
            <a class="btn" href="/home">My Dashboard</a>
        </div>
    @endif
    <br>
</div>

@endsection
