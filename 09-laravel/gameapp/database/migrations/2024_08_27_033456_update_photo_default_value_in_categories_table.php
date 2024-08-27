<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Eliminar el valor por defecto antes de renombrar la columna
            $table->string('image')->nullable(false)->default(null)->change();
        });

        Schema::table('categories', function (Blueprint $table) {
            // Renombrar la columna
            $table->renameColumn('image', 'photo');
        });

        Schema::table('categories', function (Blueprint $table) {
            // Volver a agregar el valor por defecto después de renombrar la columna
            $table->string('photo')->nullable(false)->default('no-image.png')->change();
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Eliminar el valor por defecto antes de renombrar la columna
            $table->string('photo')->nullable(false)->default(null)->change();
        });

        Schema::table('categories', function (Blueprint $table) {
            // Renombrar la columna de vuelta a 'image'
            $table->renameColumn('photo', 'image');
        });

        Schema::table('categories', function (Blueprint $table) {
            // Volver a agregar el valor por defecto después de renombrar la columna
            $table->string('image')->nullable(false)->default('no-image.png')->change();
        });
    }
};