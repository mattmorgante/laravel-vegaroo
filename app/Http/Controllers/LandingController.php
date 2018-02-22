<?php

namespace App\Http\Controllers;

use App\recipe;
use Illuminate\Http\Request;
use App\Foods;

class LandingController extends Controller
{
    public function home() {
      $recServings = Foods::all()->pluck('recommended');
      $foods = Foods::all();
      $today = new \stdClass();
      foreach ($foods as $food) {
        $slug = $food->slug;
        $today->$slug = 0;
      }
      $today->id = 0;
      $today->percentage = 0;

      $recipe = new recipe();
      list($breakfasts, $salads, $bowls, $curries, $stirFries, $classics, $snacks, $smoothies, $sides) = $recipe::getAllCategories();

      return view('landingPage')->with([
        'recServings' => $recServings,
        'foods' => $foods,
        'today' => $today,
          'bowls' => $bowls,
          'curries' => $curries,
          'stirFries' => $stirFries
      ]);

    }
}
