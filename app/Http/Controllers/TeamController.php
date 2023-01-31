<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\box;
use App\Models\User_game;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $id = 0;
        $list = [];
        if($request->user())
        {
            $id = $request->user()->id;
            $pokemon = new PokemonController();
            $box = $pokemon->findPokemonUser(Box::all()->where('id_user', $id));
            $user = json_decode((User_game::where('id', $id)->get())[0]->team);
            // dd($user);
            if(count($user)>0)
            {
                $team = $pokemon->findPokemonUser(Box::where('id_user', $id)->whereIn('id', $user)->get());
            }
            else
            {
                $team = [3];
            }

        }
        return Inertia::render('Team', ['listPokemon' => $box, 'team' => $team]);
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
