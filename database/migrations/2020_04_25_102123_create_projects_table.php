<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('audio_version_id')->nullable();
            $table->unsignedBigInteger('lyrics_version_id')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('cover_img_file')->nullable();
            $table->boolean('has_composer')->default(false);
            $table->boolean('has_editor')->default(false);
            $table->boolean('has_lyricist')->default(false);
            $table->boolean('has_singer')->default(false);
            $table->boolean('is_completed')->default(false);
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
        Schema::dropIfExists('projects');
    }
}
