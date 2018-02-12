<?php

namespace App\Console\Commands;

use App\Days;
use App\User;
use Illuminate\Console\Command;

class createWeeklyScore extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:weeklyScore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $days = new Days();
        $users = User::get();

        foreach ( $users as $user ) {
            $weekData = $days->last7DaysOfAUser($user->id);
            $weekScore = 0;
            foreach ($weekData as $today) {
                $sum = $today->beans + $today->greens + $today->cruciferous + $today->berries + $today->fruits + $today->vegetables + $today->grains + $today->flaxseeds + $today->nuts + $today->spices + $today->water;
                $weekScore = $weekScore + $sum;
            } // end day
            //ToDo: add to weekly score table! Or....add sum to table days?
        } // end user

    }
}
