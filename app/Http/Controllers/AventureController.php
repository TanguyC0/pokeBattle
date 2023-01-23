<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\bag;
use App\Models\box;
use App\Models\stages;

class AventureController extends Controller
{
    public function index()
    {
        return Inertia::render('Aventure', [
            'status' => 2,
            'message' => 'Bienvenue dans l\'aventure',
            'img' => '',
        ]);
    }

    public function walk($stage = 1)
    {
        $value = rand(1, 15);
        if ($value <= 5) {
            // $choix = rand(1, 2);
            // $choix = 1;
            $choix = $this->choose(0,1);

            Bag::insert([
                'id_item' => $choix,
                'date' => date('Y-m-d'),
            ]);

            $datalist = [
                'status' => 0,
                'message' => 'Vous avez trouvé un coffre',
                'img' => '../img/item'.$choix.'.png',
            ];

        } elseif ($value <= 10) {
            // $choix = [1, 4, 7][rand(0, 2)];
            $choix = $this->choose(1,1);

            $datalist = [
                'status' => 1,
                'message' => 'Vous avez trouvé un pokemon',
                'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png',
                'id' => $choix,
            ];

        } else {
            $datalist = [
                'status' => 2,
                'message' => 'Vous n\'avez rien trouvé',
                'img' => '',
            ];
        }

        return Inertia::render('Aventure', $datalist);
    }

    public function catch($id)
    {
        $value = rand(1, 10);
        $ball = Bag::join('items', 'items.id', '=', 'bags.id_item')
        ->where('type', 'catch');

        if ($ball->count() == 0) {
            $datalist = [
                'status' => 4,
                'message' => 'Vous n\'avez pas de ball',
                'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$id.'.png',
                'id' => $id,
            ];
        }
        else
        {
            Bag::where('id_item', 1)->first()->delete();

            if ($value <= 5) {
                Box::insert([
                    'id_pokemon' => $id,
                    'level' => 1,
                    'hp' => 100,
                    'attack' => 100,
                    'defense' => 100,
                    'xp' => 0,
                ]);

                $datalist = [
                    'status' => 3,
                    'message' => 'Vous avez attrapé le pokemon',
                    'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$id.'.png',
                    'id' => $id,
                ];

            } elseif ($value <= 10) {
                $datalist = [
                    'status' => 4,
                    'message' => 'Vous n\'avez pas attrapé le pokemon',
                    'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$id.'.png',
                    'id' => $id,
                ];
            }
        }

        return Inertia::render('Aventure', $datalist);
    }

    public function choose( int $pack, int $stage){ // 0 for item, 1 for pokemon

        $list = Stages::find($stage);
        switch ($pack) {
            case 0:
                return json_decode($list->items, true)[rand(0, count(json_decode($list->items, true))-1)];
                break;
            case 1:
                return json_decode($list->pokemons, true)[rand(0, count(json_decode($list->pokemons, true))-1)];
                break;
        }

        // transforme en array
        // $list = json_decode($list->items, true);

    }
}
