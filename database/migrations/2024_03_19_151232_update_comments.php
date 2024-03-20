

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Prvo uklonimo strani ključ
            $table->dropForeign(['course_id']);

            // Promenimo ime kolone
            $table->renameColumn('course_id', 'theme_id');

            // Dodamo novi strani ključ
            $table->foreign('theme_id')->references('id')->on('themes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Prvo uklonimo strani ključ
            $table->dropForeign(['theme_id']);

            // Promenimo ime kolone nazad
            $table->renameColumn('theme_id', 'course_id');

            // Dodamo strani ključ natrag
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }
};
