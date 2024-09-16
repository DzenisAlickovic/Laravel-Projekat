<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Proveri da li tabela 'themes' već postoji, i preimenuj ako ne postoji
        if (!Schema::hasTable('themes')) {
            Schema::rename('courses', 'themes');
        }

        Schema::table('themes', function (Blueprint $table) {
            // Proveri da li kolone postoje pre nego što ih pokušaš obrisati
            if (Schema::hasColumn('themes', 'tags')) {
                $table->dropColumn('tags');
            }
            if (Schema::hasColumn('themes', 'duration')) {
                $table->dropColumn('duration');
            }
            if (Schema::hasColumn('themes', 'price')) {
                $table->dropColumn('price');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Vraćanje nazad tabele iz 'themes' u 'courses'
        if (Schema::hasTable('themes')) {
            Schema::rename('themes', 'courses');
        }

        Schema::table('courses', function (Blueprint $table) {
            // Ponovno dodavanje kolona ako su uklonjene
            if (!Schema::hasColumn('courses', 'tags')) {
                $table->string('tags');
            }
            if (!Schema::hasColumn('courses', 'duration')) {
                $table->decimal('duration');
            }
            if (!Schema::hasColumn('courses', 'price')) {
                $table->float('price');
            }
        });
    }
};
