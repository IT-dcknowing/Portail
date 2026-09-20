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
    { if (Schema::hasTable('modifications_entreprise') && Schema::hasTable('radiations')) {
        // Table Modification
        Schema::table('modifications_entreprise', function (Blueprint $table) {
            $table->string('ville', 100)->change();
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });

        // Table Radiation
        Schema::table('radiations', function (Blueprint $table) {
            $table->string('siret', 50)->change(); 
            // Drop unique index for siret if it exists
            $table->dropUnique(['siret']); 
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modifications_entreprise', function (Blueprint $table) {
            $table->enum('ville', ['abidjan', 'bouake', 'yamoussoukro', 'korhogo', 'san-pedro', 'autre'])->change();
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });

        Schema::table('radiations', function (Blueprint $table) {
            $table->string('siret', 14)->unique()->change();
            $table->dropColumn('user_id');
        });
    }
};

