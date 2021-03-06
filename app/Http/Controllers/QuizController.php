<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Email;
use App\Questions;
use App\Suggestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index() {
        $date = date('m/d/Y-h:i:s-a', time());
        $hashed_id = md5($date);

        return view('quiz/start')->with([
            'hashed_id' => $hashed_id,
        ]);
    }

    // when a user clicks on next the answer is first saved via ajax
    public function saveAnswer(Request $request) {
        $answer = Answers::where('hashed_id', $request->input('hashed_id'))->first();
        $answer_nr = 'answer' . $request->input('answer_nr');
        $answer->{$answer_nr} = $request->input('data');
        $answer->save();
    }

    // and then they get redirected to the next question
    public function takeQuiz($hashed_id, $number) {
        $answer = Answers::where('hashed_id', $hashed_id)->first();
        if ($number == '3') {
            if ((strpos($answer->answer2, 'a') !== false))  {
                $question = Questions::where('id', $number)->first();
                return view('quiz/question')->with([
                    'question' => $question,
                ]);
            }

            if ((strpos($answer->answer2, 'b') !== false))  {
                return redirect('vegan-quiz/' . $hashed_id . '/4');
            }

            if ((strpos($answer->answer2, 'c') !== false))  {
                return redirect('vegan-quiz/' . $hashed_id . '/5');
            }

            if ((strpos($answer->answer2, 'd') !== false))  {
                return redirect('vegan-quiz/' . $hashed_id . '/6');
            }
        }

        $question = Questions::where('id', $number)->first();
        if ($answer == null) {
            $answer = new Answers();
            $answer->hashed_id = $hashed_id;
            $answer->user_id = Auth::user()->id;
            $answer->save();
        }

        return view('quiz/question')->with([
            'question' => $question,
        ]);
    }

    public function emailCapture($hashedId) {
        return view('quiz/emailCapture')->with([
            'hashedId' => $hashedId,
        ]);
    }

    public function suggestions($hashedId) {
        $suggestions = [];
        $answers = Answers::where('hashed_id', $hashedId)->first();
        // person eats beef
        $answers->answer1 >= 1 ? $suggestions[] = Suggestions::where('id', 1)->first(): null;
        // reduce serving size
        $answers->answer1 >= 1 ? $suggestions[] = Suggestions::where('id', 10)->first(): null;
        // person drinks milk
        $answers->answer7 >= 1 ? $suggestions[] = Suggestions::where('id', 3)->first(): null;
        // person eats more than 1 and less than 5 servings of meat per week, try one week veggie
        $answers->answer1 <= 5 && $answers->answer1 > 0 ? $suggestions[] = Suggestions::where('id', 9)->first(): null;
        // person uses cheese
        $answers->answer8 >= 1 ? $suggestions[] = Suggestions::where('id', 14)->first(): null;
        // person eats chicken, switch to plant-based alternative
        $answers->answer2 >= 1 ? $suggestions[] = Suggestions::where('id', 15)->first(): null;
        // person eats yogurt
        $answers->answer9 >= 1 ? $suggestions[] = Suggestions::where('id', 11)->first(): null;
        // eats meat but doesn't eat meat at work, go veggie before 6pm
        if (array_sum([$answers->answer1, $answers->answer2, $answers->answer3, $answers->answer4]) > 0) {
            if ((strpos($answers->answer14, 'b') !== false))  {
                $suggestions[] = Suggestions::where('id', 8)->first();
            }
        }

        // person eats meat at work, go veggie at work
        if ((strpos($answers->answer14, 'b') !== false))  {
            $suggestions[] = Suggestions::where('id', 6)->first();
        }

        // person doesn't shop at farmer's market
        if ((strpos($answers->answer11, 'c') === false))  {
            $suggestions[] = Suggestions::where('id', 12)->first();
        }

        // person doesn't buy organic or farmer's market
        if ((strpos($answers->answer11, 'c') === false))  {
            if ((strpos($answers->answer11, 'b') === false))  {
                $suggestions[] = Suggestions::where('id', 16)->first();
            }
        }

        $targets = array("a", "b", "c");
        foreach ($targets as $target) {
            // throws some food away
            if ((strpos($answers->answer9, $target) !== false))  {
                $suggestions[] = Suggestions::where('id', 22)->first();
            }
        }

        // eats meat and dairy in social settings, try weekends only
        if ((strpos($answers->answer14, 'c') !== false))  {
            $suggestions[] = Suggestions::where('id', 17)->first();
        }

        // eats meat for breakfast
        if ((strpos($answers->answer12, 'a') !== false))  {
            $suggestions[] = Suggestions::where('id', 21)->first();
        } elseif ((strpos($answers->answer13, 'a') !== false)) {
            // dairy 4 breakfast
            $suggestions[] = Suggestions::where('id', 21)->first();
        }

        if (strpos($answers->answer6, 'c') !== false) {
            // person uses eggs to bake
            $suggestions[] = Suggestions::where('id', 4)->first();
        }

        if (strpos($answers->answer6, 'a') !== false) {
            // person uses eggs to bake
            $suggestions[] = Suggestions::where('id', 13)->first();
        }

        if (strpos($answers->answer6, 'b') !== false) {
            // person eats hard boiled eggs
            $suggestions[] = Suggestions::where('id', 23)->first();
        }

        return view('quiz/suggestions')->with([
            'suggestions' => $suggestions,
        ]);
    }

}
