<?php

use App\Enums\AssignmentStatus;
use App\Enums\EmployeeCategory;
use App\Enums\EmployeeGrade;
use App\Enums\EmployeeLevel;
use App\Enums\EmployeePosition;
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
        Schema::create('employee_assignments', function (Blueprint $table) {
            $table->ulid();

            // Relations
            $table->foreignUlid('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();

            $table->foreignUlid('department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->foreignUlid('job_id')
                ->nullable()
                ->constrained('jobs')
                ->nullOnDelete();

            $table->foreignUlid('contract_type_id')
                ->nullable()
                ->constrained('contract_types')
                ->nullOnDelete();

            $table->foreignUlid('work_schedule_id')
                ->nullable()
                ->constrained('work_schedules')
                ->nullOnDelete();

            // Catégorie
            $table->enum(
                'categorie',
                array_column(EmployeeCategory::cases(), 'value')
            )->nullable();

            // Niveau
            $table->enum(
                'niveau',
                array_column(EmployeeLevel::cases(), 'value')
            )->nullable();

            // Grade
            $table->enum(
                'grade',
                array_column(EmployeeGrade::cases(), 'value')
            )->nullable();

            // Échelon
            $table->string('echelon', 50)->nullable();

            // Coefficient
            $table->decimal('coefficient', 10, 4)->nullable();

            // Position
            $table->enum(
                'position',
                array_column(EmployeePosition::cases(), 'value')
            )->nullable();

            // Dates
            $table->date('date_embauche')->nullable();
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();

            // Situation avant embauche
            $table->text('situation_avant_embauche')->nullable();

            // Statut
            $table->enum(
                'statut',
                array_column(AssignmentStatus::cases(), 'value')
            )->default(AssignmentStatus::ACTIVE->value);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_assignments');
    }
};
