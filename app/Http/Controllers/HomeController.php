<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Models\User_game;

class HomeController extends Controller
{
    public function index()
    {
        $data = User_game::all()->first();
        if ($data === null) {
            $list = ['xp' => 5, 'money' => 0, 'level' => 1, 'max_box' => 10, 'box' => 5];
        } else {
            $list = ['xp' => 50, 'money' => 0, 'level' => $data['level'], 'max_box' => $data['max_box'], 'box' => 10];
        }

    
        // dd($data);

        return Inertia::render('Home', [
            'dataUser' => $list,
        ]);
    }
}
