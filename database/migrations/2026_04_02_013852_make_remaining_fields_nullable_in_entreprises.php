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
    { if (Schema::hasTable('entreprises')) {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->string('nationalite', 100)->nullable()->change();
            $table->date('date_naissance')->nullable()->change();
            $table->string('lieu_naissance', 255)->nullable()->change();
            $table->string('adresse_representant', 255)->nullable()->change();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->string('nationalite', 100)->nullable(false)->change();
            $table->date('date_naissance')->nullable(false)->change();
            $table->string('lieu_naissance', 255)->nullable(false)->change();
            $table->string('adresse_representant', 255)->nullable(false)->change();
        });
    }
};

