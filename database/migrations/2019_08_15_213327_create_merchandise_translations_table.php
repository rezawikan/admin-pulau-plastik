<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandiseTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandise_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('merchandise_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->text('summary');
            $table->text('price');

            $table->unique(['merchandise_id', 'locale']);
            $table->foreign('merchandise_id')->references('id')->on('merchandises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise_translations');
    }
}
