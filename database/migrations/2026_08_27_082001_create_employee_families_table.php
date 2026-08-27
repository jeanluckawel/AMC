<?php

use App\Enums\FamilyMemberType;
use App\Enums\LifeStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employee_families', function (Blueprint $table) {

            $table->id();

            // employees.ulid est la PK de type ULID
            $table->char('employee_id', 26);

            $table->foreign('employee_id')
                ->references('ulid')
                ->on('employees')
                ->cascadeOnDelete();

            $table->enum(
                'type',
                array_column(FamilyMemberType::cases(), 'value')
            );

            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('post_nom', 100)->nullable();

            $table->date('date_naissance')->nullable();

            $table->string('telephone', 30)->nullable();
            $table->string('profession', 150)->nullable();

            $table->enum(
                'statut_vie',
                array_column(LifeStatus::cases(), 'value')
            )->default(LifeStatus::EN_VIE->value);

            $table->timestamps();

            $table->unique([
                'employee_id',
                'type',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employee_families');
    }
};
