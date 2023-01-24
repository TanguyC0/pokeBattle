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
    // constructor
    public function __construct()
    {
        $this->message = [
            'status' => 2,
            'message' => 'Bienvenue dans l\'aventure',
            'img' => '',
            'id' => 0,
            'items' => [],
        ];
    }

    public function index()
    {
        $this->setMessage(0);
        return Inertia::render('Aventure', $this->message);
    }

    public function walk($stage = 1)
    {
        $this->setMessage(1);

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

            $this->setMessage(2,$choix );

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

                $this->setMessage(3,$choix,$itemList);
            }

        }

        return Inertia::render('Aventure', $this->message);
    }

    public function catch($id, $idItem)
    {
        $ball = Bag::where('id_item', $idItem)->get();

        if ($ball->count() == 0 || $ball[0]->count == 0) {

            $this->setMessage(6,$id);
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

                $this->setMessage(4,$id);

            } elseif ($value <= 10) {

                $this->setMessage(5,$id);
            }
        }

        return Inertia::render('Aventure', $this->message);
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

    //set message
    public function setMessage($num, $choix = 0, $itemList = [])
    {
        $listMessage = [
            'Bienvenue dans l\'aventure', //0
            'Vous n\'avez rien trouvé', //1
            'Vous avez trouvé un coffre', //2
            'Vous avez trouvé un pokemon', //3
            'Vous avez attrapé le pokemon', //4
            'Vous n\'avez pas attrapé le pokemon', //5
            'Vous n\'avez pas de ball', //6
        ];

        switch($num)
        {
            case 0:
            case 1:
                $this->message['status'] = 0;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = '';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;
                break;
            case 2:
                $this->message['status'] = 1;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = '../img/item'.$choix.'.png';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;

                break;
            case 3:
                $this->message['status'] = 2;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;
                break;
            case 4:
            case 5:
                $this->message['status'] = 3;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;
                break;
            case 6:
                $this->message['status'] = 3;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = '';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;
                break;
        }
    }
}
