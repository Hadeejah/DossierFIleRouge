<?php

use App\Models\Cours;
use App\Models\Salle;
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
        Schema::create('session_de_cours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Cours::class)->constrained();
            $table->date('date');
            $table->string('hDebut');
            $table->string('hFin');
            $table->string('Duree');
            $table->boolean('etatAnnule')->default('1');
            $table->boolean('etatValide')->default('0');
            $table->foreignIdFor(Salle::class)->constrained()->nullable();
            $table->foreignId('attache_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_de_cours');
    }
};
