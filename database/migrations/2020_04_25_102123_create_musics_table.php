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
            $table->string('audio_file')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('cover_img_file')->nullable();
            $table->text('lyrics')->nullable();
            $table->string('composer')->nullable();
            $table->string('editor')->nullable();
            $table->string('lyricist')->nullable();
            $table->string('singer')->nullable();
            $table->string('genre')->nullable();
            $table->integer('is_opened')->default(0); //0:전체 공개 1:회원 공개 2:팔로워 공개 3:나만 보기
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users');
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
