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
        Schema::create('notifications', function (Blueprint $table) {
            $table->primary(['idPersoAdm', 'idEtud']);
            $table->unsignedBigInteger('idPersoAdm');
            $table->unsignedBigInteger('idEtud');
            $table->foreign('idPersoAdm')->references('idPersoAdm')->on('personnel_administratifs');
            $table->foreign('idEtud')->references('idEtud')->on('etudiants');
            $table->timestamps('');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
