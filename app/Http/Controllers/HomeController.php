<?php

namespace App\Http\Controllers;

use App\Days;
use App\Foods;
use App\HistoricalScore;
use App\recipe;
use App\savedRecipes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Psy\CodeCleaner\AbstractClassPass;

class HomeController extends Controller
{
    const dailyTotal = 25;
    const weeklyTotal = 175;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daily(Request $request){
        $userId = (Auth::user()->id);
        if ($request->date == null || $request->date > Carbon::now()->today()) {
            return Redirect::to('home/' . Carbon::now()->toDateString());
        }
        $today = $this->createToday($request->date, $userId);
        $foods = Foods::getAllFoods();

        list($recommendedRecipes, $categoriesComplete) = $this->assembleRecipes($foods, $today);

        return view('daily')->with([
            'recServings' => Foods::getAttributeOfFoods('recommended'),
            'foods' => $foods,
            'today' => $today,
            'displayDate' => $this->createDisplayDate($request->date),
            'recommendedRecipes' => $recommendedRecipes,
            'categoriesComplete' => $categoriesComplete,
            'message' => Days::where('user_id', $userId)->count() == 1 ? true : false
        ]);
    }

    public function weekly() {
      $days = Days::where('user_id', Auth::user()->id)->orderBy('day', 'desc')->limit(7)->get();
      $percentages = $this->calculatePercentagesOfAWeek($days);
      $weekScore = $this->calculateWeekScore($days);
      $week = $this->createWeek(Auth::user()->id);
      return view('weekly')->with([
          'week' => $week,
          'percentage' => $percentages,
          'days' => $this->createLast7Days(),
          'recommendedRecipes' => recipe::getRecommendedRecipes($week),
          'weekScore' => $weekScore,
          'historicalScores' => HistoricalScore::getScoresOfAUser(Auth::user()->id),
      ]);
    }

    public function welcome() {
        return view('welcome')->with([
            'savedRecipes' => savedRecipes::getSavedRecipesOfAUser(Auth::user()->id)
        ]);
    }

    private function sumADay($day) {
        return $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water + $day->exercise;
    }

    private function createToday($date, $userId) {
        $today = Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();

        if (empty($today)) {
            $today = $this->makeADay($userId, $date);
        }

        $today->sum = $this->sumADay($today);
        $today->percentage = $this->calculatePercentage($today);

        return $today;
    }

    private function calculatePercentage($today) {
        $percentage = $today->sum / self::dailyTotal;
        if ($percentage > 1){
            $percentage = 1;
        }
        return 100*(round($percentage, 2));
    }

    private function makeADay($userId, $date) {
        $days = new Days();
        return $days->createADay($userId, $date);
    }

    private function createWeek($userId) {
        $foods = Foods::all();
        $week = [];
        foreach ($foods as $food) {
            $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->pluck($food->slug)->toArray();
            $weekPercentage = array_sum($weekData) / ($food->recommended * 7);
            $week[$food->name] = 100*(round($weekPercentage, 2));
        }
        return $week;
    }

    private function createDisplayDate($date) {
        $explodedDate = explode('-', $date);
        $displayDate = Carbon::createFromDate($explodedDate[0], $explodedDate[1], $explodedDate[2]);
        return $displayDate->toFormattedDateString();
    }

    private function assembleRecipes($foods, $today) {
        $recommendedRecipes = []; $categoriesComplete = 0;
        foreach ($foods as $food) {
            if ($food->recommended > $today->{"$food->slug"}) {
                $recipes = recipe::getRecipeByTag($food->slug, 4);
                $recommendedRecipes[$food->name] = $recipes;
            } else {
                $categoriesComplete++;
            }
        }
        return array($recommendedRecipes, $categoriesComplete);
    }

    private function calculateWeekScore($days) {
        $weekScore = 0;
        foreach ($days as $today) {
            $sum = $this->sumADay($today);
            $weekScore = $weekScore + $sum;
        }

        $weekScore = $weekScore / self::weeklyTotal;
        $weekScore = 100 * (round($weekScore, 2));
        return $weekScore;
    }

    private function createLast7Days() {
        $last7days = [];
        for ($i=0;$i<7; $i++) {
            $last7days[$i] = Carbon::now()->subDays($i)->format('M d');
        }
        return $last7days;
    }

    private function calculatePercentagesOfAWeek($days) {
        $percentages = []; $i = 0;
        foreach ($days as $day) {
            $day->sum = $this->sumADay($day);
            $day->percentage = $this->calculatePercentage($day);
            $percentages[$i] = $day->percentage;
            $i++;
        }
        return $percentages;
    }
}
