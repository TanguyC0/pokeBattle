<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\bag;
use App\Models\box;
use App\Models\stages;
use App\Models\user_games;

class AventureController extends Controller
{
    public function index()
    {
        return Inertia::render('Aventure', $this->message);
    }

    public function walk($stage = 1)
    {
        $datalist = [
            'status' => 2,
            'message' => 'Vous n\'avez rien trouvé',
            'img' => '',
        ];

        $value = rand(1, 15);
        if ($value <= 5) { //item
            $choix = $this->choose(0,$stage);


            // si objet existe, incrémenté count, si non, cree l'objet
            $item = bag::where('id_item', $choix)->first();
            if($item)
            {
                $item->count = $item->count + 1;
                $item->save();
            }
            else
            {
                $item = new bag;
                $item->id_item = $choix;
                $item->count = 1;
                $item->save();
            }

            $datalist = [
                'status' => 0,
                'message' => 'Vous avez trouvé un coffre',
                'img' => '../img/item'.$choix.'.png',
            ];

        } elseif ($value <= 10) { //pokemon
            $choix = $this->choose(1,$stage);

            if(Box::count() < 20)
            {

                $item = bag::join('items', 'items.id', '=', 'bags.id_item')->where('type', 'catch')->get();
                $itemList = [];
                foreach ($item as $key => $value) {
                    $itemList[] = [
                        'id' => $value->id_item,
                        'name' => $value->name,
                        'count' => $value->count,
                        'img' => '../img/item'.$value->id_item.'.png',
                    ];
                }

                $datalist = [
                    'status' => 1,
                    'message' => 'Vous avez trouvé un pokemon',
                    'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png',
                    'id' => $choix,
                    'items' => $itemList,
                ];
            }

        }

        return Inertia::render('Aventure', $datalist);
    }

    public function catch($id, $idItem)
    {
        $ball = Bag::where('id_item', $idItem)->get();

        if ($ball->count() == 0 || $ball[0]->count == 0) {
            $datalist = [
                'status' => 4,
                'message' => 'Vous n\'avez pas de ball',
                'img' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$id.'.png',
                'id' => $id,
            ];
        }
        else
        {
            $value = rand(1, 10);
            Bag::where('id_item', $idItem)->decrement('count');

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
    }
}
