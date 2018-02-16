<?php

namespace App\Http\Controllers;

use App\Days;
use App\Foods;
use App\recipe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

        $today = Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();

        if (empty($today)) {
            $days = new Days();
            $today = $days->createADay($userId, $date);
        }

        $today->sum = $this->sumADay($today);

        $today->percentage = $today->sum / 25;
        if ($today->percentage > 1){
            $today->percentage = 1;
        }

        $today->percentage = 100*(round($today->percentage, 2));

        $recServings = Foods::getAttributeOfFoods('recommended');

        $foods = Foods::getAllFoods();

        $recommendedRecipes = [];
        foreach ($foods as $food) {
          if ($food->recommended > $today->{"$food->slug"} ) {
              $recipes = recipe::getRecipeByTag($food->slug, 4);
              $recommendedRecipes[$food->name] = $recipes;
          }
        }

        return view('user-home-2')->with([
            'recServings' => $recServings,
            'foods' => $foods,
            'today' => $today,
            'displayDate' => $displayDate,
            'recommendedRecipes' => $recommendedRecipes
        ]);
    }

    public function save(Request $request) {
        $today = Days::where('id', $request->input('dayId'))->first();
        $food = $request->input('food');
        $today->{$food} = $request->input('value');
        $today->save();
    }

    public function weekly() {
      // todo: totalscore = days all summed from this week
      $userId = (Auth::user()->id);

      $foods = Foods::all();

      $week = [];
      foreach ($foods as $food) {
          $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->pluck($food->slug)->toArray();
          $weekRecommended = $food->recommended * 7;
          $weekPercentage = array_sum($weekData) / $weekRecommended;
          $week[$food->name] = 100*(round($weekPercentage, 2));
      }

      $percentages =[];
      $days = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->get();
      $i = 0;
      foreach ($days as $day) {
          $day->sum = $this->sumADay($day);
          $day->percentage = $day->sum / 25;
          if ($day->percentage > 1){
              $day->percentage = 1;
          }

          $day->percentage = 100*(round($day->percentage, 2));
          $percentages[$i] = $day->percentage;
          $i++;
      }

      $last7days = [];
      for ($i=0;$i<7; $i++) {
          $last7days[$i] = Carbon::now()->subDays($i)->format('M d');
      }

      // sort by worst percentage first
      asort($week);

      $recommendedRecipes = [];
      foreach ($week as $food => $value) {
        if ($value < 90) {
          $slug = Foods::where('name', $food)->pluck('slug');

          $recipes = recipe::getRecipeByTag($slug, 4);
          $recommendedRecipes[$food] = $recipes;
        }
      }

      // week score
      $weekScore = 0;
      foreach ($days as $today) {
          $sum = $this->sumADay($today);
          $weekScore = $weekScore + $sum;
      }

      $weekScore = $weekScore / 175;
      $weekScore = 100*(round($weekScore, 2));

      return view('weekly')->with([
          'week' => $week,
          'percentage' => $percentages,
          'days' => $last7days,
          'recommendedRecipes' => $recommendedRecipes,
          'weekScore' => $weekScore
      ]);
    }

    public function welcome() {
      return view('welcome');
    }

    private function sumADay($day) {
        return $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water;
    }
}
