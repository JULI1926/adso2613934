<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\UpdateImagePaths::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Definición de tareas programadas
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        // Registro de comandos basados en el cierre
    }

    
}