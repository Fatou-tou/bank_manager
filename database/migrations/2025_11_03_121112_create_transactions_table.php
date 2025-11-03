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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('typeTransaction', ['dépot', 'retrait']);
            $table->decimal('montant', 15, 2);
            $table->enum('statut', ['en attente', 'complété', 'échoué'])->default('en attente');
            $table->timestamps();

            $table->uuid('compte_id');
            $table->foreign('compte_id')->references('id')->on('comptes')->onDelete('cascade');

            $table->index('typeTransaction');
            $table->index('statut');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
