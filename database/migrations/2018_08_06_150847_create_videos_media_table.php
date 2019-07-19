<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->string('original_file')->nullable();
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('video_id')->nullable()->unsigned();
            $table->foreign('video_id')->references('id')->on('videos');
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
        Schema::dropIfExists('videos_media');
    }
}
