<?php

use App\Models\Address;
use App\Models\DocumentsRequirements;
use App\Models\Fence;
use App\Models\Location;
use App\Models\MeasurementsInMeters;
use App\Models\RequestDocument;
use App\Models\TypeOfFencing;
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
        Schema::create('fencing_permits', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(RequestDocument::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Location::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Address::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Fence::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(DocumentsRequirements::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(MeasurementsInMeters::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(TypeOfFencing::class)->constrained()->cascadeOnDelete();

            $table->string('application_no');
            $table->string('permit_no');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('tax_account_no');
            $table->string('construction_owned_by_an_enterprise');
            $table->string('form_of_ownership');
            $table->string('telephone');
            $table->string('local_building_office')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fencing_permits');
    }
};
