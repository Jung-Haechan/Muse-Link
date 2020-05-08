<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('role')->default('composer');
            $table->string('project_audio_file')->nullable();
            $table->string('mr_audio_file')->nullable();
            $table->string('voice_audio_file')->nullable();
            $table->text('lyrics')->nullable();
            $table->unsignedTinyInteger('is_opened')->default(0); //0:전체 공개 1:회원공개 2:팔로워공개 3:협업자공개 4:비공개
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->foreign('project_id')
                ->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('versions');
    }
}
