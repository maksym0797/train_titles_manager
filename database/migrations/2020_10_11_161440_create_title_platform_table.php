<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitlePlatformTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title_platform', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('title_id');
            $table->unsignedBigInteger('platform_id');
            $table->foreign('title_id')->references('id')->on('titles');
            $table->foreign('platform_id')->references('id')->on('platforms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_platform');
    }
}
