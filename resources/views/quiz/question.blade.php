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
                <button onclick="sendAnswer(3)" class="quiz-btn btn">Save answer</button>
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

    function sendAnswer(answer) {
        var answer_nr = 1;
        var hashed_id = 12345;
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


    function increment(incrementor, target, recommended) {
        var value = parseInt(document.getElementById(target).value);

        if (value == 0 && incrementor == -1) {

        } else {
            value+=incrementor;

            if (value == 0) {
                document.getElementById(target).parentElement.style.backgroundColor = "white";
            }

            if ( (value / recommended) >= .33 ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#d3f5e5";
            }

            if ( (value / recommended) >= .50 ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#92e6c0";
            }

            if ( value >= recommended ) {
                document.getElementById(target).parentElement.style.backgroundColor = "#26ce81";
            }

            if (value > recommended ) {

            } else {
                document.getElementById(target).value = value;
                updateBar(incrementor);

                var data = target.split("-");

                $.ajax({
                    url: "/save",
                    cache: false,
                    data: {
                        food: data[0],
                        dayId: data[1],
                        value: value
                    }
                })
                    .done(function (response) {
                        console.log(response);
                        console.log('yes');
                    })
                    .fail(function () {
                        console.log("error");
                    });
            }
        }
    }
</script>