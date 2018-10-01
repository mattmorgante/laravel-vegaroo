<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recipe;

class RecipeGroupsController extends Controller
{
    public function weeknight() { 
        return view('recipeGroups/weeknight')->with([
            'recipes' => recipe::where('quick_dinner', 1)->get()
        ]);
    }

    public function dairySwap() { 
        return view('recipeGroups/dairy-swap')->with([
            'recipes' => recipe::where('dairy_swap', 1)->get()
        ]);
    }

    public function highProtein() { 
        return view('recipeGroups/high-protein')->with([
            'recipes' => recipe::where('high_protein', 1)->get()
        ]);
    }

    public function leftovers() { 
        return view('recipeGroups/leftovers')->with([
            'recipes' => recipe::where('leftovers', 1)->get()
        ]);
    }

    public function rawFood() { 
        return view('recipeGroups/raw-food')->with([
            'recipes' => recipe::where('raw_food', 1)->get()
        ]);
    }
}
