<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->string('content');
            $table->boolean('is_read')->default(false);
            $table->boolean('is_deleted_by_sender')->default(false);
            $table->boolean('is_deleted_by_receiver')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sender_id')
                ->references('id')->on('users');
            $table->foreign('receiver_id')
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
        Schema::dropIfExists('messages');
    }
}
