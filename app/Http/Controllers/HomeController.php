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
        $today = $this->getToday($userId);

        if (empty($today)) {
            $today = $this->createADay($userId);
        }

        $foods = Foods::all();
        $foodNames = Foods::all()->pluck('name');
        $recServings = Foods::all()->pluck('recommended');

        $daysOfUser = Days::where('user_id', $userId)->orderBy('day', 'desc')->get();

        if (count($daysOfUser) < 1) {
            $today = $this->createADay($userId);
            $daysOfUser = Days::where('user_id', $userId)->get();
        }

        return view('user-home')->with([
            'foodNames' => $foodNames,
            'recServings' => $recServings,
            'last7Days' => $daysOfUser,
            'foods' => $foods,
            'today' => $today
        ]);
    }

    public function save(Request $request) {
        $userId = $request->input('userId');
        $today = $this->getToday($userId);
        $foods = $request->input('newValues');
        $today->beans = $foods['beans'];
        $today->greens = $foods['greens'];
        $today->cruciferous = $foods['cruciferous'];
        $today->berries = $foods['berries'];
        $today->fruits = $foods['fruits'];
        $today->vegetables = $foods['vegetables'];
        $today->grains = $foods['grains'];
        $today->flaxseeds = $foods['flaxseeds'];
        $today->nuts = $foods['nuts'];
        $today->spices = $foods['spices'];
        $today->water = $foods['water'];
        $today->save();
    }

    private function createADay($userId){
        $today = new Days();
        $today->user_id = $userId;
        $today->day = Carbon::now()->toDateString();
        $today->save();
        $today = $this->getToday($userId);
        return $today;
    }

    private function getToday($userId) {
        $dateToday = Carbon::now()->toDateString();

        return Days::where('day', $dateToday)
            ->where('user_id', $userId)
            ->first();
    }
}
