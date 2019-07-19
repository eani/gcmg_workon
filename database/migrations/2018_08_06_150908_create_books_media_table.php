<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->string('original_file')->nullable();
            $table->string('code');
            $table->integer('priority')->default('0');
            $table->integer('book_id')->nullable()->unsigned();
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('books_media');
    }
}
