<?php

namespace App\Console;

use App\Goal;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
//         Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $today_checks = Goal::where('check_at','<=',Carbon::now())
                ->where('check_email_sent', false)
                ->get();

            foreach($today_checks as $goal) {
                \Mail::queue('emails.check_goal', $goal, function ($m) use ($goal) {
                    $m->from('check@wiplea.com', 'wiPlea');
                    $m->to($goal->curator_email, 'wiPlea user')->subject('Check your wiPlea goal!');
                });
                $goal->check_email_sent = 1;
                $goal->save();
            }
        })->daily();
    }
}
