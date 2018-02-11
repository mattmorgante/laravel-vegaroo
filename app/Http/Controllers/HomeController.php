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

        if ($date == null || $date > Carbon::now()->today()) {
          $todayFormatted = Carbon::now()->toDateString();
          return Redirect::to('home/' . $todayFormatted);
        }

        $date2 = explode('-', $date);

        $displayDate = Carbon::createFromDate($date2[0], $date2[1], $date2[2]);

        $displayDate = $displayDate->toFormattedDateString();

        $today = Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();

        if (empty($today)) {
            $today = $this->createADay($userId, $date);
        }

        $today->sum = $today->beans + $today->greens + $today->cruciferous + $today->berries + $today->fruits + $today->vegetables + $today->grains + $today->flaxseeds + $today->nuts + $today->spices + $today->water;

        $today->percentage = $today->sum / 25;
        if ($today->percentage > 1){
            $today->percentage = 1;
        }

        $today->percentage = 100*(round($today->percentage, 2));

        $recServings = Foods::all()->pluck('recommended');

        $foods = Foods::all();

        foreach ($foods as $food) {
          if ($food->recommended > $today->{"$food->slug"} ) {
              $recipes = recipe::where('tags', 'LIKE', '%'.$food->slug.'%')->limit(4)->get();
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
      $i =0;
      foreach ($days as $day) {

          $day->sum = $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water;

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

      asort($week);


      $recommendedRecipes = [];
      foreach ($week as $food => $value) {
        if ($value < 90) {
          $slug = Foods::where('name', $food)->pluck('slug');

          $recipes = recipe::where('tags', 'LIKE', '%'.$slug[0].'%')->limit(4)->get();
          $recommendedRecipes[$food] = $recipes;
        }
      }

      return view('weekly')->with([
          'week' => $week,
          'percentage' => $percentages,
          'days' => $last7days,
          'recommendedRecipes' => $recommendedRecipes
      ]);
    }

    public function welcome() {
      $userId = (Auth::user()->id);
      $daysOfUser = Days::where('user_id', $userId)->get();

      $totalScore = 98;
      $weeks = [
        '2018-02-03' => 65,
        '2018-01-27' => 33,
      ];

      // to do: totalscore = days all summed from this week
      // PLUS previous week's scores
      // cronjob to build weekly total score

      return view('welcome')->with([
          'totalScore' => $totalScore,
          'weeks' => $weeks,
      ]);

    }

    private function createADay($userId, $day){
        $today = new Days();
        $today->user_id = $userId;
        $today->day = $day;
        $today->save();
        $today = $this->getADay($userId, $day);
        return $today;
    }

    private function getAday($userId, $date = null) {
      if ($date == null) {
        $date = Carbon::now()->toDateString();
      }
        return Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();
    }
}
