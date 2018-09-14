<?php

namespace App\Http\Controllers;

use App\recipe;
use Illuminate\Http\Request;
use App\Foods;

class LandingController extends Controller
{
    public function home() {
        $recipes = recipe::orderBy('upvotes', 'desc')->limit(4)->get();
        return view('landingPage')->with([
            'recipes' => $recipes
        ]);
    }

    public function dashboard() {
        $recServings = Foods::all()->pluck('recommended');
        $foods = Foods::all();
        $today = new \stdClass();
        foreach ($foods as $food) {
            $slug = $food->slug;
            $today->$slug = 0;
        }
        $today->id = 0;
        $today->percentage = 0;

        return view('dashboard')->with([
            'recServings' => $recServings,
            'foods' => $foods,
            'today' => $today,
        ]);
    }
}
