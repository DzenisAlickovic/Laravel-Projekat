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
        Schema::table('comments', function (Blueprint $table) {
            // Dodaj kolonu theme_id kao strani ključ
            $table->unsignedBigInteger('theme_id')->nullable(); // ili ne nullable ako je obavezna
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Ukloni kolonu theme_id
            $table->dropForeign(['theme_id']);
            $table->dropColumn('theme_id');
        });
    }
};
