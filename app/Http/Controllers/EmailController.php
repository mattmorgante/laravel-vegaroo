<?php

namespace App\Http\Controllers;

use App\Email;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function create(Request $request) {
        $data = $request->all();
        $email = $data['email'];
        $subscriber = new Email();
        $subscriber->email = $email;
        $subscriber->save();
    }

}
