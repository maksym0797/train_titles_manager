<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IndexesForUserTitleLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_title_likes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('title_id')->references('id')->on('titles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_title_likes', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('title_id');
        });
    }
}
