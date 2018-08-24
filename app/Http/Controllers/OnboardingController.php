<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function start() {
        $date = date('m/d/Y-h:i:s-a', time());
        $hashed_id = md5($date);
        $userId = Auth::user()->id;

        return view('onboarding/start')->with([
            'hashed_id' => $hashed_id,
            'user_id' => $userId
        ]);
    }

    public function saveAnswerAjax(Request $request) {
        $answer = Answers::where('hashed_id', $request->input('hashed_id'))->first();
        $answer_nr = 'answer' . $request->input('answer_nr');
        $answer->{$answer_nr} = $request->input('data');
        $answer->save();
    }

    public function findNextQuestion($hashed_id, $nextQuestion) {
        $answer = Answers::where('hashed_id', $hashed_id)->first();
        if ($nextQuestion == '3') {
            $healthReason = $answer->answer2;
            if ($this->isWeightLoss($healthReason))  {
                return view('onboarding/question')->with([
                    'question' => Questions::where('id', $nextQuestion)->first(),
                ]);
            }
            if ($this->isBodyFat($healthReason))  {
                return view('onboarding/question')->with([
                    'question' => Questions::where('id', 4)->first(),
                ]);
            }
            if ($this->isBloodPressure($healthReason))  {
                return view('onboarding/question')->with([
                    'question' => Questions::where('id', 5)->first(),
                ]);
            }
            if ($this->isCholesterol($healthReason))  {
                return view('onboarding/question')->with([
                    'question' => Questions::where('id', 6)->first(),
                ]);
            }
        } else {
            if ($answer == null) {
                $answer = new Answers();
                $answer->hashed_id = $hashed_id;
                $answer->user_id = Auth::user()->id;
                $answer->save();
            }
            return view('onboarding/question')->with([
                'question' => $question = Questions::where('id', $nextQuestion)->first(),
            ]);
        }
    }

    private function isWeightLoss($healthReason) {
        return (strpos($healthReason, 'a') !== false);
    }

    private function isBodyFat($healthReason) {
        return (strpos($healthReason, 'b') !== false);
    }

    private function isBloodPressure($healthReason) {
        return (strpos($healthReason, 'c') !== false);
    }

    private function isCholesterol($healthReason) {
        return (strpos($healthReason, 'd') !== false);
    }

}
