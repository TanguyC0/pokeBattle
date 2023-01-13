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
        Schema::rename('box', 'boxes');
        Schema::rename('item', 'items');
        Schema::rename('bag', 'bags');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('boxes', 'box');
        Schema::rename('items', 'item');
        Schema::rename('bags', 'bag');
    }
};
