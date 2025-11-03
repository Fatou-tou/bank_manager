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
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nomComplet');
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->date('dateNaissance');
            $table->enum('genre', ['homme', 'femme']);
            $table->string('adresse');
            $table->string('cni')->unique();
            $table->string('password');
            $table->timestamps();

            $table->index('nomComplet');
            $table->index('email');
            $table->index('telephone');
            $table->index('dateNaissance');
            $table->index('cni');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
