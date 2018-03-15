<?php

namespace App\Console\Commands;

use App\Days;
use App\HistoricalScore;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class fillHistoricalScores extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fill:historical';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill the historical scores table';

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
            $score = 0;
            $days = Days::where('user_id', $user->id)->orderBy('day', 'desc')->limit(7)->get();
            foreach ($days as $day) {
                $sum = $this->sumADay($day);
                $score = $score + $sum;
            }
            $historicalScore = new HistoricalScore();
            $historicalScore->startDate = Carbon::now()->toDateString();
            $historicalScore->score = $score;
            $historicalScore->user_id = $user->id;
            $historicalScore->save();
        }
    }

    private function sumADay($day) {
        return $day->beans + $day->greens + $day->cruciferous + $day->berries + $day->fruits + $day->vegetables + $day->grains + $day->flaxseeds + $day->nuts + $day->spices + $day->water + $day->exercise;
    }
}
