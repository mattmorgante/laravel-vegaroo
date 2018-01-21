<?php

namespace App\Http\Controllers;

use App\Days;
use App\Foods;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the user dashboard.
     */
    public function userIndex()
    {
        $userId = (Auth::user()->id);

        $today = Carbon::now()->toDateString();

        $foods = Foods::all();
        $foodNames = Foods::all()->pluck('name');
        $recServings = Foods::all()->pluck('recommended');
        $last7Days = Days::where('user_id', $userId)->get();
        $today = Days::where('day', $today)
            ->where('user_id', $userId)
            ->first();

        return view('user-home')->with([
            'foodNames' => $foodNames,
            'recServings' => $recServings,
            'last7Days' => $last7Days,
            'foods' => $foods,
            'today' => $today
        ]);
    }
}
