<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    { if (!Schema::hasTable('companies')) {
        Schema::create('actes_juridiques', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->date('date');
            $table->text('description');
            $table->string('email')->nullable();
            $table->timestamps();
            
            // Index pour améliorer les performances
            $table->index('date');
            $table->index('titre');
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('actes_juridiques');
    }
};
