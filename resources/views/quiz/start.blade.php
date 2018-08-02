@extends('layouts.app')

@section('header.javascript')

@endsection

@section('content')

@include('partials.nav')

<div class="container">
    <div class="start-quiz">
        <h2>Personalized Suggestions To Reduce The Environmental Impact Of Your Diet</h2>
        <div class="btn-wrapper">
            <a href="/vegan-quiz/{{ $hashed_id }}/1">
                <button class="quiz-btn btn">
                    Let's Go!
                </button>
            </a>
        </div>
    </div>
</div>

<br>
@endsection
