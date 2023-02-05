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

    
        // dd($data);

        return Inertia::render('Home/Main', [
            'fav' => $idFav,
        ]);
    }
}
