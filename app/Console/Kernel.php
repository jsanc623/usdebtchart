<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('update-data')
            ->everyMinute()
            ->before(function () {
                Mail::raw('Starting', function ($message) {
                    $address = env('ADMIN_EMAIL') ?? "";
                    $message->from($address, $name = null);
                    $message->sender($address, $name = null);
                    $message->to($address, $name = null);
                    $message->replyTo($address, $name = null);
                    $message->subject("USDebtChart.com Scheduled Updated Data");
                });
            })
            ->after(function () {
                Mail::raw('Finished', function ($message) {
                    $address = env('ADMIN_EMAIL') ?? "";
                    $message->from($address, $name = null);
                    $message->sender($address, $name = null);
                    $message->to($address, $name = null);
                    $message->replyTo($address, $name = null);
                    $message->subject("USDebtChart.com Scheduled Updated Data");
                });
            });
        //$schedule->command('update-data')->dailyAt('02:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
