@extends('layouts.app')

@include('includes.seo')

@section('content')

@include('partials.nav')
<div class="container">
    <h1>Pick your favorites to create a personalized recipe</h1>
    <h2>Greens</h2>
    @foreach ($greens as $green)
        <p>{{ $green->name }}</p>
    @endforeach
    <h2>Grains</h2>
    @foreach ($grains as $grain)
        <p>{{ $grain->name }}</p>
    @endforeach
    <h2>Beans</h2>
    @foreach ($beans as $bean)
    <p>{{ $bean->name }}</p>
    @endforeach
    <h2>Vegetables</h2>
    @foreach ($vegetables as $vegetable)
    <p>{{ $vegetable->name }}</p>
    @endforeach
    <h2>Topping</h2>
    @foreach ($toppings as $topping)
    <p>{{ $topping->name }}</p>
    @endforeach
</div>

@endsection 