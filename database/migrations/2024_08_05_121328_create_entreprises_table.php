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
        // On vérifie si la table existe déjà avant de tenter de la créer
        if (!Schema::hasTable('entreprises')) {
            Schema::create('entreprises', function (Blueprint $table) {
                $table->id();

                // Étape 1 : Informations générales de l'entreprise
                $table->enum('forme_juridique', ['sasu', 'sas', 'sarl', 'sa', 'snc', 'autre']);
                $table->string('denomination_sociale', 255);
                $table->decimal('capital_social', 15, 2);
                $table->integer('nombre_associes');
                $table->text('objet_social');
                $table->string('siege_social', 500);
                $table->string('ville', 100); 
                $table->integer('duree_entreprise');

                // Étape 2 : Représentant légal
                $table->string('nom_representant', 255)->nullable();
                $table->string('nationalite', 100)->nullable();
                $table->date('date_naissance')->nullable();
                $table->string('lieu_naissance', 255)->nullable();
                $table->string('adresse_representant', 255)->nullable();
                $table->string('telephone', 20)->nullable();
                $table->string('email', 255)->nullable();

                // Étape 3 : Pièces justificatives
                $table->string('piece_identite', 255)->nullable();
                $table->string('justificatif_domicile', 255)->nullable();
                $table->json('autres_documents')->nullable();

                // Statut & relation utilisateur
                $table->enum('statut', ['en_attente', 'valide', 'rejete'])->default('en_attente');
                
                // Correction pour éviter l'erreur de clé étrangère
                $table->unsignedBigInteger('user_id')->nullable();

                // Timestamps
                $table->timestamp('date_demande')->useCurrent();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
