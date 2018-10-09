<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class dailyReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:dailyReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a daily reminder to anyone who has not filled in their daily dozen';

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
        dd(Carbon::now()->toDateString());
        $date = Carbon::createFromFormat('d/m/Y', Carbon::today());
        dd($date);
    }
}
