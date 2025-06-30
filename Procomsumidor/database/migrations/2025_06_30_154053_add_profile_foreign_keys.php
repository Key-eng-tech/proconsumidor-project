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
        Schema::table('profiles', function (Blueprint $table) {
            // Adding supervisor_profile_id as a self-referencing foreign key
            $table->unsignedBigInteger('supervisor_profile_id')->nullable()->after('employee_position');
            $table->foreign('supervisor_profile_id')->references('id')->on('profiles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['supervisor_profile_id']);
            $table->dropColumn('supervisor_profile_id');
        });
    }
};