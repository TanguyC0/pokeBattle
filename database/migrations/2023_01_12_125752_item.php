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
        Schema::create('items', function (Blueprint $table) {
            // id, name, description, type, power, grade, sell, buy, building

            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->integer('power');
            $table->string('grade');
            $table->integer('sell');
            $table->integer('buy');
            $table->json('building');
            
        });

        //INSERT INTO items(name,description,`type`,power,grade,sell,buy,building) VALUES('pokeball','pokeball','catch',10,'commun',10,10,'null');
        DB::table('items')->insert(
            array(
                'name' => 'pokeball',
                'description' => 'pokeball',
                'type' => 'catch',
                'power' => 10,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'honorball',
                'description' => 'pokeball',
                'type' => 'catch',
                'power' => 10,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
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
        Schema::dropIfExists('items');
    }
};
