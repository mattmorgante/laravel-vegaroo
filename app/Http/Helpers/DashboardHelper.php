<?php

namespace App\Http\Helpers;

use App\Days;
use App\Foods;
use App\recipe;
use Carbon\Carbon;

class DashboardHelper {
    const dailyTotal = 25;
    const weeklyTotal = 175;

    public function createToday($date, $userId) {
        $today = Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();
        if (empty($today)) {
            $today = $this->makeADay($userId, $date);
        }
        $today->sum = $this->sumADay($today);
        $today->percentage = $this->calculatePercentage($today);
        return $today;
    }

    public function calculatePercentagesOfAWeek($days) {
        $percentages = []; $i = 0;
        foreach ($days as $day) {
            $day->sum = $this->sumADay($day);
            $day->percentage = $this->calculatePercentage($day);
            $percentages[$i] = $day->percentage;
            $i++;
        }
        return $percentages;
    }

    public function sumADay($day) {
        return $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water + $day->exercise;
    }

    public function calculatePercentage($today) {
        $percentage = $today->sum / self::dailyTotal;
        if ($percentage > 1){
            $percentage = 1;
        }
        return 100*(round($percentage, 2));
    }

    public function makeADay($userId, $date) {
        $days = new Days();
        return $days->createADay($userId, $date);
    }

    public function createWeek($userId) {
        $foods = Foods::all();
        $week = [];
        foreach ($foods as $food) {
            $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->pluck($food->slug)->toArray();
            $weekPercentage = array_sum($weekData) / ($food->recommended * 7);
            $week[$food->name] = 100*(round($weekPercentage, 2));
        }
        return $week;
    }

    public function createDisplayDate($date) {
        $explodedDate = explode('-', $date);
        $displayDate = Carbon::createFromDate($explodedDate[0], $explodedDate[1], $explodedDate[2]);
        return $displayDate->toFormattedDateString();
    }

    public function assembleRecipes($foods, $today) {
        $recommendedRecipes = []; $categoriesComplete = 0;
        foreach ($foods as $food) {
            if ($food->recommended > $today->{"$food->slug"}) {
                $recipes = recipe::getRecipeByTag($food->slug, 4);
                $recommendedRecipes[$food->name] = $recipes;
            } else {
                $categoriesComplete++;
            }
        }
        return array($recommendedRecipes, $categoriesComplete);
    }

    public function calculateWeekScore($days) {
        $weekScore = 0;
        foreach ($days as $today) {
            $sum = $this->sumADay($today);
            $weekScore = $weekScore + $sum;
        }
        $weekScore = $weekScore / self::weeklyTotal;
        $weekScore = 100 * (round($weekScore, 2));
        return $weekScore;
    }

    public function createLast7Days() {
        $last7days = [];
        for ($i=0;$i<7; $i++) {
            $last7days[$i] = Carbon::now()->subDays($i)->format('M d');
        }
        return $last7days;
    }
}