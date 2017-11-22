@extends('layouts.app')

@section('content')

@include('partials.nav')


@foreach ($recipes as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <a href="/recipes/{{ $recipe->slug }}">
                    <h1>{{ $recipe->title }}</h1>
                    <p>{{ $recipe->description }}</p>
                </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
<br>

@endsection