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
    Schema::create('entreprises', function (Blueprint $table) {
        $table->id();

        // Étape 1 : Informations générales de l'entreprise
        $table->enum('forme_juridique', ['sasu', 'sas', 'sarl', 'sa', 'snc', 'autre']);
        $table->string('denomination_sociale', 255);
        $table->decimal('capital_social', 15, 2);
        $table->integer('nombre_associes');
        $table->text('objet_social');
        $table->string('siege_social', 500);
        $table->enum('ville', ['abidjan', 'bouake', 'yamoussoukro', 'korhogo', 'san-pedro', 'autre']);
        $table->integer('duree_entreprise');

        // Étape 2 : Représentant légal
        $table->string('nom_representant', 255);
        $table->string('nationalite', 100);
        $table->date('date_naissance');
        $table->string('lieu_naissance', 255);
        $table->string('adresse_representant', 255);
        $table->string('telephone', 20);
        $table->string('email', 255);

        // Étape 3 : Pièces justificatives
        $table->string('piece_identite', 255);
        $table->string('justificatif_domicile', 255);
        $table->json('autres_documents')->nullable(); // JSON pour stocker plusieurs fichiers

        // Statut & relation utilisateur
        $table->enum('statut', ['en_attente', 'valide', 'rejete'])->default('en_attente');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        // Timestamps
        $table->timestamp('date_demande')->useCurrent();
        $table->timestamps();
    });
}

};
