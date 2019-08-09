<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('research_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug');
            $table->text('content');

            $table->unique(['research_id', 'locale']);
            $table->foreign('research_id')->references('id')->on('researches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_translations');
    }
}
