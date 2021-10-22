<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderMail;
use App\Models\User;
use Carbon\Carbon;
use DateTime;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email';

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

        $today = Carbon::now()->format('Y-m-d H:i:00');
        $schedules = \App\Schedule::all();
        //dd($today,$schedules);
        $dtn1 = new Carbon();
        $dt1 = $dtn1->addMinutes(30)->format('Y-m-d H:i:00');
        $dtn2 = new Carbon();
        $dt2 = $dtn2->addMinutes(45)->format('Y-m-d H:i:00');

        foreach ($schedules as $schedule) {
            $day = new Carbon($schedule->day);

            if ($day >= $today) {
                dd($day->diffInMinutes($today));
                if ($schedule->reminder == 1) {

                    //$time = Carbon::parse($schedule->day)->between($dt1, $dt2);

                    if ($day->diffInMinutes($today) == 30) {
                        echo '送信';
                        $user = \App\User::find($schedule->user_id);
                        Mail::to($user->email)->send(new ReminderMail($schedule));
                    } else {
                        echo 'false';
                    }
                }
            }
        }
    }
}
