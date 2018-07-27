@extends('layouts.app')

@section('header.javascript')

@endsection

@section('content')

@include('partials.nav')

<div class="container">
    <div class="flexible_row">
        <div class="quiz_item">
            <p>Question {{ $question->id }} of 11</p>
            <h2>{{ $question->text }}</h2>
                @if($question->type == "input")
                    # of servings: <input type="text"><br>
                @elseif($question->type == "select")
                    <input  type="checkbox" value="1">{{ $question->option1 }}<br>
                    <input class="quiz-input" type="checkbox" value="1">{{ $question->option2 }}<br>
                    <input class="quiz-input" type="checkbox" value="1">{{ $question->option3 }}<br>
                    <input class="quiz-input" type="checkbox" value="1">{{ $question->option4 }}<br>
                @elseif($question->type == "multiple-choice")
                    <input class="quiz-input" type="radio" value="1">{{ $question->option1 }}<br>
                    <input class="quiz-input" type="radio" value="1">{{ $question->option2 }}<br>
                    <input class="quiz-input" type="radio" value="1">{{ $question->option3 }}<br>
                    <input class="quiz-input" type="radio" value="1">{{ $question->option4 }}<br>
                @endif
            <div class="btn-wrapper">
                <button onclick="changeQuestion(-1)" class="quiz-btn btn">Previous</button>
                <button onclick="changeQuestion(1)" class="quiz-btn btn">Next</button>
            </div>
        </div>
    </div>
</div>

<br>
@endsection

<script>
    function changeQuestion(incrementor){
        var urlParts = window.location.href.split('/');
        var currentQuestion = parseInt(urlParts.pop());
        var nextQuestion = parseInt(currentQuestion)+ incrementor;
        window.location.href=('/vegan-quiz/' + nextQuestion);
    }
</script>