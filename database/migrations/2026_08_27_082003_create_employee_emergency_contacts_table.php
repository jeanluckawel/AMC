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
        Schema::create('employee_emergency_contacts', function (Blueprint $table) {
            $table->ulid();

            $table->foreignUlid('employee_id')
                ->constrained('employees')
                ->cascadeOnDelete();

            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('post_nom', 100)->nullable();

            $table->string('telephone', 30);

            $table->string('relation', 100)->nullable();

            $table->string('address')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_emergency_contacts');
    }
};
