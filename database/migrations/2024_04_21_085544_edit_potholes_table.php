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
        // edit admin in potholes to be nullable
        Schema::table('potholes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_admin')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('potholes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_admin')->nullable(false)->change();
        });
    }
};
