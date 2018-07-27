<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        $questions = Questions::all();
        dd($questions);
    }

    public function takeQuiz($number) {
        $question = Questions::where('id', $number)->first();
        return view('quiz/question')->with([
            'question' => $question,
        ]);

    }

    public function results() {

    }
}
