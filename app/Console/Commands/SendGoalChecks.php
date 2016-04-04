<?php

namespace App\Console\Commands;

use App\Goal;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendGoalChecks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'goals:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send goal checking mails';

    /**
     * Create a new command instance.
     *
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
        $today_checks = Goal::where('check_at', '<=', Carbon::now())
            ->where('check_email_sent', false)
            ->get();

        foreach($today_checks as $goal) {
            $data = $goal->toArray();
            \Mail::queue('emails.check_goal', $data, function ($m) use ($goal) {
                $m->from('check@wiplea.com', 'wiPlea');
                $m->to($goal->curator_email, 'wiPlea user')
                    ->subject('Check your wiPlea goal #'.$goal->id.'!');
            });
            $goal->check_email_sent = 1;
            $goal->save();
        }
    }
}
