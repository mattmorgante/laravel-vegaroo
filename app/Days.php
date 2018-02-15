<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    protected $table = 'days';

    public function last7DaysOfAUser($userId) {
        $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->toArray();
        return $weekData;
    }

    public function createADay($userId, $day){
        $today = new Days();
        $today->user_id = $userId;
        $today->day = $day;
        $today->save();
        $today = $this->getADay($userId, $day);
        return $today;
    }

    private function getAday($userId, $date = null) {
      if ($date == null) {
        $date = Carbon::now()->toDateString();
      }
        return Days::where('day', $date)
            ->where('user_id', $userId)
            ->first();
    }
}
