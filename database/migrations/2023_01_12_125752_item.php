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
                'power' => 11,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'superball',
                'description' => 'pokeball',
                'type' => 'catch',
                'power' => 20,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'potion',
                'description' => 'potion +10 hp',
                'type' => 'heal',
                'power' => 10,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'super potion',
                'description' => 'potion +20 hp',
                'type' => 'heal',
                'power' => 20,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'hyper potion',
                'description' => 'potion +30 hp',
                'type' => 'heal',
                'power' => 30,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'small exp bonbon',
                'description' => ' +10 exp',
                'type' => 'exp',
                'power' => 10,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'medium exp bonbon',
                'description' => ' +20 exp',
                'type' => 'exp',
                'power' => 20,
                'grade' => 'commun',
                'sell' => 10,
                'buy' => 10,
                'building' => 'null'
            )
        );
        DB::table('items')->insert(
            array(
                'name' => 'large exp bonbon',
                'description' => ' +30 exp',
                'type' => 'exp',
                'power' => 30,
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
