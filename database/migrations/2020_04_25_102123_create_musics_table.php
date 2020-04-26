<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('audio_file_id');
            $table->string('youtube_url');
            $table->unsignedBigInteger('cover_img_file_id');
            $table->text('lyrics');
            $table->boolean('is_composed');
            $table->boolean('is_edited');
            $table->boolean('is_written');
            $table->boolean('is_sung');
            $table->string('composer');
            $table->string('editor');
            $table->string('lyricist');
            $table->string('singer');
            $table->string('genre');
            $table->integer('is_opened'); //0:전체 공개 1:회원 공개 2:팔로워 공개 3:나만 보기
            $table->integer('views');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->foreign('audio_file_id')
                ->references('id')->on('files');
            $table->foreign('cover_img_file_id')
                ->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('musics');
    }
}
