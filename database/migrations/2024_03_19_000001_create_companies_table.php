<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // On vérifie si la table existe déjà
        if (!Schema::hasTable('companies')) {
            Schema::create('companies', function (Blueprint $table) {
                $table->id();
                
                // Correction pour éviter l'erreur de clé étrangère sur le serveur
                $table->unsignedBigInteger('user_id')->nullable();
                
                $table->string('company_name');
                $table->string('legal_form');
                $table->string('siret')->nullable();
                $table->string('address');
                $table->string('postal_code');
                $table->string('city');
                $table->string('creation_status')->default('pending');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
