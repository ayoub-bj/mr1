<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCongesTable extends Migration
{
    public function up()
    {
        Schema::create('conges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->text('motif');
            $table->enum('statut', ['en_attente', 'approuve', 'refuse'])->default('en_attente');
            $table->integer('jours_pris')->default(0);
            $table->string('commentaire')->nullable(); // Nouvelle colonne pour les commentaires
            $table->enum('type', ['conge_paye', 'conge_maladie', 'autre'])->default('conge_paye'); // Nouvelle colonne pour le type de congé
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conges');
    }
}


