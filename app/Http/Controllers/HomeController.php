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

    public function userIndex(Request $request){
        $userId = (Auth::user()->id);

        $date = $request->date;

        // redirect if on page without a date
        if ($date == null || $date > Carbon::now()->today()) {
          $todayFormatted = Carbon::now()->toDateString();
          return Redirect::to('home/' . $todayFormatted);
        }

        // for header
        $date2 = explode('-', $date);
        $displayDate = Carbon::createFromDate($date2[0], $date2[1], $date2[2]);
        $displayDate = $displayDate->toFormattedDateString();

        $today = $this->createToday($date, $userId);

        $recommendedRecipes = [];
        $categoriesComplete = 0;

        $foods = Foods::getAllFoods();
        foreach ($foods as $food) {
          if ($food->recommended > $today->{"$food->slug"} ) {
              $recipes = recipe::getRecipeByTag($food->slug, 4);
              $recommendedRecipes[$food->name] = $recipes;
          } else {
              $categoriesComplete++;
          }
        }

        $message = false;
        $daysOfUser = Days::where('user_id', $userId)->count();
        if ($daysOfUser == 1) {
            $message = true;
        }

        return view('daily')->with([
            'recServings' => Foods::getAttributeOfFoods('recommended'),
            'foods' => $foods,
            'today' => $today,
            'displayDate' => $displayDate,
            'recommendedRecipes' => $recommendedRecipes,
            'categoriesComplete' => $categoriesComplete,
            'message' => $message
        ]);
    }

    public function save(Request $request) {
        $today = Days::where('id', $request->input('dayId'))->first();
        $food = $request->input('food');
        $today->{$food} = $request->input('value');
        $today->save();
    }

    public function weekly() {
      $userId = Auth::user()->id;
      $foods = Foods::all();
      $week = $this->createWeek($foods, $userId);

      $days = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->get();
      $percentages =[]; $i = 0;
      foreach ($days as $day) {
          $day->sum = $this->sumADay($day);
          $day->percentage = $this->calculatePercentage($day);
          $percentages[$i] = $day->percentage;
          $i++;
      }

      $last7days = [];
      for ($i=0;$i<7; $i++) {
          $last7days[$i] = Carbon::now()->subDays($i)->format('M d');
      }

      asort($week);
      $recommendedRecipes = $this->getRecommendedRecipes($week);

      $weekScore = 0;
      foreach ($days as $today) {
          $sum = $this->sumADay($today);
          $weekScore = $weekScore + $sum;
      }

      $weekScore = $weekScore / self::weeklyTotal;
      $weekScore = 100*(round($weekScore, 2));

      $historicalScores = HistoricalScore::getScoresOfAUser($userId);

      $totalScore = 0;
      foreach ($historicalScores as $historicalScore) {
          $totalScore = $totalScore + $historicalScore->score;
      }

      return view('weekly')->with([
          'week' => $week,
          'percentage' => $percentages,
          'days' => $last7days,
          'recommendedRecipes' => $recommendedRecipes,
          'weekScore' => $weekScore,
          'historicalScores' => $historicalScores,
          'totalScore' => $totalScore
      ]);
    }

    public function welcome() {
        $userId = (Auth::user()->id);
        $savedRecipeRows = savedRecipes::where('user_id', $userId)->get();

        $savedRecipes =[];
        foreach ($savedRecipeRows as $row) {
            $recipe = recipe::where('id', $row->recipe_id)->first();
            $savedRecipes[] = $recipe;
        }

        return view('welcome')->with([
            'savedRecipes' => $savedRecipes,
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

    private function createWeek($foods, $userId) {
        $week = [];
        foreach ($foods as $food) {
            $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->pluck($food->slug)->toArray();
            $weekPercentage = array_sum($weekData) / ($food->recommended * 7);
            $week[$food->name] = 100*(round($weekPercentage, 2));
        }
        return $week;
    }
    private function getRecommendedRecipes($week) {
        $recommendedRecipes = [];
        foreach ($week as $food => $value) {
            if ($value < 90) {
                $slug = Foods::where('name', $food)->pluck('slug')[0];
                $recipes = recipe::getRecipeByTag($slug, 4);
                $recommendedRecipes[$food] = $recipes;
            }
        }
        return $recommendedRecipes;
    }
}
