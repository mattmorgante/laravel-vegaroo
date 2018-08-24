<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    const WEIGHT_LOSS_QUESTION = 3;
    const BODY_FAT_QUESTION = 4;
    const BLOOD_PRESSURE_QUESTION = 5;
    const CHOLESTEROL_QUESTION = 6;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saveAnswerAjax(Request $request) {
        $answer = Answers::where('hashed_id', $request->input('hashed_id'))->first();
        $answer_number = 'answer' . $request->input('answer_nr');
        $answer->{$answer_number} = $request->input('data');
        $answer->save();
    }

    public function findNextQuestion($hashed_id = null, $nextQuestion = null) {
        if ($hashed_id == null) {
            return $this->startQuiz();
        }

        $answer = Answers::where('hashed_id', $hashed_id)->first();
        if ($nextQuestion == '3') {
            return $this->calculateHealthReason($answer, $hashed_id);
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

    private function startQuiz() {
        $date = date('m/d/Y-h:i:s-a', time());
        $hashed_id = md5($date);
        return redirect('/onboarding-quiz/' . $hashed_id . '/1');
    }

    private function calculateHealthReason($answer, $hashed_id) {
        $healthReason = $answer->answer2;
        if ($this->isWeightLoss($healthReason)) {
            return view('onboarding/question')->with([
                'question' => $question = Questions::where('id', 3)->first(),
            ]);
        }
        if ($this->isBodyFat($healthReason)) {
            return redirect('/onboarding-quiz/' . $hashed_id . '/4');
        }
        if ($this->isBloodPressure($healthReason)) {
            return redirect('/onboarding-quiz/' . $hashed_id . '/5');
        }
        if ($this->isCholesterol($healthReason)) {
            return redirect('/onboarding-quiz/' . $hashed_id . '/6');
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