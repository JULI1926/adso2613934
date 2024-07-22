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

        try {
            $images = DB::table('users')->get();

            foreach ($images as $image) {
                $correctedUrl = str_replace('\\', '/', $image->photo);
                $correctedUrl = str_replace('/image/image', '/image', $correctedUrl);

                DB::table('users')
                    ->where('id', $image->id)
                    ->update(['photo' => $correctedUrl]);
            }

            $this->info('Las rutas de las imágenes han sido actualizadas exitosamente.');
        } catch (\Exception $e) {
            $this->error('Ha ocurrido un error durante la actualización: ' . $e->getMessage());
        }
    }
}