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
        Schema::create('comptes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('solde_initial', 15, 2); 
            $table->string('numero_compte')->unique();
            $table->enum('statut', ['actif', 'bloqué', 'archivé'])->default('actif');
            $table->enum('type', ['courant', 'épargne', 'Chèque'])->default('courant');
            $table->enum('devise', ['xof', 'usd', 'eur'])->default('xof');
            $table->string('motif_blocage')->nullable();
            $table->timestamps();

            $table->uuid('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->index('numero_compte');
            $table->index('motif_blocage');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
