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
        Schema::create('ExpediteurFormulaire', function (Blueprint $table) {
            $table->primary(['idEtud', 'idEvenement']);
            $table->unsignedBigInteger('idEtud');
            $table->unsignedBigInteger('idEvenement');
            $table->foreign('idEvenement')->references('idEvenement')->on('Evenement');
            $table->foreign('idEtud')->references('idEtud')->on('etudiants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpediteurFormulaire');
    }
};
