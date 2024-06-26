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
        Schema::create('product_per_leverancier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leverancier_id');
            $table->unsignedBigInteger('product_id');
            $table->date('datum_aangeleverd');
            $table->date('datum_eerst_volgende_levering');
            $table->timestamps();

            $table->foreign('leverancier_id')->references('id')->on('leveranciers')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_per_leverancier');
    }
};
