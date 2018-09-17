<?php

namespace App\Http\Controllers;

use App\Days;
use App\Foods;
use App\HistoricalScore;
use App\Http\Helpers\DashboardHelper;
use App\recipe;
use App\savedRecipes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function daily(Request $request){
        $userId = (Auth::user()->id);
        if ($request->date == null || $request->date > Carbon::now()->today()) {
            return Redirect::to('home/' . Carbon::now()->toDateString());
        }
        $dashboard = new DashboardHelper();
        $today = $dashboard->createToday($request->date, $userId);
        $foodObject = new Foods();
        $foods = $foodObject->getAllFoods();
        list($recommendedRecipes, $categoriesComplete) = $dashboard->assembleRecipes($foods, $today);
        return view('daily')->with([
            'recServings' => Foods::getAttributeOfFoods('recommended'),
            'foods' => $foods,
            'today' => $today,
            'displayDate' => $dashboard->createDisplayDate($request->date),
            'recommendedRecipes' => $recommendedRecipes,
            'categoriesComplete' => $categoriesComplete,
            'message' => Days::where('user_id', $userId)->count() == 1 ? true : false
        ]);
    }

    public function weekly() {
      $userId = Auth::user()->id;
      $days = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->get();
      $dashboard = new DashboardHelper();
      $percentages = $dashboard->calculatePercentagesOfAWeek($days);
      $weekScore = $dashboard->calculateWeekScore($days);
      $week = $dashboard->createWeek($userId);
      return view('weekly')->with([
          'week' => $week,
          'percentage' => $percentages,
          'days' => $dashboard->createLast7Days(),
          'recommendedRecipes' => recipe::getRecommendedRecipes($week),
          'weekScore' => $weekScore,
          'historicalScores' => HistoricalScore::getScoresOfAUser($userId),
      ]);
    }

    public function profile() {
        return view('profile')->with([
            'savedRecipes' => savedRecipes::getSavedRecipesOfAUser(Auth::user()->id)
        ]);
    }
}