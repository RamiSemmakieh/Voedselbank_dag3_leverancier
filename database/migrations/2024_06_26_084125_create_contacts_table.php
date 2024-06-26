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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('straat', 50);
            $table->integer('huisnummer');
            $table->string('toevoeging', 10)->nullable();
            $table->string('postcode', 10);
            $table->string('woonplaats', 50);
            $table->string('email', 100);
            $table->string('mobiel', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
