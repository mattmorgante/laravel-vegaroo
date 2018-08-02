<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use App\Suggestions;
use DateTime;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() {
        $date = date('m/d/Y-h:i:s-a', time());
        $hashed_id = md5($date);

        return view('quiz/start')->with([
            'hashed_id' => $hashed_id
        ]);
    }

    public function takeQuiz($hashed_id, $number) {
        $question = Questions::where('id', $number)->first();
        $answer = Answers::where('hashed_id', $hashed_id)->first();
        if ($answer == null) {
            $answer = new Answers();
            $answer->hashed_id = $hashed_id;
            $answer->save();
        }

        return view('quiz/question')->with([
            'question' => $question,
        ]);
    }

    public function saveAnswer(Request $request) {
        $answer = Answers::where('hashed_id', $request->input('hashed_id'))->first();
        $answer_nr = 'answer' . $request->input('answer_nr');
        $answer->{$answer_nr} = $request->input('data');
        $answer->save();
    }

    public function suggestions($hashedId) {
        $suggestions = [];
        $answers = Answers::where('hashed_id', $hashedId)->first();
        // person eats beef
        $answers->answer1 >= 1 ? $suggestions[] = Suggestions::where('id', 1)->first(): null;
        // reduce serving size
        $answers->answer1 >= 1 ? $suggestions[] = Suggestions::where('id', 10)->first(): null;
        // person drinks milk
        $answers->answer8 >= 1 ? $suggestions[] = Suggestions::where('id', 3)->first(): null;
        // person eats chicken
        $answers->answer1 >= 1 ? $suggestions[] = Suggestions::where('id', 1)->first(): null;
        // person eats less than 5 servings of meat per week, try one week veggie
        $answers->answer1 <= 5 ? $suggestions[] = Suggestions::where('id', 9)->first(): null;
        // person uses cheese
        $answers->answer8 >= 1 ? $suggestions[] = Suggestions::where('id', 14)->first(): null;

        // normally eats meat for breakfast or lunch

        //

        if (strpos($answers->answer6, 'c') !== false) {
            // person uses eggs to bake
            $suggestions[] = Suggestions::where('id', 4)->first();
        }


        return view('quiz/suggestions')->with([
            'suggestions' => $suggestions,
        ]);
    }

}
