<?php

namespace App\Console;

use App\Models\ConfiguracionMatricula;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Obtener el primer registro de ConfiguracionMatricula
            $configuracionMatricula = ConfiguracionMatricula::first();
    
            if ($configuracionMatricula) {
                // Obtener el mes actual y el año actual
                $mesActual = Carbon::now()->format('m');
                $anioActual = Carbon::now()->format('Y');
                
                // Obtener el día de vencimiento y el día de segundo vencimiento
                $diaVencimiento = Carbon::parse($configuracionMatricula->fecha_vencimiento)->format('d');
                $diaSegundoVencimiento = Carbon::parse($configuracionMatricula->fecha_segundo_vencimiento)->format('d');
    
                // Construir nuevas fechas de vencimiento y segundo vencimiento
                $configuracionMatricula->fecha_vencimiento = Carbon::parse($anioActual.'-'.$mesActual.'-'.$diaVencimiento)->toDateString();
                $configuracionMatricula->fecha_segundo_vencimiento = Carbon::parse($anioActual.'-'.$mesActual.'-'.$diaSegundoVencimiento)->toDateString();
    
                // Guardar los cambios en la base de datos
                $configuracionMatricula->save();
            }
            /* daily() Ejecuta la tarea una vez al día a las 00:00 (medianoche) */
        })->everyMinute();
        /* 
        
        En Laravel, el método everyMinute() se utiliza para programar una tarea que se ejecuta cada minuto. Sin embargo, hay varias opciones adicionales disponibles para programar tareas en diferentes intervalos. A continuación, te muestro algunas de las opciones más comunes:
        everyMinute(): Ejecuta la tarea cada minuro
        everyFiveMinutes(): Ejecuta la tarea cada 5 minutos.
        everyTenMinutes(): Ejecuta la tarea cada 10 minutos.
        everyThirtyMinutes(): Ejecuta la tarea cada 30 minutos.
        hourly(): Ejecuta la tarea cada hora.
        hourlyAt(): Ejecuta la tarea cada hora en un minuto específico (por ejemplo, hourlyAt(15) ejecuta la tarea en el minuto 15 de cada hora).
        daily(): Ejecuta la tarea una vez al día a las 00:00 (medianoche).
        dailyAt(): Ejecuta la tarea una vez al día en un horario específico (por ejemplo, dailyAt('13:00') ejecuta la tarea todos los días a la 1:00 PM).
        twiceDaily(): Ejecuta la tarea dos veces al día, por defecto a las 00:00 y a las 12:00 (mediodía).
        weekly(): Ejecuta la tarea una vez a la semana los lunes a las 00:00 (medianoche).
        monthly(): Ejecuta la tarea una vez al mes el primer día del mes a las 00:00 (medianoche).
        monthlyOn(): Ejecuta la tarea una vez al mes en un día específico y a una hora específica (por ejemplo, monthlyOn(15, '13:00') ejecuta la tarea el día 15 de cada mes a la 1:00 PM).
        quarterly(): Ejecuta la tarea cada trimestre el primer día del trimestre a las 00:00 (medianoche).
        yearly(): Ejecuta la tarea una vez al año el 1 de enero a las 00:00 (medianoche).
        */
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
