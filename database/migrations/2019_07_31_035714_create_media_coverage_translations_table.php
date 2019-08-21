<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaCoverageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_coverage_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_coverage_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title');

            $table->unique(['media_coverage_id', 'locale']);
            $table->foreign('media_coverage_id')->references('id')->on('media_coverages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_coverage_translations');
    }
}
