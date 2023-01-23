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
        // create table: Stages
        Schema::create('stages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('pokemons');
            $table->json('items');
        });

        // insert data
        DB::table('stages')->insert(
            array(
                'name' => 'stage1',
                'pokemons' => '[1,4,7,10]',
                'items' => '[1,2]'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // delete table
        Schema::dropIfExists('stages');
    }
};
