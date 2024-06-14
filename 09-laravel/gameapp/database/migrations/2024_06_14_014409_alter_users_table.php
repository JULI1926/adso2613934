<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema:table('users', function(Blueprint $table){
            //$table->renameColumn('fullname', 'fullname');
            $table->string('gender')->before('birthdate');
            $table->string('role')->default('Customer')->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema:table('users', function(Blueprint $table){
            //$table->renameColumn('fullname', 'fullname');
            $table->string('fullname')->after('gender');
            $table->dropColumn('gender','role');
        });
    }
};
