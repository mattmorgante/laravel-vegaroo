<?php

namespace App\Console\Commands;

use App\User;
use Exception;
use Illuminate\Console\Command;
use PHPMailer\PHPMailer\PHPMailer;

class sendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily reminder to fill out the daily dozen';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $users = User::where('reminder', 1)->get();

        foreach ($users as $user) {
            $mail = new PHPMailer;

// notice the \ you have to use root namespace here
            try {
                $mail->isSMTP(); // tell to use smtp
                $mail->CharSet = 'utf-8'; // set charset to utf8
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = false;
                $mail->Username = "matthewmorgante";
                $mail->Password = "secret";
                $mail->setFrom("matthewmorgante@gmail.com", 'matt');
                $mail->Subject = "Fill in your daily dozen";
                $mail->MsgHTML('Friendly reminder to fill in your daily dozen at https://vegaroo.co/home');
                $mail->addAddress($user->email, 'test');
                $mail->addReplyTo('matthewmorgante@gmail.com', 'Vegaroo');
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                if ($mail->send()) {
                    dd('success');
                } else {
                    dd($mail->ErrorInfo);

                }
            } catch (Exception $e) {
                dd($e);
            }
        }
    }
}
