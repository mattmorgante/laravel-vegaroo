<?php

namespace App\Http\Controllers;

use App\Days;
use App\Foods;
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


        foreach ($daysOfUser as $day) {
            $day->sum = $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water;

            $day->percentage = $day->sum / 26;
            if ($day->percentage > 1){
                $day->percentage = 1;
            }

            $day->percentage = 100*(round($day->percentage, 2));

        }

        $sums = [];
        foreach ($foods as $food) {
            $sum = Days::where('user_id', $userId)->orderBy('day', 'desc')->take(7)->pluck($food->slug)->sum();

            $recommendedWeekly = ($food->recommended * 7);

            $sums[$food->slug] = 100*(round($sum / $recommendedWeekly, 2));
        }


        return view('user-home')->with([
            'foodNames' => $foodNames,
            'recServings' => $recServings,
            'daysOfUser' => $daysOfUser,
            'foods' => $foods,
            'today' => $today,
            'sums' => $sums
        ]);
    }

    public function userIndex2(Request $request){
        $userId = (Auth::user()->id);

        $date = $request->date;

        if ($date == null) {
            $todayFormatted = Carbon::now()->toDateString();
            return Redirect::to('home2/' . $todayFormatted);
        }

        $date2 = explode('-', $date);

        $displayDate = Carbon::createFromDate($date2[0], $date2[1], $date2[2]);

        $displayDate = $displayDate->toFormattedDateString();

        $today = Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();


        if (empty($today)) {
            $today = $this->createADay($userId);
        }

        $today->sum = $today->beans + $today->greens + $today->cruciferous + $today->berries + $today->fruits + $today->vegetables + $today->grains + $today->flaxseeds + $today->nuts + $today->spices + $today->water;

        $today->percentage = $today->sum / 26;
        if ($today->percentage > 1){
            $today->percentage = 1;
        }

        $today->percentage = 100*(round($today->percentage, 2));

        $foods = Foods::all();

        $foodNames = Foods::all()->pluck('name');
        $recServings = Foods::all()->pluck('recommended');

        $daysOfUser = Days::where('user_id', $userId)->orderBy('day', 'desc')->get();

        $week = [];
        foreach ($foods as $food) {
            $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->pluck($food->slug)->toArray();
            $weekRecommended = $food->recommended * 7;
            $weekPercentage = array_sum($weekData) / $weekRecommended;
            $week[$food->slug] = 100*(round($weekPercentage, 2));
        }

        $percentages =[];
        $days = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->get();
        $i =0;
        foreach ($days as $day) {

            $day->sum = $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water;

            $day->percentage = $day->sum / 26;
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


        return view('user-home-2')->with([
            'foodNames' => $foodNames,
            'recServings' => $recServings,
            'daysOfUser' => $daysOfUser,
            'foods' => $foods,
            'today' => $today,
            'week' => $week,
            'percentage' => $percentages,
            'days' => $last7days,
            'displayDate' => $displayDate
        ]);
    }

    public function save2(Request $request) {
        $today = Days::where('id', $request->input('dayId'))->first();
        $food = $request->input('food');
        $today->{$food} = $request->input('value');
        $today->save();
    }

    public function save(Request $request) {
        $today = Days::where('id', $request->input('dayId'))->first();
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
