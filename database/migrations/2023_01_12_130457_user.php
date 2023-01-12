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
        Schema::table('user_game', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->integer('level')->default(1);
            $table->integer('stage');
            $table->integer('max_box');
            $table->integer('money')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
