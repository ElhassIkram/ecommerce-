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
        Schema::table('mode_reglements', function (Blueprint $table) {
            $table->string('mode_reglements')->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       
    }
};
