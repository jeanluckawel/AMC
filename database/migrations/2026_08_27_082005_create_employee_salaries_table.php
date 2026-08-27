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
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->ulid();

            $table->foreignUlid('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();

            $table->foreignUlid('employee_assignment_id')
                ->nullable()
                ->constrained('employee_assignments')
                ->nullOnDelete();

            $table->decimal('taux_horaire_brut_fc', 15, 2)->nullable();

            $table->decimal('salaire_mensuel_brut_fc', 15, 2)->nullable();

            $table->date('date_effet');
            $table->date('date_fin')->nullable();

            $table->boolean('actif')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_salaries');
    }
};
