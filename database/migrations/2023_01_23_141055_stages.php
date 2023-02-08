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
            $table->json('pokemons')->nullable();
            $table->json('items')->nullable();
            $table->json('fight')->nullable();
            // champs for position in the map (x,y)
            $table->json('position')->nullable();
        });

        // insert data
        DB::table('stages')->insert(
            array(
                'name' => 'stage1',
                'pokemons' => '[1,4,7,10]',
                'items' => '[1,2]',
                'fight' => '{"pokemon": [1], "level": [1,5], "nb_pokemon": [1,1], "xp": [1,5], "money": [1,5]}',
                'position' => '{"x": 0, "y": 0}',
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
