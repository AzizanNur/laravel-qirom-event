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
        Schema::create('users_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable(true);
            $table->string('street_name', 250)->nullable(true);
            $table->string('email')->unique();
            $table->unsignedBigInteger('phone')->nullable(true);
            $table->unsignedBigInteger('house_no')->nullable(true);
            $table->unsignedBigInteger('unit_number')->nullable(true);
            $table->unsignedBigInteger('postal_code')->nullable(true);
            $table->unsignedBigInteger('id_event')->nullable(true);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_registrations');
    }
};
