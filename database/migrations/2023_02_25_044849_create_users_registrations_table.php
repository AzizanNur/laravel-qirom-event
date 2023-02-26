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
            $table->string('phone', 50)->nullable(true);
            $table->string('house_no', 50)->nullable(true);
            $table->string('unit_number', 50)->nullable(true);
            $table->string('postal_code', 50)->nullable(true);
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
