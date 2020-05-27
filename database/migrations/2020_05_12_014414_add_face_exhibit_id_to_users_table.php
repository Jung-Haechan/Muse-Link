<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFaceExhibitIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('producer_exhibit_id')->after('is_singer')->nullable();
            $table->unsignedBigInteger('singer_exhibit_id')->after('is_singer')->nullable();

            $table->foreign('producer_exhibit_id')
                ->references('id')->on('exhibits');
            $table->foreign('singer_exhibit_id')
                ->references('id')->on('exhibits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_', function (Blueprint $table) {
            //
        });
    }
}
