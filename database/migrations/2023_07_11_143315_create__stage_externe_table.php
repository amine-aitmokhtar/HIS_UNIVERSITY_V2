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
        Schema::create('DemandeStageExterne', function (Blueprint $table) {
            $table->id('idStage');
            $table->string('entreprise');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('statutAssurance');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DemandeStageExterne');
    }
};
