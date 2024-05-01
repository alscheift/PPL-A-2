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
        if (!Schema::hasColumn('potholes', 'address')) {
            Schema::table('potholes', function (Blueprint $table) {
                $table->string('address');
                // $table->dropColumn('is_fixed');
                // $table->dropColumn('damage_percentage');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('potholes', 'address')) {
            Schema::table('potholes', function (Blueprint $table) {
                $table->dropColumn('address');
                // $table->dropColumn('is_fixed');
                // $table->dropColumn('damage_percentage');
            });
        }
    }
};
