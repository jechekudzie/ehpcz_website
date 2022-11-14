<?php

namespace App\Console;

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
        Commands\RenewalReminder::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //$schedule->command('send:reminder')->twiceMonthly(1, 15, '00:00');
        //$schedule->command('send:reminder')->everyMinute();

        // start the queue worker, if its not running
        $schedule->command('queue:work --daemon')->everyMinute()->withoutOverlapping();
        //$schedule->command('queue:work --daemon')->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */



    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
