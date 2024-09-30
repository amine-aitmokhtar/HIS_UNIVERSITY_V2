<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('SujetEtudiant', function (Blueprint $table) {
            $table->unsignedBigInteger('idSujetPFE');
            $table->unsignedBigInteger('idEtud');
            $table->foreign('idSujetPFE')->references('idSujetPFE')->on('SujetPFE');
            $table->foreign('idEtud')->references('idEtud')->on('etudiants');
            $table->timestamps();

            // Définir la clé primaire composite
            $table->primary(['idSujetPFE', 'idEtud']);
        });
    }

    /**
     * Revert les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('SujetEtudiant');
    }
};

