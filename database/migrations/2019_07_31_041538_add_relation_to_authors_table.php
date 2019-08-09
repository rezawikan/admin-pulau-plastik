<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationToAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
        });

        Schema::table('researches', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropForeign('blogs_author_id_foreign');
        });

        Schema::table('researches', function (Blueprint $table) {
            $table->dropForeign('researches_author_id_foreign');
        });
    }
}
