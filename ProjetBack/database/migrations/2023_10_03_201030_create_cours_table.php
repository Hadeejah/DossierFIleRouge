<?php

use App\Models\Classe;
use App\Models\Module;
use App\Models\Semestre;
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
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Semestre::class)->constrained();
            $table->foreignId('prof_id')->constrained('users');
            $table->foreignIdFor(Classe::class)->constrained();
            $table->foreignIdFor(Module::class)->constrained();
            $table->integer('nbre_heure');
            $table->enum('etatCours',['Termine','en_cours'])->default('en_cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cours');
    }
};
