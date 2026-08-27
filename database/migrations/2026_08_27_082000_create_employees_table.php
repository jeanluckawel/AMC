<?php

use App\Enums\LifeStatus;
use App\Enums\MaritalStatus;
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
        Schema::create('employees', function (Blueprint $table) {

            $table->ulid();

            $table->string('matricule', 50)->unique();

            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('post_nom', 100)->nullable();


            $table->enum(
                'situation_familiale',
                array_column(MaritalStatus::cases(), 'value')
            )->default(MaritalStatus::CELIBATAIRE->value);

            $table->enum(
                'statut_vie',
                array_column(LifeStatus::cases(), 'value')
            )->default(LifeStatus::EN_VIE->value);


            $table->date('date_naissance')->nullable();
            $table->string('lieu_naissance', 150)->nullable();


            $table->string('telephone', 30)->nullable();
            $table->text('adresse_complete')->nullable();


            $table->string('nationalite', 100)->nullable();
            $table->string('numero_cnss', 100)->nullable();
            $table->string('numero_piece_identite', 100)->nullable();
            $table->date('date_expiration_piece')->nullable();



            $table->foreignUlid('department_id')
                ->nullable()
                ->constrained('departments')
                ->nullOnDelete();

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
