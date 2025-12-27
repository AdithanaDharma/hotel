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
        Schema::dropIfExists('hotel');
        Schema::dropIfExists('kamar');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // You might want to recreate the tables here if you need to rollback
        // For this case, I will leave it empty.
    }
};