<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tweet_hashtag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tweet_id');
            $table->unsignedBigInteger('hashtag_id');
            $table->timestamps();

            $table->foreign('tweet_id')
                  ->references('id')
                  ->on('tweets')
                  ->onDelete('cascade');
            $table->foreign('hashtag_id')
                  ->references('id')
                  ->on('hashtags')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tweet_hashtag');
    }
};
