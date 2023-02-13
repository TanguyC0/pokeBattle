<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Http;
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

        $this->type_chart = [
            'normal' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 1,
                'poison' => 1,
                'ground' => 1,
                'rock' => 0.5,
                'bug' => 1,
                'ghost' => 0,
                'steel' => 0.5,
                'fire' => 1,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 1,
                'fairy' => 1
            ],
            'fighting' => [
                'normal' => 2,
                'fighting' => 1,
                'flying' => 0.5,
                'poison' => 0.5,
                'ground' => 1,
                'rock' => 2,
                'bug' => 0.5,
                'ghost' => 0,
                'steel' => 2,
                'fire' => 1,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 0.5,
                'ice' => 2,
                'dragon' => 1,
                'dark' => 2,
                'fairy' => 0.5
            ],
            'flying' => [
                'normal' => 1,
                'fighting' => 2,
                'flying' => 1,
                'poison' => 1,
                'ground' => 0,
                'rock' => 0.5,
                'bug' => 2,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 1,
                'water' => 1,
                'grass' => 2,
                'electric' => 0.5,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 1,
                'fairy' => 1
            ],
            'poison' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 1,
                'poison' => 0.5,
                'ground' => 0.5,
                'rock' => 0.5,
                'bug' => 1,
                'ghost' => 0.5,
                'steel' => 0,
                'fire' => 1,
                'water' => 1,
                'grass' => 2,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 1,
                'fairy' => 2
            ],
            'ground' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 0,
                'poison' => 2,
                'ground' => 1,
                'rock' => 2,
                'bug' => 0.5,
                'ghost' => 1,
                'steel' =>2,
                'fire' => 2,
                'water' => 1,
                'grass' => 0.5,
                'electric' => 2,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 1,
                'fairy' => 1
            ],
            'rock' => [
                'normal' => 1,
                'fighting' => 0.5,
                'flying' => 2,
                'poison' => 1,
                'ground' => 0.5,
                'rock' => 1,
                'bug' => 2,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 2,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 2,
                'dragon' => 1,
                'dark' => 1,
                'fairy' => 1
            ],
            'bug' => [
                'normal' => 1,
                'fighting' => 0.5,
                'flying' => 0.5,
                'poison' => 0.5,
                'ground' => 1,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 0.5,
                'steel' => 0.5,
                'fire' => 0.5,
                'water' => 1,
                'grass' => 2,
                'electric' => 1,
                'psychic' => 2,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 2,
                'fairy' => 0.5
            ],
            'ghost' => [
                'normal' => 0,
                'fighting' => 1,
                'flying' => 1,
                'poison' => 1,
                'ground' => 1,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 2,
                'steel' => 1,
                'fire' => 1,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 2,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 0.5,
                'fairy' => 1
            ],
            'steel' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 1,
                'poison' => 1,
                'ground' => 1,
                'rock' => 2,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 0.5,
                'water' => 0.5,
                'grass' => 1,
                'electric' => 0.5,
                'psychic' => 1,
                'ice' => 2,
                'dragon' => 1,
                'dark' => 1,
                'fairy' => 2
            ],
            'fire' => [
                'normal' => 1,
                'fighting' => 1,
                'flying'=> 1,
                'poison' => 1,
                'ground' => 1,
                'rock' => 0.5,
                'bug' => 2,
                'ghost' => 1,
                'steel' => 2,
                'fire' => 0.5,
                'water' => 0.5,
                'grass' => 2,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 2,
                'dragon' => 0.5,
                'dark' => 1,
                'fairy' => 0.5
            ],
            'water' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 1,
                'poison' => 1,
                'ground' => 2,
                'rock' => 2,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 1,
                'fire' => 2,
                'water' => 0.5,
                'grass' => 0.5,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 0.5,
                'dark' => 1,
                'fairy' => 1
            ],
            'grass' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 0.5,
                'poison' => 0.5,
                'ground' => 2,
                'rock' => 2,
                'bug' => 0.5,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 0.5,
                'water' => 2,
                'grass' => 0.5,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 0.5,
                'dark' => 1,
                'fairy' => 1
            ],
            'electric' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 2,
                'poison' => 1,
                'ground' => 0,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 1,
                'fire' => 1,
                'water' => 2,
                'grass' => 0.5,
                'electric' => 0.5,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 0.5,
                'dark' => 1,
                'fairy' => 1
            ],
            'psychic' => [
                'normal' => 1,
                'fighting' => 2,
                'flying' => 1,
                'poison' => 2,
                'ground' => 1,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 1,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 0.5,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 0,
                'fairy' => 1
            ],
            'ice' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 2,
                'poison' => 1,
                'ground' => 2,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 0.5,
                'water' => 0.5,
                'grass' => 2,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 0.5,
                'dragon' => 2,
                'dark' => 1,
                'fairy' => 1
            ],
            'dragon' => [
                'normal' => 1,
                'fighting' => 1,
                'flying' => 1,
                'poison' => 1,
                'ground' => 1,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 1,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 2,
                'dark' => 1,
                'fairy' => 0
            ],
            'dark' => [
                'normal' => 1,
                'fighting' => 0.5,
                'flying' => 1,
                'poison' => 1,
                'ground' => 1,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 2,
                'steel' => 1,
                'fire' => 1,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 2,
                'ice' => 1,
                'dragon' => 1,
                'dark' => 0.5,
                'fairy' => 0.5
            ],
            'fairy' => [
                'normal' => 1,
                'fighting' => 2,
                'flying' => 1,
                'poison' => 0.5,
                'ground' => 1,
                'rock' => 1,
                'bug' => 1,
                'ghost' => 1,
                'steel' => 0.5,
                'fire' => 0.5,
                'water' => 1,
                'grass' => 1,
                'electric' => 1,
                'psychic' => 1,
                'ice' => 1,
                'dragon' => 2,
                'dark' => 2,
                'fairy' => 0.5
            ],
        ];
        
    }

    //set message
    public function setMessage($idUser,$num, $choix = 0, $itemList = [])
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
            'Vous commencé un combat', //8
            'Vous avez gagné le combat', //9
            'Vous avez perdu le combat', //10
            'vous n\'avez pas de pokemon', //11
        ];

        /*
        Status :
        0 = neutre / rien
        1 = item
        2 = pokemon trouvé
        3 = apres catch, réussi ou non
        4 = combat trouvé
        5 = apres combat, gagné ou perdu
        */


        switch($num)
        {
            case 0:
            case 1:
                $this->message['status'] = 0;
                $this->message['img'] = '/img/'.['male','female'][rand(0,1)].'-character.png';
                break;
            case 2:
                $this->message['status'] = 1;
                $this->message['img'] = '/img/items/item'.$choix.'.png';

                break;
            case 3:
                $this->message['status'] = 2;
                $this->message['img'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png';
                break;
            case 4:
            case 5:
                $this->message['status'] = 3;
                $this->message['img'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png';
                break;
            case 6:
                $this->message['status'] = 3;
                $this->message['img'] = '';
                break;
            case 7:
                $this->message['status'] = 0;
                $this->message['img'] = '/img/PokeGhost.png';
                break;
            case 8:
                $this->message['status'] = 4;
                $this->message['img'] = '/img/vs.png';
                break;
            case 9:
            case 10:
                $this->message['status'] = 5;
                $this->message['img'] = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$choix.'.png';
                break;
            case 11:
                $this->message['status'] = 0;
                $this->message['img'] = '/img/PokeGhost.png';
                break;
        }

        $this->message['message'] = $listMessage[$num];
        $this->message['id'] = $choix;
        $this->message['items'] = $itemList;

        if ($idUser != 0)
        {
            $pokemon = new PokemonController();
            $user = User_game::where('id', $idUser)->first();

            foreach(json_decode($user->team) as $key => $value)
            {
                $this->message['team'][$key] = $pokemon->findPokemon(Box::where('id', $value)->get());
            }
        }
        
    }

    // for start the adventure
    public function index(Request $request)
    {
        $idUser = 0;
        if($request->user())
        {
            $idUser = $request->user()->id;
            $this->setMessage($idUser,0);
        }
        else
        {
            $this->setMessage($idUser,7);
        }
        
        return Inertia::render('Aventure', ['data' => $this->message]);
    }

    // for walk in the adventure (api)
    public function walk(Request $request)
    {
        $idUser = 0;
        if($request->user())
        {
            $idUser = $request->user()->id;

            $stage = $request->input('stage');
            

            $value = rand(1, 20);
            if ($value <= 0) //item
            { 
                $this->addItem($idUser,$stage);
            } 
            elseif ($value <= 0) //pokemon
            { 
                $this->choosePokemon($idUser,$stage);
            }
            elseif ($value <= 20) //fight
            {
                $this->setMessage($idUser,8);
            }
            else
            {
                $this->setMessage($idUser,1);
            }
        }
        else
        {
            $this->setMessage($idUser,7);
        }

        return $this->message;
    }

    // when you found a item during walk
    public function addItem($idUser,$stage)
    {
        $choix = $this->choose(0,$stage);

        // si objet existe, incrémenté count, si non, cree l'objet
        $item = bag::where('id_item', $choix)->where('id_user', $idUser)->first();

        if($item)
        {
            $item->count = $item->count + 1;
            $item->save();
        }
        else
        {
            $item = new bag;
            $item->id_user = $idUser;
            $item->id_item = $choix;
            $item->count = 1;
            $item->save();
        }

        $this->setMessage($idUser,2,$choix );
    }

    // when you found a pokemon during walk
    public function choosePokemon($idUser,$stage)
    {
        $choix = $this->choose(1,$stage);

        // verify if the box is full
        if(Box::where('id_user', $idUser)->count() < 10)
        {

            $item = bag::join('items', 'items.id', '=', 'bags.id_item')->where('type', 'catch')
                                                                        ->where('count', '>', 0)
                                                                        ->where('id_user', $idUser)
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

            $this->setMessage($idUser,3,$choix,$itemList);
        }
    }

    //choose a random item or pokemon
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

    // for catch a pokemon (api)
    public function catch(Request $request)
    {
        $idUser = 0;
        if($request->user())
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
        }
        else
        {
            $this->setMessage($idUser,7);
        }

        return $this->message;
    }


