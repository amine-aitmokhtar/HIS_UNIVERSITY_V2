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
        Schema::create('ExpediteurStageExterne', function (Blueprint $table) {
            $table->primary(['idDepartCarriere', 'idStage']);
            $table->unsignedBigInteger('idDepartCarriere');
            $table->unsignedBigInteger('idStage');
            $table->foreign('idDepartCarriere')->references('idDepartCarriere')->on('personnel_departement_carriere');
            $table->foreign('idStage')->references('idStage')->on('DemandeStageExterne');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpediteurStageExterne');
    }
};
