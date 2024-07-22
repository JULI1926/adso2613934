<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateImagePaths extends Command
{
    protected $signature = 'update:image-paths';
    protected $description = 'Actualizar las rutas de las imágenes en la base de datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Actualizando las rutas de las imágenes...');

        $images = DB::table('your_table_name')->get();

        foreach ($images as $image) {
            // Ajusta según el nombre de tu columna y tabla
            $correctedUrl = str_replace('\\', '/', $image->image_url);

            // Asegurarse de que la ruta es relativa al directorio público
            $correctedUrl = str_replace('c/image', 'image', $correctedUrl);

            DB::table('your_table_name')
                ->where('id', $image->id)
                ->update(['image_url' => $correctedUrl]);
        }

        $this->info('Actualización completa.');
    }
}
