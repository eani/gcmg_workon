<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAudiosMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audios_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->string('original_file')->nullable();
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('audio_id')->nullable()->unsigned();
            $table->foreign('audio_id')->references('id')->on('audio');
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
        Schema::dropIfExists('audios_media');
    }
}
