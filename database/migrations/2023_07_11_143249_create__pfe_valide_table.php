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
        Schema::create('PfeValide', function (Blueprint $table) {
            $table->primary(['idSujetPFE', 'idEtud']);
            $table->unsignedBigInteger('idSujetPFE');
            $table->unsignedBigInteger('idEtud');
            $table->string('sujetValide');
            $table->foreign('idSujetPFE')->references('idSujetPFE')->on('SujetPFE');
            $table->foreign('idEtud')->references('idEtud')->on('etudiants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PfeValide');
    }
};
