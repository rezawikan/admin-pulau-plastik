<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitiativeTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initiative_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('initiative_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');
            $table->text('summary');

            $table->unique(['initiative_id', 'locale']);
            $table->foreign('initiative_id')->references('id')->on('initiatives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('initiative_translations');
    }
}
