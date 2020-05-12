<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhibitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhibits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('audio_file')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('cover_img_file')->nullable();
            $table->string('lyrics')->nullable();
            $table->string('board');
            $table->unsignedTinyInteger('is_opened')->default(0); // 0:전체공개 1:회원공개 2:팔로워공개 3:비공개
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
        Schema::dropIfExists('exhibits');
    }
}
