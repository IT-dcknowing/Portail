<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRadiationsTable extends Migration
{
    public function up()
    { if (!Schema::hasTable('companies')) {
        Schema::create('radiations', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->string('company_name'); // VARCHAR(255)
            $table->string('siret', 14)->unique(); // VARCHAR(14) UNIQUE
            $table->string('legal_form')->nullable(); // VARCHAR(255) NULL
            $table->text('reason'); // TEXT
            $table->date('date_radiation'); // DATE
            $table->string('contact_email')->nullable(); // VARCHAR(255) NULL
            $table->timestamps(); // created_at & updated_at
        });
    }
    }

    public function down()
    {
        Schema::dropIfExists('radiations');
    }
}