// in dev -------------------------------------------- fight
    public function fight(Request $request)
    {
        $idUser = 0;
        if($request->user())
        {
            $idUser = $request->user()->id;

            // get the team of the user_game
            $user = User_game::where('id', $idUser)->first();
            $pokemon = new PokemonController;

            foreach(json_decode($user->team) as $key => $value)
            {
                $userPokemon[$key] = $pokemon->findPokemon(Box::where('id', $value)->get());
            }
            
            

            // get the pokemon of the enemy

            $pv = 10;
            $attack = 10;
            $defense = 10;
            $attack_type = 'normal';

            $typePLAYER = [];
            $typeNPC = [];
            $numberTeam = -1;
            while ($pv > 0 && $numberTeam < 6) {
                while($typePLAYER == [])
                {
                    $numberTeam++;
                    if($numberTeam >= 6)
                    {
                        break;
                    }
                    $typePLAYER = $userPokemon[$numberTeam]['type'];
                }
                while($typeNPC == [])
                {
                    // $response = Http::get('https://pokeapi.co/api/v2/pokemon/1');
                    // $posts = $response->json();
                    // $typeNPC = [$posts['types'][0]['type']['name'], isset($posts['types'][1]['type']['name']) ? $posts['types'][1]['type']['name'] : ''];
                    $typeNPC = ['normal',''];
                }

                if($userPokemon[$numberTeam]['hp'] > 0 && $numberTeam < 6)
                {
                    $damage = $this->calculate_damage($userPokemon[$numberTeam]['attack'], $defense, $this->calculateTypeModifier($attack_type, $typeNPC));
                    $pv = $pv - $damage;
                    if ($pv <= 0) {
                        $typeNPC = [];
                        // dd(intval($userPokemon[$numberTeam]['hp']));
                        $tmp = Box::where('id', $userPokemon[$numberTeam]['idTable'])->first();
                        $tmp->hp = intval($userPokemon[$numberTeam]['hp']);
                        $tmp->save();
                    }
                }
                if ($pv > 0 && $numberTeam < 6) {
                    $damage = $this->calculate_damage($attack, $userPokemon[$numberTeam]['defense'], $this->calculateTypeModifier($attack_type, $typePLAYER));
                    $userPokemon[$numberTeam]['hp'] = $userPokemon[$numberTeam]['hp'] - $damage;
                    if ($userPokemon[$numberTeam]['hp'] <= 0) {
                        $typePLAYER = [];
                    }
                }
            }
            if ($pv <= 0) {
                $this->setMessage($idUser,9);
            } else {
                $this->setMessage($idUser,10);
            }


            
        }
        else
        {
            $this->setMessage($idUser,7);
        }


        return $this->message;
    }

    function calculateTypeModifier($attack_type, $defend_type) {
    
        $modifier = 0;
        $nb = 0;
        foreach ($defend_type as $value) {
            if($value != '')
            {
                $modifier += $this->type_chart[$attack_type][$value];
                $nb++;
            }
                
        }
        return $modifier / $nb;
    }

    function calculate_damage($attack, $defense, $modifier) {

        $niveau = 1;
        return ceil(((((2 * $niveau / 5 + 2) * $attack / $defense) / 50) + 2) * $modifier * rand(0.85,1.15));
    }
}




/*
fight rules

DB :
- list of pokemon
- fourchette de niveau pokemon
- fourchette de de pokemon
- fourchette de de xp user

fight :
- verify if user have pokemon
- verify if npc have pokemon
- calculate degat (pokemon attack * type attack * random(0.85,1.15) - pokemon defense * type defense * random(0.85,1.15))

*/