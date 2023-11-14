<?php

namespace App\Console\Commands;

use App\Models\RemoveImages;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RemoveImagesCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-images-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elimina las imágenes de SPACE de DIGITAL OCEAN que fueron cargadas pero no asociadas al formulario';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /* Busca en la tabla las imágenes no asociadas que llevan más de 3 días y las elimina de SPACE*/
        $tresDias = Carbon::now()->subDays(3);

        $imgNoAsociadas = RemoveImages::where('estado', 'sin_asociar')
                                    ->whereDate('created_at', '<=', $tresDias)
                                    ->get();

        foreach ($imgNoAsociadas as $image) {

            Storage::disk('spaces')->delete($image->ruta);
            $image->delete();
        }
    }
}
