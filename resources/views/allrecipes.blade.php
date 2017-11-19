@extends('layouts.app')

@include('partials.nav')


@foreach ($recipes as $recipe)
    <div class="container">
        <div class="flexible_row">
            <div class="row_item">
                <h1>{{ $recipe->title }}</h1>
                <p>{{ $recipe->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
<br>
