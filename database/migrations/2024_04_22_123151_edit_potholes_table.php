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
        // change the potholes table damage_percentage to float
        Schema::table('potholes', function (Blueprint $table) {
            $table->float('damage_percentage')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // change the potholes table damage_percentage to integer
        Schema::table('potholes', function (Blueprint $table) {
            $table->integer('damage_percentage')->default(0)->change();
        });
    }
};
