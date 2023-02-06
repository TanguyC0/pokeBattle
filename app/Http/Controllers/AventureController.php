<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\bag;
use App\Models\box;
use App\Models\stages;
use App\Models\User_game;
use App\Models\items;

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
            'location' => Stages::select('position','id')->get(),
            'team' => [],
        ];
    }

    public function index(Request $request)
    {
        $id = 0;
        if($request->user())
        {
            $id = $request->user()->id;
        }
        $this->setMessage($id,0);
        return Inertia::render('Aventure', ['data' => $this->message]);
    }


    public function walk(Request $request)
    {
        if($request->user())
        {
            $id = $request->user()->id;

            $stage = $request->input('stage');
            

            $value = rand(1, 15);
            if ($value <= 4) //item
            { 
                $this->addItem($id,$stage);
            } 
            elseif ($value <= 8) //pokemon
            { 
                $this->choosePokemon($id,$stage);
            }
            else
            {
                $this->setMessage($id,1);
            }
        }
        else
        {
            $this->setMessage(0,7);
        }

        return $this->message;
    }

    public function addItem($id,$stage)
    {
        $choix = $this->choose(0,$stage);

        // si objet existe, incrémenté count, si non, cree l'objet
        $item = bag::where('id_item', $choix)->where('id_user', $id)->first();
        if($item)
        {
            $item->count = $item->count + 1;
            $item->save();
        }
        else
        {
            $item = new bag;
            $item->id_user = $id;
            $item->id_item = $choix;
            $item->count = 1;
            $item->save();
        }

        $this->setMessage($id,2,$choix );
    }

    public function choosePokemon($id,$stage)
    {
        $choix = $this->choose(1,$stage);

        if(Box::where('id_user', $id)->count() < 10)
        {

            $item = bag::join('items', 'items.id', '=', 'bags.id_item')->where('type', 'catch')
                                                                        ->where('count', '>', 0)
                                                                        ->where('id_user', $id)
                                                                        ->get();
            $itemList = [];
            if ($item->count() > 0){
            foreach ($item as $key => $value) {
                $itemList[] = [
                    'id' => $value->id_item,
                    'name' => $value->name,
                    'count' => $value->count,
                    'img' => '../img/item'.$value->id_item.'.png',
                    ];
                }
            }

            $this->setMessage($id,3,$choix,$itemList);
        }
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

    public function catch(Request $request)
    {
        $idUser = $request->user()->id;

        $id = $request->input('id');
        $idItem = $request->input('idItem');


        $ball = Bag::where('id_item', $idItem)->where('id_user',$idUser)->get();

        if ($ball->count() == 0 || $ball[0]->count == 0) {

            $this->setMessage($idUser,6,$id);
        }
        else
        {
            
            Bag::where('id_item', $idItem)->where('id_user',$idUser)->decrement('count');

            $power = Items::where('id', $idItem)->select('power')->get();

            $limit_random_array_values = range(0, 100);
            shuffle($limit_random_array_values);
            $random_array_value = array_slice($limit_random_array_values ,0,$power[0]->power);

            $value = rand(0, 100);
            if (in_array($value, $random_array_value)) {
                Box::insert([
                    'id_pokemon' => $id,
                    'id_user' => $idUser,
                    'level' => 1,
                    'hp' => rand(5, 20),
                    'attack' => rand(5, 20),
                    'defense' => rand(5, 20),
                    'xp' => 0,
                ]);

                $this->setMessage($idUser,4,$id);

            } else {

                $this->setMessage($idUser,5,$id);
            }
        }

        return $this->message;
    }

    //set message
    public function setMessage($user,$num, $choix = 0, $itemList = [])
    {
        $listMessage = [
            'Bienvenue dans l\'aventure', //0
            'Vous n\'avez rien trouvé', //1
            'Vous avez trouvé un coffre', //2
            'Vous avez trouvé un pokemon', //3
            'Vous avez attrapé le pokemon', //4
            'Vous n\'avez pas attrapé le pokemon', //5
            'Vous n\'avez pas de ball', //6
            'vous n\'existe pas', //7
        ];

        switch($num)
        {
            case 0:
            case 1:
                $this->message['status'] = 0;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = '/img/'.['male','female'][rand(0,1)].'-character.png';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;
                break;
            case 2:
                $this->message['status'] = 1;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = '../img/items/item'.$choix.'.png';
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
            case 7:
                $this->message['status'] = 0;
                $this->message['message'] = $listMessage[$num];
                $this->message['img'] = '/img/PokeGhost.png';
                $this->message['id'] = $choix;
                $this->message['items'] = $itemList;
                break;
        }

        if ($user != 0)
        {
            $pokemon = new PokemonController();
            $this->message['team'] = $pokemon->findPokemonUser(Box::where('id_user', $user)->whereIn('id', json_decode((User_game::where('id', $user)->get())[0]->team))->get());
        }
        
    }
}
