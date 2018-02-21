@extends('layouts.app')

<title>The healthiest plant-based foods</title>
<meta name="description" content="The healthiest plant-based foods to prevent disease and lose weight"/>

@section('content')

    @include('partials.nav')

    <div class="container">
    <h1 class="other-recipes">The Daily Dozen</h1>

    <p style="text-align: center;">The <a target="_blank" href="https://nutritionfacts.org/video/dr-gregers-daily-dozen-checklist/">Daily Dozen</a> is a collection of daily recommendations to prevent the 14 biggest causes of death and improve your health.</p>

    <div class="btn-wrapper">
    @if ( Auth::guest() )
        <a class="btn" href="/register">Join Vegaroo to track your progress</a>
    @else
        <a class="btn" href="/home">My Dashboard</a>
    @endif
    </div>
        <br>

    @foreach ($foods as $food)
        @if ($loop->iteration % 4 == 1 )
            <div class="flexible_row">
                @endif
                <div class="row_item">
                    <a href="/vegan-foods/{{$food->slug}}">
                        <h2>{{ $food->name }}</h2>
                        <p style="color:black;">Serving Size: {{ $food->servingSize }}</p>
                        <p style="color:black;">Recommended Servings: {{ $food->recommended }}</p>
                    </a>
                </div>
                @if ( ($loop->iteration % 4 ==0) or ($loop->last) )
            </div>
        @endif
    @endforeach
    </div>

    <br>
    <br>
@endsection