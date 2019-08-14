<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonyTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimony_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('testimony_id')->unsigned();
            $table->string('locale')->index();
            $table->string('position');
            $table->text('summary');

            $table->unique(['testimony_id', 'locale']);
            $table->foreign('testimony_id')->references('id')->on('testimonies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimony_translations');
    }
}
