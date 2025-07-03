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
        Schema::create('claims_from', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('claim_id');
            $table->unsignedBigInteger('creator_profile_id')->nullable(); // Creator is a Profile
            $table->string('role')->nullable();
            $table->timestamps(); // 'date' from ERD is implicitly covered by created_at

            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');
            $table->foreign('creator_profile_id')->references('id')->on('profiles')->onDelete('set null');
        });

        Schema::create('claim_updates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('claim_id');
            $table->unsignedBigInteger('employee_profile_id')->nullable(); // Employee is a Profile
            $table->text('description')->nullable();
            $table->timestamps(); // 'date' from ERD is implicitly covered by created_at

            $table->foreign('claim_id')->references('id')->on('claims')->onDelete('cascade');
            $table->foreign('employee_profile_id')->references('id')->on('profiles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_updates');
        Schema::dropIfExists('claims_from');
    }
};