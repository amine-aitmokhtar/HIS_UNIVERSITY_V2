<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatsTable extends Migration
{
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->bigIncrements('idCand');
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('sexe')->nullable();
            $table->date('dateNaiss')->nullable();
            $table->string('villeNaiss')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pays')->nullable();
            $table->unsignedInteger('codePostal')->nullable();
            $table->string('ville')->nullable();
            $table->unsignedInteger('anneeBac')->nullable();
            $table->unsignedInteger('scoreBac')->nullable();
            $table->string('serieBac')->nullable();
            $table->string('nomLycee')->nullable();
            $table->string('langueMat1')->nullable();
            $table->string('langueMat2')->nullable();
            $table->string('niveauFr')->nullable();
            $table->string('niveauEn')->nullable();
            $table->string('situationCand')->nullable();
            $table->string('connaissHis')->nullable();
            $table->binary('photoFILE')->nullable();
            $table->binary('idPDF')->nullable();
            $table->binary('note_trimestre_PDF')->nullable();
            $table->binary('note_bac_PDF')->nullable();
            $table->binary('diplome_bac_PDF')->nullable();
            $table->binary('note_univ_PDF')->nullable();
            $table->binary('releve_note_univ_PDF')->nullable();
            $table->binary('diplome_univ_PDF')->nullable();
            $table->binary('certificat_univ_PDF')->nullable();
            $table->string('paiement')->nullable();
            $table->unsignedBigInteger('idUser');
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('candidats');
    }
}
