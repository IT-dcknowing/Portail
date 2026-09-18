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
    { if (!Schema::hasTable('companies')) {
         Schema::create('modifications_entreprise', function (Blueprint $table) {
            $table->id();
            
            // Informations principales de l'entreprise
            $table->enum('forme_juridique', ['sasu', 'sas', 'sarl', 'sa', 'snc', 'autre'])
                  ->comment('Forme juridique de l\'entreprise');
            
            $table->string('denomination_sociale', 255)
                  ->comment('Dénomination sociale de l\'entreprise');
            
            $table->decimal('capital_social', 15, 2)
                  ->comment('Capital social en FCFA');
            
            $table->integer('nombre_associes')
                  ->comment('Nombre d\'associés ou actionnaires');
            
            $table->text('objet_social')
                  ->comment('Objet social de l\'entreprise');
            
            $table->string('siege_social', 500)
                  ->comment('Adresse du siège social');
            
            $table->enum('ville', ['abidjan', 'bouake', 'yamoussoukro', 'korhogo', 'san-pedro', 'autre'])
                  ->comment('Ville où se situe l\'entreprise');
            
            $table->integer('duree_entreprise')
                  ->comment('Durée de vie de l\'entreprise en années');

            // Informations de suivi
            $table->enum('statut', ['en_attente', 'en_cours', 'validee', 'rejetee'])
                  ->default('en_attente')
                  ->comment('Statut de la demande de modification');

            $table->timestamp('date_demande')
                  ->comment('Date de la demande de modification');

            $table->timestamp('date_traitement')
                  ->nullable()
                  ->comment('Date de traitement de la demande');

            $table->text('commentaire_rejet')
                  ->nullable()
                  ->comment('Commentaire en cas de rejet');

            // Informations de traçabilité
            $table->unsignedBigInteger('user_id')
                  ->nullable()
                  ->comment('ID de l\'utilisateur qui a fait la demande');

            $table->unsignedBigInteger('admin_id')
                  ->nullable()
                  ->comment('ID de l\'administrateur qui a traité la demande');

            $table->timestamps();

            // Index pour améliorer les performances
            $table->index('forme_juridique');
            $table->index('ville');
            $table->index('statut');
            $table->index('date_demande');
            $table->index('user_id');

            // Clés étrangères (à décommenter si vous avez les tables users)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('set null');
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modifications_entreprise');
    }
};
