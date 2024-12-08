<?php

use App\Models\RequestDocument;
use App\Models\User;
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
        Schema::create('medical_legal_certificates', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(RequestDocument::class)->constrained()->cascadeOnDelete();

            $table->string('medical_facility'); // Medical Facility
            $table->date('start_date'); // Start date of treatment
            $table->date('end_date'); // End date of treatment
            $table->text('medical_conditions'); // Medical Conditions/Treatments
            $table->time('time_of_arrival'); // Time of Arrival
            $table->string('brought_by'); // Person who brought the patient
            $table->string('relationship'); // Relationship to patient
            $table->integer('start'); // Duration of treatment (in days)
            $table->integer('end');
            $table->string('address');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_legal_certificates');
    }
};
