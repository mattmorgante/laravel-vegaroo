@extends('layouts.app')

@section('header.javascript')

@endsection

@section('content')

@include('partials.nav')

<div class="quiz-container">
    <div class="flexible_row">
        <div class="quiz_item">
            <p class="quiz-details">Question {{ $number }} of 5</p>
            <h2>{{ $question->text }}</h2>
            @if($question->type == "input")
                <span class="input_prompt"></span><input style="height: 20px;" name="answer" id="answer-value"
                                                                       type="text" maxlength="7"><br>
                <div class="btn-wrapper">
                    @if ($question->id == 1)
                    @else
                        <button onclick="goBack()" class="quiz-btn btn">Previous</button>
                    @endif

                    @if ($question->id == 8)
                        <button onclick="finish()" class="quiz-btn btn">Finish</button>
                    @else
                        <button onclick="getInputAnswer()" class="quiz-btn btn">Next</button>
                    @endif
                </div>
            @elseif($question->type == "select")
                <p class="quiz-details">Select all that apply</p>
                <div class="select-wrapper">
                    <input name="cb-input" class="quiz-input" value="a" type="checkbox">{{ $question->option1 }} <br>
                    <input name="cb-input" class="quiz-input" value="b" type="checkbox">{{ $question->option2 }}<br>
                    <input name="cb-input" class="quiz-input" value="c" type="checkbox">{{ $question->option3 }}<br>
                    <input name="cb-input" class="quiz-input" value="d" type="checkbox">{{ $question->option4 }}<br>

                    <div class="btn-wrapper">
                        <button onclick="goBack()" class="quiz-btn btn">Previous</button>
                        <button onclick="getCheckboxAnswer()" class="quiz-btn btn">Next</button>
                    </div>
                </div>
            @elseif($question->type == "multiple-choice")
                <div class="select-wrapper">
                    <input class="quiz-input" name="radio" type="radio" value="a">{{ $question->option1 }}<br>
                    <input class="quiz-input" name="radio" type="radio" value="b">{{ $question->option2 }}<br>
                    <input class="quiz-input" name="radio" type="radio" value="c">{{ $question->option3 }}<br>
                    <input class="quiz-input" name="radio" type="radio" value="d">{{ $question->option4 }}<br>

                    <div class="btn-wrapper">
                        <button onclick="goBack()" class="quiz-btn btn">Previous</button>
                        <button onclick="getRadioAnswer()" class="quiz-btn btn">Next</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<br>
@endsection

<script>
    function goBack() { window.history.back(); }

    function changeQuestion(incrementor){
        var urlParts = window.location.href.split('/');
        var currentQuestion = parseInt(urlParts.pop());
        var hashed_id = urlParts[4];
        if (currentQuestion === 3 || currentQuestion === 4 || currentQuestion === 5 || currentQuestion === 6 ) {
            window.location.href=('/onboarding-quiz/' + hashed_id + '/' + 7);
        } else {
            var nextQuestion = parseInt(currentQuestion)+ incrementor;
            window.location.href=('/onboarding-quiz/' + hashed_id + '/' + nextQuestion);
        }
    }
    function finish() {
        getInputAnswer(true);
    }

    function getInputAnswer(lastQuestion = false) {
        var answer = document.getElementById('answer-value').value;
        if (answer === "" || answer == null){
            alert("Please enter a number between 0 and 999");
            return false;
        }
        if (lastQuestion === true) {
            window.location.href=('/home');
        } else {
            changeQuestion(1);
        }
    }

    function getCheckboxAnswer(lastQuestion = false) {
        var checkboxes = document.querySelectorAll('input[name="cb-input"]:checked'), values = [];
        Array.prototype.forEach.call(checkboxes, function(el) {
            values.push(el.value);
        });
        values = values.toString();
        if (values) {
            sendAnswer(values);
            if (lastQuestion === true) {
                var urlParts = window.location.href.split('/');
                var hashed_id = urlParts[4];
                window.location.href=('/suggestions/email/' + hashed_id );
            } else {
                changeQuestion(1);
            }
        } else {
            alert("Please select at least one option");
            return false;
        }
    }

    function getRadioAnswer() {
        var answer = document.querySelector('input[name = "radio"]:checked');
        if (answer) {
            sendAnswer(answer.value);
            changeQuestion(1);
        } else {
            alert("Please select an option");
            return false;
        }
    }

    function sendAnswer(data) {
        var urlParts = window.location.href.split('/');
        var answer_nr = urlParts.pop();
        var hashed_id = urlParts[4];

        console.log(data);

        $.ajax({
            url: "/onboarding-quiz/save",
            cache: false,
            data: {
                answer_nr: answer_nr,
                hashed_id: hashed_id,
                data: data
            }
        })
            .done(function (response) {
                console.log(response);
                console.log('success');
            })
            .fail(function (response) {
                console.log(response);
                console.log('error');
            });
    }
</script>