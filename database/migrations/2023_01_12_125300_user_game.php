<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_games', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->integer('level')->default(1);
            $table->integer('stage')->default(1);
            $table->integer('max_box')->default(10);
            $table->integer('money')->default(0);
            $table->integer('exp')->default(0);
            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_game');
    }
};
