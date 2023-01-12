<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        // use externe api
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/1');
        $posts = $response->json();


    
        // dd($posts);

        return Inertia::render('Home',['namePokemon' => $posts['name']]);
    }
}
