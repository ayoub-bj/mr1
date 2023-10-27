<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomplissementsTable extends Migration
{
    public function up()
    {
        Schema::create('accomplissements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained(); // Clé étrangère vers la table des employés
            $table->string('tache_projet');
            $table->date('date_accomplissement');
            $table->text('commentaires')->nullable();
            $table->integer('heures_travail')->unsigned();
            $table->integer('pourcentage')->unsigned(); // Champ pour le pourcentage d'accomplissement

            $table->date('date_debut_tache')->nullable();
            $table->date('date_fin_tache')->nullable();
            $table->string('responsable')->nullable();
            $table->timestamps(); // Ajoute automatiquement les colonnes created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('accomplissements');
    }
}
