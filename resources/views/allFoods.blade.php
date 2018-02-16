@extends('layouts.app')

<title>The healthiest plant-based foods</title>
<meta name="description" content="The healthiest plant-based foods to prevent disease and lose weight"/>

@section('content')

    @include('partials.nav')

    <div class="container">
    <h1 class="other-recipes">The Daily Dozen</h1>
        {{--todo: explain why these foods? --}}
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

@endsection