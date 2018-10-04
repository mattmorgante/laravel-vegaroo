<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ingredient;

class BlueprintController extends Controller
{
    public function index() { 
        $ingredients = Ingredient::get();
        return view('blueprint')->with([
            'ingredients' => $ingredients
        ]);
    }
}
