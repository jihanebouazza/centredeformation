<?php

namespace App\Console;

use App\Models\Groupe;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $now = now();
            $groupeQuery = Groupe::where('date_debut', '<=', $now)
                ->where('statut', '!=', 'started');
    
            $groupeQuery->update(['statut' => 'started']);
        })->daily();
    
        $schedule->call(function () {
            $now = now();
            $groupeQuery = Groupe::where('date_fin', '<=', $now)
                ->where('statut', '!=', 'finished');
    
            $groupeQuery->update(['statut' => 'finished']);
        })->daily();
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
