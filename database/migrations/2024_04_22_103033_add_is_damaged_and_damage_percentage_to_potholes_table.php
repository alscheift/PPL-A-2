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
        // Check if the 'is_damaged' column doesn't exist before adding it
        if (!Schema::hasColumn('potholes', 'is_damaged')) {
            Schema::table('potholes', function (Blueprint $table) {
                $table->boolean('is_damaged')->default(false);
                $table->boolean('is_fixed')->default(false);
                $table->integer('damage_percentage')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        if (Schema::hasColumn('potholes', 'is_damaged')) {
            Schema::table('potholes', function (Blueprint $table) {
                $table->dropColumn('is_damaged');
                $table->dropColumn('is_fixed');
                $table->dropColumn('damage_percentage');
            });
        }
    }
};
