<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeEntreprisesTable extends Migration
{
    public function up()
    { if (!Schema::hasTable('companies')) {
        Schema::create('demande_entreprises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entreprise_id');
            $table->unsignedBigInteger('user_id'); // Demandeur
            $table->enum('statut', ['soumise', 'en_cours', 'approuvee', 'rejetee'])->default('soumise');
            $table->text('motif_rejet')->nullable();
            $table->unsignedBigInteger('traite_par')->nullable(); // Admin qui traite
            $table->timestamp('date_soumission');
            $table->timestamp('date_traitement')->nullable();
            $table->timestamps();

            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('traite_par')->references('id')->on('users')->onDelete('set null');
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('demande_entreprises');
    }
};
