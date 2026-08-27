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
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->ulid();

            $table->string('code', 50)->unique();
            $table->string('name', 100);

            $table->time('heure_debut')->nullable();
            $table->time('heure_fin')->nullable();

            $table->decimal('nombre_heures', 5, 2)->nullable();

            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_schedules');
    }
};
