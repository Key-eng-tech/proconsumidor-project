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
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('municipios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('province_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('restrict');
        });

        Schema::create('sectors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('municipio_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete('restrict');
        });

        Schema::create('entry_ways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('motives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('product_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('claim_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color')->nullable(); // Assuming color is optional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_statuses');
        Schema::dropIfExists('product_types');
        Schema::dropIfExists('motives');
        Schema::dropIfExists('entry_ways');
        Schema::dropIfExists('sectors');
        Schema::dropIfExists('municipios');
        Schema::dropIfExists('provinces');
    }
};