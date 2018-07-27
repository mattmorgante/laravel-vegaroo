<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use App\Suggestions;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        return view('quiz/start');
    }

    public function takeQuiz($number) {
        $question = Questions::where('id', $number)->first();
        return view('quiz/question')->with([
            'question' => $question,
        ]);
    }

    public function suggestions($hashedId) {
        $suggestions = [];
        $answers = Answers::where('hashed_id', $hashedId)->first();

        if ($answers->answer1 >= 1) {
            // person eats meat
            $suggestions[] = Suggestions::where('id', 1)->first();
        }

        if ($answers->answer8 >= 1 ) {
            $suggestions[] = Suggestions::where('id', 3)->first();
        }

        if (strpos($answers->answer6, 'c') !== false) {
            $suggestions[] = Suggestions::where('id', 4)->first();
        }

        if (strpos($answers->answer6, 'c') !== false) {
            $suggestions[] = Suggestions::where('id', 4)->first();
        }

        return view('quiz/suggestions')->with([
            'suggestions' => $suggestions,
        ]);

    }
}
