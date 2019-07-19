<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->string('original_file')->nullable();
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('application_id')->nullable()->unsigned();
            $table->foreign('application_id')->references('id')->on('applications');
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
        Schema::dropIfExists('applications_media');
    }
}
