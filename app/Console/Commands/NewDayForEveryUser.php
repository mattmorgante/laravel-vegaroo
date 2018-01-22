<?php

namespace App\Console\Commands;

use App\Days;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class NewDayForEveryUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:newDay';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new instance of Day for every User';

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
        $users = User::all();
        foreach ($users as $user) {
            $dateToday = Carbon::now()->toDateString();
            $day = new Days();
            $day->user_id = $user->id;
            $day->day = $dateToday;
            Log::info('adding new day for user with email: ' .$user->email);
            $day->save();
        }
    }
}
