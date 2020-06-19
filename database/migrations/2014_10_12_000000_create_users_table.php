<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('resource_server');
            $table->string('name')->unique();
            $table->string('profile_img')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('introduce')->nullable();
            $table->boolean('is_composer')->default(false);
            $table->boolean('is_editor')->default(false);
            $table->boolean('is_lyricist')->default(false);
            $table->boolean('is_singer')->default(false);
            $table->timestamp('producer_updated_at')->nullable();
            $table->timestamp('singer_updated_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
