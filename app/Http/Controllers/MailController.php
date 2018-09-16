<?php
namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use App\Mail\WelcomeEmail;
use App\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function welcome()
    {
        $newUsers = User::where('welcome_email', 0)->get();

        foreach ($newUsers as $user) {
            $mailInfo = new \stdClass();
            $mailInfo->receiver = $user->name;
            $mailInfo->sender = 'Matt from Vegaroo';
            Mail::to($user->email)->send(new WelcomeEmail($mailInfo));
            $user->welcome_email = 1;
            $user->save();
            die;
        }
    }
}
