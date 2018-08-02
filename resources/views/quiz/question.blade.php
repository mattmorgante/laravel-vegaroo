@extends('layouts.app')

@section('header.javascript')

@endsection

@section('content')

@include('partials.nav')

<div class="quiz-container">
    <div class="flexible_row">
        <div class="quiz_item">
            <p>Question {{ $question->id }} of 11</p>
            <h2>{{ $question->text }}</h2>
                @if($question->type == "input")
                    <span class="input_prompt"># of servings:</span><input name="answer" id="answer-value"
                                                                         type="text"><br>
                    <div class="btn-wrapper">
                        @if ($question->id == 1)
                        @else
                            <button onclick="changeQuestion(-1)" class="quiz-btn btn">Previous</button>
                        @endif
                        <button onclick="getInputAnswer(); changeQuestion(1)" class="quiz-btn btn">Next</button>
                    </div>
                @elseif($question->type == "select")
                    <input class="quiz-input" id="a" type="checkbox" value="1">{{ $question->option1 }}<br>
                    <input class="quiz-input" id="b" type="checkbox" value="1">{{ $question->option2 }}<br>
                    <input class="quiz-input" id="c" type="checkbox" value="1">{{ $question->option3 }}<br>
                    <input class="quiz-input" id="d" type="checkbox" value="1">{{ $question->option4 }}<br>

                    <div class="btn-wrapper">
                        <button onclick="changeQuestion(-1)" class="quiz-btn btn">Previous</button>

                        @if ($question->id == 11)
                            <button onclick="finish()" class="quiz-btn btn">Finish</button>
                        @else
                            <button onclick="getCheckboxAnswer(); changeQuestion(1)" class="quiz-btn btn">Next</button>
                        @endif
                    </div>
                @elseif($question->type == "multiple-choice")
                    <input class="quiz-input" name="radio" type="radio" value="a">{{ $question->option1 }}<br>
                    <input class="quiz-input" name="radio" type="radio" value="b">{{ $question->option2 }}<br>
                    <input class="quiz-input" name="radio" type="radio" value="c">{{ $question->option3 }}<br>
                    <input class="quiz-input" name="radio" type="radio" value="d">{{ $question->option4 }}<br>

                    <div class="btn-wrapper">
                        <button onclick="changeQuestion(-1)" class="quiz-btn btn">Previous</button>
                        <button onclick="getRadioAnswer(); changeQuestion(1)" class="quiz-btn btn">Next</button>
                    </div>
                @endif
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
        var hashed_id = urlParts[4];
        window.location.href=('/vegan-quiz/' + hashed_id + '/' + nextQuestion);
    }

    function finish() {
        var urlParts = window.location.href.split('/');
        var hashed_id = urlParts[4];
        window.location.href=('/suggestions/' + hashed_id );
    }

    function getInputAnswer() {
        var answer = document.getElementById('answer-value').value;
        sendAnswer(answer);
    }

    function getCheckboxAnswer() {
        var a = document.querySelector('#a').checked;
        var b = document.querySelector('#b').checked;
        var c = document.querySelector('#c').checked;
        var d = document.querySelector('#d').checked;
        var answer = a + ", " + b + ", " + c + ", " + d;
        sendAnswer(answer);
    }

    function getRadioAnswer() {
        var answer = document.querySelector('input[name = "radio"]:checked').value;
        sendAnswer(answer);
    }

    function sendAnswer(answer) {

        var urlParts = window.location.href.split('/');
        var answer_nr = urlParts.pop();
        var hashed_id = urlParts[4];

        $.ajax({
            url: "/vegan-quiz/save",
            cache: false,
            data: {
                answer_nr: answer_nr,
                hashed_id: hashed_id,
                data: answer
            }
        })
            .done(function (response) {
                console.log(response);
                console.log('success');
            })
            .fail(function () {
                console.log("error");
            });
    }


</script>