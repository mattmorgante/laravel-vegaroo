@extends('layouts.app')

<title>Vegaroo | Tools, recipes and resources to make going plant-based easy</title>
@include('includes.seo')

@section('content')

@include('partials.nav')

<div class="container">
      @if ( Auth::guest() )
        <div class="hero">
        <h2>What is this?</h2>

        <p>Eat <a href="/vegan-foods">these 12 vegan foods</a> every day to ensure you are getting enough nutrients and
                avoiding the 14 leading causes
            of death.</p>
            <p><p>Fill in what you've eaten today!<p></p>
        </div>


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
        @include('partials.daily-dozen')
    <br>
</div>

@endsection
