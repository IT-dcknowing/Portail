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
            $table->string('piece_identite', 255)->nullable()->change();
            $table->string('justificatif_domicile', 255)->nullable()->change();
            $table->foreignId('user_id')->nullable()->change();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('entreprises', function (Blueprint $table) {
            $table->string('piece_identite', 255)->nullable(false)->change();
            $table->string('justificatif_domicile', 255)->nullable(false)->change();
            $table->foreignId('user_id')->nullable(false)->change();
        });
    }
};

