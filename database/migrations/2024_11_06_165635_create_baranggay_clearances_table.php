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
        Schema::create('baranggay_clearances', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(RequestDocument::class)->constrained()->cascadeOnDelete();

            $table->string('is_certified');
            $table->date('valid_until');
            $table->string('purpose');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baranggay_clearances');
    }
};