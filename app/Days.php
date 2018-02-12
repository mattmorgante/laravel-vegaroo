<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    protected $table = 'days';

    public function last7DaysOfAUser($userId) {
        $weekData = Days::where('user_id', $userId)->orderBy('day', 'desc')->limit(7)->toArray();
        return $weekData;
    }
}
