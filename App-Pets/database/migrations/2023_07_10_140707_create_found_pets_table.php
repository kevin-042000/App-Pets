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
        Schema::create('found_pets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('name');
            $table->string('description');
            $table->string('location');
            $table->date('date_found');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_pets');
    }
};
