@extends('layouts.app')

@include('includes.seo')

@section('content')

@include('partials.nav')
<div class="container">
    @foreach ($ingredients as $ingredient)
        <p>{{ $ingredient->name }}</p>
    @endforeach 
</div>

@endsection 