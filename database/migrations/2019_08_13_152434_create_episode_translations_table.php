<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('episode_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('summary');

            $table->unique(['episode_id', 'locale']);
            $table->foreign('episode_id')->references('id')->on('episodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_translations');
    }
}
