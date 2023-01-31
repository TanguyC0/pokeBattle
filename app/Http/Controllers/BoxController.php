<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Models\box;


class BoxController extends Controller
{
    public function index(Request $request)
    {
        $list = [];
        $id = null;
        if($request->user())
        {
            $id = $request->user()->id;

            $data = Box::all()->where('id_user', $id);
            
            foreach ($data as $key => $value) {
                $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$value['id_pokemon']);
                $posts = $response->json();
                array_push($list, array( 'id'=> $value['id_pokemon'],
                                        'name' => $posts['name'], 
                                        'type' => [$posts['types'][0]['type']['name'], isset($posts['types'][1]['type']['name']) ? $posts['types'][1]['type']['name'] : ''],
                                        'level' => $value['level'],
                                        'image' => $posts['sprites']['other']['official-artwork']['front_default'],
                                        'hp' => $value['hp'],
                                        'attack' => $value['attack'],
                                        'defense' => $value['defense'],
                                        'xp' => $value['xp'],
                                        'xpMax' => ($value['level'] * 100)+ceil($value['level'] ** 2 * 10.5),
                                    )
                                );
            }
        }
        // dd($list);
        return Inertia::render('Box', ['listPokemon' => $list]);

    }
}
