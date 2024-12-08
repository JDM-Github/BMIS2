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
        Schema::create('fences', function (Blueprint $table) {
            $table->id();

            $table->boolean('new')->default(0);
            $table->boolean('renovation')->default(0);
            $table->boolean('additional')->default(0);
            $table->boolean('change_of_material')->default(0);
            $table->boolean('repair')->default(0);
            $table->boolean('others')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fences');
    }
};
