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
        Schema::create('PDF', function (Blueprint $table) {
            $table->id('idPDF');
            $table->string('titre');
            $table->string('nomSpecialite');
            $table->string('annee');
            $table->string('semestre');
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('PDF');
    }
};
