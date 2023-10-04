<?php

use App\Models\Classe;
use App\Models\SessionDeCours;
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
        Schema::create('session_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SessionDeCours::class)->constrained();
            $table->foreignIdFor(Classe::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_classe│s');
    }
};
