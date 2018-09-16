<?php

namespace App\Console\Commands;

use App\Mail\WelcomeEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class sendWelcomeEmails extends Command
{
    protected $signature = 'mail:welcome';

    protected $description = 'Send welcome emails to new users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $newUsers = User::where('welcome_email', 0)->get();

        foreach ($newUsers as $user) {
            $mailInfo = new \stdClass();
            $mailInfo->receiver = $user->name;
            $mailInfo->sender = 'Matt from Vegaroo';
            Mail::to($user->email)->send(new WelcomeEmail($mailInfo));
            $user->welcome_email = 1;
            $user->save();
        }
    }
}
