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
        Schema::create('claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_profile_id')->nullable(); // Employee is a Profile
            $table->unsignedBigInteger('entry_way_id')->nullable();
            $table->unsignedBigInteger('motive_id')->nullable();
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->unsignedBigInteger('claim_status_id')->nullable();
            $table->unsignedBigInteger('creator_profile_id')->nullable();
            $table->unsignedBigInteger('consumer_id')->nullable();
            $table->unsignedBigInteger('provider_id')->nullable();

            $table->string('contract_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('claim_id_external')->nullable(); // Renamed to avoid conflict with primary key 'id'
            $table->text('description')->nullable();

            $table->timestamps(); // Handles created_at and updated_at automatically

            $table->foreign('employee_profile_id')->references('id')->on('profiles')->onDelete('set null');
            $table->foreign('entry_way_id')->references('id')->on('entry_ways')->onDelete('set null');
            $table->foreign('motive_id')->references('id')->on('motives')->onDelete('set null');
            $table->foreign('product_type_id')->references('id')->on('product_types')->onDelete('set null');
            $table->foreign('claim_status_id')->references('id')->on('claim_statuses')->onDelete('set null');
            $table->foreign('creator_profile_id')->references('id')->on('profiles')->onDelete('set null');
            $table->foreign('consumer_id')->references('id')->on('consumers')->onDelete('set null');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};