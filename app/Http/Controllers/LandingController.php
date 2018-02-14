<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home() {

      return view('landingPage')->with([
        // 'recipes' => $recipes

      ]);

    }
}
