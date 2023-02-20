<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\box;
use App\Models\User_game;

class PokemonController extends Controller
{
    public function xpUP($idPokemon, $addXP, $idUser)
    {
        $pokemon = Box::where('id', $idPokemon)->where('id_user', $idUser)->first();

        if($pokemon == null)
            return false;

        $xp = $pokemon->xp+$addXP;

        if($pokemon->level >= 100)
        {
            $pokemon->xp = 0;
            $pokemon->save();
            return true;
        }

        $xpMax = ($pokemon->level * 100)+ceil($pokemon->level ** 2 * 10.5);
        while ($xp >= $xpMax) {
            $xp = $xp - $xpMax;
            $pokemon = $this->levelUP($pokemon);
            $xpMax = ($pokemon->level * 100)+ceil($pokemon->level ** 2 * 10.5);
        }

        $pokemon->xp = $xp;
        $pokemon->save();

        return true;
    }

    private function levelUP($pokemon)
    {
        $pokemon->level = $pokemon->level + 1;
        $pokemon->hpMax = $pokemon->hpMax + 10;
        $pokemon->hp = $pokemon->hpMax;
        $pokemon->attack = $pokemon->attack + 5;
        $pokemon->defense = $pokemon->defense + 5;
        return $pokemon;
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
                            'type' => [],
                            'level' => 0,
                            'image' => '',
                            'hp' => 0,
                            'hpMax' => 0,
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
                        'hpMax' => $value->hpMax,
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

    public function heal($idPokemon, $addHP, $idUser)
    {
        // take the pokemon
        $Pokemon = Box::where('id', $idPokemon)->where('id_user',$idUser)->first();

        // id the pokemon exist
        if ($Pokemon == null)
            return false;

        // verify if the pokemon is not already at max hp
        if ($Pokemon->hp == $Pokemon->hpMax)
            return false;

        // add hp
        $Pokemon->hp = $Pokemon->hp + $addHP;

        // verify if the pokemon is not over max hp
        if ($Pokemon->hp > $Pokemon->hpMax)
            $Pokemon->hp = $Pokemon->hpMax;

        // save the pokemon
        $Pokemon->save();

        return true;
    }
}
