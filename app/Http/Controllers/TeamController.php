<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\box;
use App\Models\User_game;
use App\Models\Bag;
use App\Models\Items;

class TeamController extends Controller
{
    public function index(Request $request)
    {

        $box = [];
        $team = [];
        $bag = [];
        if($request->user())
        {
            $id = $request->user()->id;

            //box
            $pokemon = new PokemonController();
            $box = $pokemon->findPokemonUser(Box::all()->where('id_user', $id));
            // dd($box);
            // if(count($box)<=0)
            // {
            //     $box = [];
            // }

            //team
            $user = json_decode((User_game::where('id', $id)->get())[0]->team);
            if(count($user)>0)
            {
                $team = $pokemon->findPokemonUser(Box::where('id_user', $id)->whereIn('id', $user)->get());
                $bag = Bag::join('items', 'bags.id_item', '=', 'items.id')->where('id_user', $id)->get();
            }
            else
            {
                $team = [];
                $bag = [];
            }

            //bag

            


        }
        return ['pokemon' => $box, 'team' => $team, 'bag' => $bag];
    }

    // function for switch pokemon in team

    public function switchPokemon(Request $request)
    {
        $id = $request->user()->id;

        $team = json_decode((User_game::where('id', $id)->get())[0]->team);

        $team[$request->input('place')] = $request->input('pokemon');

        User_game::where('id', $id)->update(['team' => json_encode($team)]);
    }
}
