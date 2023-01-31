<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\box;


class BoxController extends Controller
{
    public function index(Request $request)
    {
        $id = 0;
        $list = [];
        if($request->user())
        {
            $id = $request->user()->id;
            $pokemon = new PokemonController();
            $list = $pokemon->findPokemonUser($id);
        }
        // dd($list);
        return Inertia::render('Box', ['listPokemon' => $list]);

    }
}
