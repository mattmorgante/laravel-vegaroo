<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailInfo;

    public function __construct($mailInfo)
    {
        $this->mailInfo = $mailInfo;
    }

    public function build()
    {
        return $this->from('matthewmorgante@gmail.com')
            ->view('mails.welcome')
            ->text('mails.welcome_plain');
    }
}