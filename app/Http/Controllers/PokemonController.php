<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\box;
use App\Models\User_game;

class PokemonController extends Controller
{
    public function xpUP($quantity, $id)
    {
        $data = Box::where('id', $id)->first();
        $xp = $data->xp+$quantity;
        $xpMax = ($data->level * 100)+ceil($data->level ** 2 * 10.5);

        if($data->level >= 100)
            $xp = 0;

        while($xp >= $xpMax){
            $data= $this->levelUP($data);
            $xp = $xp - $xpMax;
            $xpMax = ($data->level * 100)+ceil($data->level ** 2 * 10.5);
        }

        $data->xp = $xp;
        $data->save();

        return redirect()->route('box');

    }

    private function levelUP($data)
    {
        $data->level = $data->level + 1;
        $data->hp = $data->hp + 10;
        $data->attack = $data->attack + 5;
        $data->defense = $data->defense + 5;
        return $data;
    }

    public function findAllPokemon($data)
    {
        // dd($data);
        $list = [];
        foreach ($data as $key => $value){
            // dd($value);
            array_push($list ,$this->findPokemon([$value]));
        }
        return $list;
    }

    public function findPokemon($value)
    {

        if(count($value) <= 0)
        {
            return array('idTable' => 0,
                            'id'=> 0,
                            'name' => '', 
                            'type' => ['', ''],
                            'level' => 0,
                            'image' => '',
                            'hp' => 0,
                            'attack' => 0,
                            'defense' => 0,
                            'xp' => 0,
                            'xpMax' => 0,
            );
        }

        $value = $value[0];
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$value->id_pokemon);
        $posts = $response->json();

        return array('idTable' => $value->id,
                        'id'=> $value->id_pokemon,
                        'name' => $posts['name'], 
                        'type' => [$posts['types'][0]['type']['name'], isset($posts['types'][1]['type']['name']) ? $posts['types'][1]['type']['name'] : ''],
                        'level' => $value->level,
                        'image' => $posts['sprites']['other']['official-artwork']['front_default'],
                        'hp' => $value->hp,
                        'attack' => $value->attack,
                        'defense' => $value->defense,
                        'xp' => $value->xp,
                        'xpMax' => ($value->level * 100)+ceil($value->level ** 2 * 10.5),
        );
        
    }


    public function sell(Request $request)
    {
        if($request->user())
        {
            $id = $request->user()->id;
            $pokeId = $request->input('id');
            // $pokeId = 1;
            $data = Box::where('id', $pokeId)->where('id_user',$id)->first();
            if ($data == null)
                return false;
            // dd($data);
            $money = $data->level * 10;
            // dd($money);
            $data->delete();
            $user = User_game::where('id', $id)->first();
            $user->money = $user->money + $money;
            $user->save();
            return true;
        }

        return false;
    }

}
