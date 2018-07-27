@extends('layouts.app')

@section('header.javascript')

@endsection

@section('content')

@include('partials.nav')

<div class="container">
    <p>Question {{ $question->id }} of 11</p>
    <h2>{{ $question->text }}</h2>
    @if($question->type == "input")
        # of servings: <input type="text" value="servings"><br>
    @elseif($question->type == "select")
        <input type="checkbox" value="1">{{ $question->option1 }}<br>
        <input type="checkbox" value="1">{{ $question->option2 }}<br>
        <input type="checkbox" value="1">{{ $question->option3 }}<br>
        <input type="checkbox" value="1">{{ $question->option4 }}<br>
    @elseif($question->type == "multiple-choice")
        <input type="radio" value="1">{{ $question->option1 }}<br>
        <input type="radio" value="1">{{ $question->option2 }}<br>
        <input type="radio" value="1">{{ $question->option3 }}<br>
        <input type="radio" value="1">{{ $question->option4 }}<br>
    @endif
    <button>Previous</button>
    <button>Next</button>
</div>

<br>
@endsection
