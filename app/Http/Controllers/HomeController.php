<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Models\User_game;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $profil = new ProfileController();

        $id = 0;
        if($request->user())
        {
            $id = $request->user()->id;
        }
        $idFav = $profil->getFavorite($id);
        if($idFav == 0)
        {
            $fav = '../img/PokeGhost.png';
        }
        else
        {
            $fav = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/'.$idFav.'.png';
        }

    
        // dd($data);

        return Inertia::render('Home/Main', [
            'fav' => $fav,
        ]);
    }
}
