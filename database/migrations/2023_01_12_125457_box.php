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
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned()->nullable();
            $table->integer('id_pokemon');
            $table->integer('level')->default(1);
            $table->integer('xp')->default(0);
            $table->integer('hp')->default(1);
            $table->integer('hpMax')->default(1);
            $table->integer('attack')->default(1);
            $table->integer('defense')->default(1);
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('user_games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boxes');
    }
};
