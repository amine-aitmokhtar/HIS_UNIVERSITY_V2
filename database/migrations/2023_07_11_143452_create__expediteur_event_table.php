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
        Schema::create('ExpediteurEvent', function (Blueprint $table) {
            $table->primary(['idDepartCarriere', 'idEvenement']);
            $table->unsignedBigInteger('idDepartCarriere');
            $table->unsignedBigInteger('idEvenement');
            $table->foreign('idDepartCarriere')->references('idDepartCarriere')->on('personnel_departement_carriere');
            $table->foreign('idEvenement')->references('idEvenement')->on('evenement');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpediteurEvent');
    }
};
