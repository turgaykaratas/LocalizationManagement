<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_version', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onUpdate('cascade');

            $table->unsignedInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade');

            $table->unsignedTinyInteger('version');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_version');
    }
}
