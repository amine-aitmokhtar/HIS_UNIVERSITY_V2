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
        Schema::create('ExpediteurSujetPFE', function (Blueprint $table) {
            $table->primary(['idDepartCarriere', 'idSujetPFE']);
            $table->unsignedBigInteger('idDepartCarriere');
            $table->unsignedBigInteger('idSujetPFE');
            $table->foreign('idDepartCarriere')->references('idDepartCarriere')->on('personnel_departement_carriere');
            $table->foreign('idSujetPFE')->references('idSujetPFE')->on('SujetPFE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ExpediteurSujetPFE');
    }
};
