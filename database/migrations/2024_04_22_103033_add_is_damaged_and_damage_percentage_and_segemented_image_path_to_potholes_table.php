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
        Schema::table('potholes', function (Blueprint $table) {
            $table->boolean('is_damaged')->default(false);
            $table->integer('damage_percentage')->default(0);
            $table->string('segmented_image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('potholes', function (Blueprint $table) {
            $table->dropColumn('is_damaged');
            $table->dropColumn('damage_percentage');
            $table->dropColumn('segmented_image_path');
        });
    }
};
