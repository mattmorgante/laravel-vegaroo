<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Foods;

class LandingController extends Controller
{
    public function home() {
      // dont need this until save!
      // $date = Carbon::now()->today();
      // $today = Days::createADay($userId, $date);

      $recServings = Foods::all()->pluck('recommended');
      $foods = Foods::all();
      $today = new \stdClass();
      foreach ($foods as $food) {
        $slug = $food->slug;
        $today->$slug = 0;
      }
      $today->id = 0;
      $today->percentage = 0;

      return view('landingPage')->with([
        'recServings' => $recServings,
        'foods' => $foods,
        'today' => $today

      ]);

    }
}
