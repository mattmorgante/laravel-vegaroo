<?php

namespace App\Http\Controllers;

use App\Days;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function save(Request $request) {
        $today = Days::where('id', $request->input('dayId'))->first();
        $today->{$request->input('food')} = $request->input('value');
        $today->save();
    }
}
